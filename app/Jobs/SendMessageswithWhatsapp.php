<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Twilio\Rest\Client;

class SendMessageswithWhatsapp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $twilioSid = env('TWILIO_SID');
        $twilioToken = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($twilioSid, $twilioToken);

        try {
            $twilio->messages->create(
                $this->data['phone']['value'],
                [
                    "from" => env('TWILIO_WHATSAPP_NUMBER'),
                    "body" => $this->data['content'],
                ]
            );

            $this->data['is_send'] = true;
            $this->data['error_message'] = null;
            $this->data->save();

        } catch (\Exception $e) {

           $this->data['error_message'] = $e->getMessage();
           $this->data['is_failed'] = true;
           $this->data->save();
        }
    }
}

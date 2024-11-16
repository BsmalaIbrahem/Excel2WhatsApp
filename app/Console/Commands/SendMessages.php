<?php

namespace App\Console\Commands;

use App\Jobs\SendMessageswithWhatsapp;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $messages = Message::with('phone')
                    ->where('is_send', false)
                    ->where('created_at', '>=', Carbon::now()->subHours(24))
                    ->get();

        foreach($messages as $message)
        {
            SendMessageswithWhatsapp::dispatch($message);
        }
    }
}

<?php

namespace App\Services;

use App\Models\Message;
use Carbon\Carbon;

class ReportService
{
    public function get()
    {
        $messages = Message::query();

        if(request()->has('status')){
           $this->filterByStatus($messages);
        }

        if(request()->has('from') && request()->has('to')){
           $this->filterByDate($messages);
        }

        return $messages->paginate(request()->input('limit') ?? 6);
    }

    private function filterByStatus($model)
    {
        switch(request()->input('status')){
            case 'success':
                return $model->where('is_send', true);
            case 'failed':
                return $model->where('is_failed', true);
            default:
                return null;
        }
    }

    private function filterByDate($model)
    {
        $date = Carbon::parse(request()->input('to'));
        $date = $date->addDay();
        $dateFormat = $date->format('Y-m-d');
        return $model->whereBetween('created_at', array(request()->input('from'), $dateFormat));
    }

}

<?php

namespace App\Exports;

use App\Models\Message;
use App\Models\Phone;
use App\Services\ReportService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            '#',
            'phone_id',
            'content',
            'is_send',
            'is_failed',
            'error',
            'created_at',
            'updated_at',
            'phone',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return (new ReportService)->get();
    }
}

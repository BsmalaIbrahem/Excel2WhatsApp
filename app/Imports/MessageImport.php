<?php

namespace App\Imports;

use App\Models\Message;
use App\Models\Phone;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MessageImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Message([
            "phone_id" => Phone::where('value' ,$row['phone'])
                            ->firstOrCreate(['value' => $row['phone'],])['id'],
            'content' => $row['message'],
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_id',
        'content',
        'is_send',
        'is_failed',
        'error_message',
    ];

    protected $casts = [
        'is_send' => 'boolean',
        'is_failed' => 'boolean',
    ];

    protected $appends =['user_phone'];

    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }

    public function getUserPhoneAttribute()
    {
        return $this->phone['value'];
    }
}

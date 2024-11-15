<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\SendRequest;
use App\Imports\MessageImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MessageController extends Controller
{
    public function send(SendRequest $request)
    {
        Excel::import(new MessageImport, $request->file('file'));

        return response(['success' => true, 'message' => 'successfully']);
    }
}

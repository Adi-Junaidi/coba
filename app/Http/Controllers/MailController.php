<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail($data)
    {
        try {
            Mail::to($data['receiver'])->send(new SendEmail($data));
            return \response()->json(['success']);
        } catch (\Throwable $th) {
            return $th;
            return \response()->json(['fail']);
        }
    }
}

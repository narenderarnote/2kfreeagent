<?php

namespace App\Http\Controllers;
use App\Mail\NewPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    public function index()
    {
        Mail::to('jitendra@techsparksit.com')->send(new NewPlayer);
        echo "send";
        exit;
    }
}

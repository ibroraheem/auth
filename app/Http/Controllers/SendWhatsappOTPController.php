<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Request;
use Twilio\Rest\Client;
// use Illuminate\Support\Facades\Request;



class SendWhatsappOTPController extends Controller
{
    protected $otp;
    protected $WhatsappVerification;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('users.sendotp');
    }
    public function sendOtp(){
        $otp = rand(1000, 9999);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->otp = $otp;
        $user->save();
        $this->sendWhatsappNotification($otp, $user->phone_number);
        return view('users.verify');
    }
    private function sendWhatsappNotification(string $otp, string $recipient)
    {
        $twilio_whatsapp_number = getenv("TWILIO_WHATSAPP_NUMBER");
        $account_sid = getenv("TWILIO_ACCOUNT_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");

        $client = new Client($account_sid, $auth_token);
        $message = "Your OTP code is $otp";
        return $client->messages->create("whatsapp:$recipient", array('from' => "whatsapp:$twilio_whatsapp_number", 'body' => $message));
    }


    public function verifyOtp(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
    if ($user->status === 'Verified'){

        echo 'Number Already Verified';

    }else{
        
        $request->otp = Request::input('otp');
        if ($request->otp == $user->otp) {
            $user->status = 'Verified';
            $user->save();
            echo "Mobile Number Verified";
        } else {
            echo 'Invalid OTP';
        }
    }
    }

    }


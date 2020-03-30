<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

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
        return view('users.verify');
    }
    protected function store(Request $request)
    {
        $otp = rand(1000, 9999);
        $request ['otp'] = $otp;
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->phone_number = Request::input('phone_number');
        $user->save();
        $this->WhatsappVerifcation->store($request);
        return $this->sendSms($request);
        $this->sendWhatsappNotification($otp, $user->phone_number);
        return $user;
    }
    private function sendWhatsappNotification(string $otp, string $recipient)
    {
        $twilio_whatsapp_number = getenv("TWILIO_WHATSAPP_NUMBER");
        $account_sid = getenv("TWILIO_ACCOUNT_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");

        $client = new Client($account_sid, $auth_token);
        $message = "Your registration pin otp is $otp";
        return $client->messages->create("whatsapp:$recipient", array('from' => "whatsapp:$twilio_whatsapp_number", 'body' => $message));
    }
}

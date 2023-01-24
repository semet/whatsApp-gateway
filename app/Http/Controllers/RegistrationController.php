<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Models\Otp;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * 1. create a record in email_verifications table
     * 2. send email about containing ID of the email_verifications
     * 3. use that ID as unique link
     * 4. delete the email_verifications data once its donee
     */
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->emailVerification()->create();

        UserCreated::dispatch($user);

        return back();
    }

    public function verifyPhoneView()
    {
        return view('verify-phone');
    }

    public function verifyPhone(Request $request)
    {
        $otp = Otp::where('code', $request->otp)->first();

        if (!is_null($otp)) {
            $otp->user()->update([
                'phone_verified_at' => now()
            ]);
            $otp->delete();
        } else {
            throw new Exception('Invalid OTP');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\EmailVerification;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify($id)
    {
        $record = EmailVerification::find($id);

        if (is_null($record)) {
            dd('Link tidak valid');
        } else {
            $record->user()->update([
                'email_verified_at' => now()
            ]);

            $record->delete();
            return back();
        }
    }
}

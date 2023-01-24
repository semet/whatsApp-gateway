<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\Otp;
use App\services\OneTimePassword;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendPhoneNumberVerification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(
        public OneTimePassword $otp
    ) {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        try {
            $otpCode = fake()->randomNumber(4, true);
            $message = 'Your One Time Password is ' . $otpCode;
            $event->user
                ->otp()
                ->create([
                    'code' => $otpCode
                ]);

            $this->otp
                ->send($event->user->phone, $message);
        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
    }
}

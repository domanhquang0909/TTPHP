<?php

namespace App\Listeners;

use App\Events\RegisteredUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailWelcomeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  “RegisteredUser”  $event
     * @return void
     */
    public function handle(RegisteredUser $event)
    {
        $data=[
            'name'=>$event->email->name,
        ];
        Mail::send('mail.success',$data, function($email) use($event){
         $email-> from('manhquang2201@gmail.com','ADMIN');
         $email-> to($event->email->mail_address);
       });
    }
}

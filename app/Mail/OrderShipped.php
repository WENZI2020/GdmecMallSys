<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $value=null;
    public function __construct($value){
        $this->value=$value;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $b=$this->view('email')->subject('使用邮箱登录/注册的验证')->with('value',$this->value);
        return $b->attach(url('storage/privacys.txt'));
    }
}

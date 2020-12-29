<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Prize;
use App\Models\Coupon;

class PrizeReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    /**
     * The prize instance.
     *
     * @var \App\Models\Prize
     */
    public $prize;
    /**
     * The coupon instance.
     *
     * @var \App\Models\Coupon
     */
    public $coupon;

    public function __construct(Coupon $coupon, Prize $prize)
    {
        $this->prize = $prize;
        $this->coupon = $coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('views.emails.winner');
    }
}

<?php

namespace App\Mail;

use App\Models\Prize;
use App\Models\Coupon;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
    public $coupons;

    public function __construct($coupons, Prize $prize)
    {
        $this->prize = $prize;
        $this->coupons = $coupons;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.winner');
    }
}

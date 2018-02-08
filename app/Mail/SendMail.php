<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/2/7
 * Time: 11:14
 */

namespace App\Mail;


use Illuminate\Mail\Mailable;
use Modules\Account\Models\User;
use Modules\CallCenter\Services\CallCenterService;
use Modules\Contract\Models\Order;
use Modules\Core\Exceptions\ErrorException;

class SendMail extends Mailable
{
    /**
     * SendMail constructor.
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.default');
    }
}
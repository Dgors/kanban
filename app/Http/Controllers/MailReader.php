<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;
use Webklex\IMAP\Facades\Client;

class MailReader extends Controller
{
    public function mail()
    {
        try {
            $oClient = Client::account('default');
            $oClient->connect();
        } catch (Throwable $e) {
            dd($e);

        }

        dump($oClient);
    }
}

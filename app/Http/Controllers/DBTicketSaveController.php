<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\New_ticket;

class DBTicketSaveController extends Controller
{
    public function addTicket(array $newTicketsArray): void
    {


        foreach ($newTicketsArray as $newTicketArray)
        {
            $ticket = new New_ticket();

            $ticket->client_email = $newTicketArray['email'];
            $ticket->text_subject = $newTicketArray['subject'][0];
            $ticket->text_message = $newTicketArray['text'];
            $ticket->uid = $newTicketArray['uid'];

            $ticket->save();
        }
    }


}

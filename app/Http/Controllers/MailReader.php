<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Database\Query\Builder;
use Throwable;
use Webklex\IMAP\Facades\Client;
use App\Http\Controllers\DBTicketSaveController;
use App\Models\New_ticket;

class MailReader extends Controller
{
    public function mail()
    {
        $newTicketsUid = [];


        try {
            $client = Client::account('default');
            $client->connect();
            //dump($client);
            $folders = $client->getFolders();
            //dump($folders);
            foreach ($folders as $folder) {
                try {
                    //dump($folder);
                    $messages = $folder->query()->from('tsygankov.pg@ci54.ru')->get();
                    //dump($messages);
                    foreach ($messages as $message) {
                        $uid = $message->getUid();
                        //dump($uid);
                        $exists = New_ticket::where('uid', $uid)->first();
                        //dump($exists);
                        if (!$exists)
                        {
                            $ticket = New_ticket::create([
                                'client_email' => $message->getFrom()[0]->mail,
                                'text_subject' => $message->getSubject(),
                                'text_message' => $message->getTextBody(),
                                'uid' => $uid,
                            ])->save();

                            $newTicketsUid[] = $uid;

                            //$flag = true;
                        } else {
                            continue;
                        }
                    }
                } catch (\Webklex\PHPIMAP\Exceptions\ConnectionFailedException $e) {
                    // Handle connection errors (e.g., log the error)
                    echo "Connection to IMAP server failed: " . $e->getMessage();
                } catch (\Webklex\PHPIMAP\Exceptions\ResponseException $e) {
                    // Handle empty response errors (e.g., retry the request)
                    continue;
                } /*catch (Throwable $e) {
                    // Handle empty response errors (e.g., retry the request)
                    echo "Empty response received from IMAP server";
                    break;
                }*/
            }
        } catch (\Webklex\PHPIMAP\Exceptions\ResponseException $e) {
            // Handle empty response errors (e.g., retry the request)
        }
        dump($newTicketsUid);
        if (isset($newTicketsUid)) {
            return false;
        } else {
            return $newTicketsUid;
        }
    }

}

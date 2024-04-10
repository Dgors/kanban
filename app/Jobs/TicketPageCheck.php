<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
Use App\Http\Controllers\MailReader;
Use App\Events\EmailPageReload;

class TicketPageCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mails = new MailReader;
        $newMessagesArray = $mails->mail();

        if (is_array($newMessagesArray)) {
            broadcast(new EmailPageReload($newMessagesArray));
        }

    }

    public function broadcastAs()
    {
        //return ''
    }
}

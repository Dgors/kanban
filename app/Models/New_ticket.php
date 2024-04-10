<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class New_ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_email',
        'text_subject',
        'text_message',
        'uid',
    ];
}

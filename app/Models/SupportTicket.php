<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    /** @use HasFactory<\Database\Factories\SupportTicketFactory> */
    use HasFactory;

    protected $table = 'support_tickets';
    protected $primaryKey = 'ticket_id';

    protected $fillable = [
        'id',
        'issue_description',
        'status',
        'created_date',
        'resolved_date',
    ];

    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

}

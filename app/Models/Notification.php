<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /** @use HasFactory<\Database\Factories\NotificationFactory> */
    use HasFactory;
    protected $table = 'notifications';
    protected $primaryKey = 'notification_id';

    protected $fillable = [
        'recipient_id',
        'recipient_type',
        'message',
        'sent_date',
        'read_status',
    ];

    public $timestamps = false;

    public function recipient()
    {
        return $this->morphTo();
    }
}

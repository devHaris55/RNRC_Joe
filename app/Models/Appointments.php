<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointments extends Model
{
    protected $table= "appointments";
    use HasFactory;
     public function getevent(): BelongsTo
    {
        return $this->belongsTo(CalendarEvents::class, 'event_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'user_id',
        'victim_id',
        'perpetrator_id',
        'reporter_id',
        'violence_category',
        'description',
        'date',
        'scene',
        'evidence',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function victim()
    {
        return $this->belongsTo(Victim::class);
    }

    public function perpetrator()
    {
        return $this->belongsTo(Perpetrator::class);
    }

    public function reporter()
    {
        return $this->belongsTo(Reporter::class);
    }

    public function status()
    {
        return $this->hasMany(Status::class);
    }
}

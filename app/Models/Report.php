<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function generateTicketNumber()
    {
        do {
            // Membuat nomor tiket acak
            $ticketNumber = 'TKT-' . strtoupper(Str::random(8)); // Misalnya: TKT-ABC12345
        } while (self::where('ticket_number', $ticketNumber)->exists());

        return $ticketNumber;
    }

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

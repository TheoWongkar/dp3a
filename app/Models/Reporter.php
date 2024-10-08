<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    use HasFactory;

    protected $fillable = [
        'whatsapp',
        'telegram',
        'instagram',
        'email',
    ];

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}

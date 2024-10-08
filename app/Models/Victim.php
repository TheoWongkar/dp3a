<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'description',
    ];

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}

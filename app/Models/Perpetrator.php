<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpetrator extends Model
{
    use HasFactory;

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}

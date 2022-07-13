<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class canceled_reports extends Model
{
    use HasFactory;
    protected $fillable = [
        'rep_id',
        'reason'
    ];
}

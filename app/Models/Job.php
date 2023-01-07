<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cost',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function requests() {
        return $this->hasMany(JobRequest::class);
    }
}

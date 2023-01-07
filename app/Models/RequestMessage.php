<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message'
    ];

    public function user() {
        return $this->BelongsTo(User::class);
    }
    
    public function jobRequest() {
        return $this->BelongsTo(JobRequest::class);
    }
}

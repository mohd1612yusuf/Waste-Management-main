<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Garbage extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'description',
        'user_email',
        'status',
    ];

    // Define the inverse relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }
}

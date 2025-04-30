<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Staff extends Model
{
    protected $table = 'staffs';
    use HasFactory;
    protected $fillable = [
        'email',
        'sector',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

}

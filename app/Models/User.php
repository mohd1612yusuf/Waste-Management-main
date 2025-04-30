<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Garbage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'sector',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function garbages() {
        return $this->hasMany(Garbage::class, 'user_email', 'email');
    }
    
    // this is the reverse of user function in staff model
    public function staff()
    {
        return $this->hasOne(Staff::class, 'email', 'email');
    }

    public function addRole($role)
    {
        $roles = json_decode($this->role, true) ?? [];
        
        if (!in_array($role, $roles)) {
            $roles[] = $role;
            $this->role = json_encode($roles);
            $this->save();
        }
    }

    public function hasRole($role)
    {
        $roles = json_decode($this->role, true) ?? [];
        return in_array($role, $roles);
    }

    public static function user($id)
    {
        return self::find($id);
    }



    
}

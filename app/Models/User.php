<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// ------------------ Importar los atributos
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ------------------ Mutadores hasta laravel 8
    // public function setNameAttribute($value) {
    //     $this->attributes['name'] = strtolower($value);
    // }

    // ------------------ Accesores hasta laravel 8
    // public function getNameAttribute($value) {
    //     return ucfirst($value);
    // }

    // ------------------ Mutadores y Accesores a partir de laravel 9
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),    // ------------------ Transforma a capitalize al obtener:   Accesor
            set: fn ($value) => strtolower($value), // ------------------ Transforma a minúsculas al registrar: Mutador
        );
    }

    // ------------------ Definir relaciones
    /**
     * Get the user's posts. One to Many
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
    protected $table = 'admins';

    // Kolom yang dapat diisi
    protected $fillable = [
        'name', 'email', 'password', 'type'
    ];

    // Jangan lupa untuk menambahkan hidden kolom password dan remember_token
    protected $hidden = [
        'password'
    ];
}

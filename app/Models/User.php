<?php

namespace App\Models;

use App\Models\Regency;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'email',
        'password',
        'gender',
        'domisili',
        'kabupaten',
        'kecamatan',
        'phone',
        'size',
        'tokens_account',
        'participant_number',
        'verification_admin',
        'status',
        'age',
        'phone_urgent',
        'contant_urgent',
        'relation_urgent',
        'community',
        'name_community',
        'kode_pay',
        'goldar',
        'r_penyakit',
        'payment_type',
        'by_admin',
        'waktu_pembayaran',
        'total',
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

    public function kabupaten()
    {
        return $this->belongsTo(Regency::class, 'kabupaten', 'id');
    }
}

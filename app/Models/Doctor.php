<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable

{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'doctor';

    public function ClientReviews()
    {
        return $this->hasMany(ClientReview::class);
    }

    public function Specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function BookAppointments()
    {
        return $this->hasMany(BookAppointment::class);
    }

    public function Prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'phone',
        'days',
        'email',
        'password',
        'facebook',
        'X',
        'instagram',
        'linkedin',
        'specialization_id',
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
}

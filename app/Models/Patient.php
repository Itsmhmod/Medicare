<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function prescription()
    {
        return $this->hasone(Prescription::class);
    }

    public function clientReviews()
    {
        return $this->hasmany(ClientReview::class);
    }

    public function bookAppointments()
    {
        return $this->hasmany(BookAppointment::class);
    }
}

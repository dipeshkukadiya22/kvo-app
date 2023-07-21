<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General_Donation extends Model
{
    use HasFactory;
    protected $table = 'GeneralDonation';
    public $timestamps = false;
}

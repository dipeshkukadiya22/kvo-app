<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medical extends Model
{
    protected $table="medical";
    protected $primaryKey="sr_no";
    public $timestamps=false;
}

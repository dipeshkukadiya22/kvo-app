<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sangh_Expense extends Model
{
    use HasFactory;
    protected $table = 'Sangh_Expense';
    protected $primaryKey = 'depo_id';
    public $timestamps = false;

 
}

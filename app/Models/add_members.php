<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_members extends Model
{
    use HasFactory;
    protected $table = 'add_members';
    protected $primaryKey = 'p_id';
    public $timestamps = false;

    
}

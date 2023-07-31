<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahajan_Expense extends Model
{
    use HasFactory;
    protected $table = 'Mahajan_Expense';
    protected $primaryKey = 'depo_id';
    public $timestamps = false;

    public function member()
    {
        return $this->belongsTo(add_members::class, 'depo_id');
    }
}

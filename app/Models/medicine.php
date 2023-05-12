<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    protected $table = "medicine";
    protected $primaryKey="idMedicine";
    use HasFactory;

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $table = "stock";
    protected $primaryKey="id";
    use HasFactory;
}

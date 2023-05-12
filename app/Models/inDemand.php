<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inDemand extends Model
{
    protected $table = "inDemand";
    protected $fillable = [
        'idDemand',
        'idMedicine',
        'idProvider',
        'quantity',
        'livreurName',
        'livreurTel',
    ];
    protected $primaryKey="idDemand";
    protected $keyType = 'string';
    use HasFactory;
}

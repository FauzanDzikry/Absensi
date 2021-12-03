<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ket extends Model
{
    use HasFactory;
    protected $fillable=['nama','nis', 'ket', 'foto'];
    protected $table='ket';
}

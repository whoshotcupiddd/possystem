<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $fillable = [
        'staffCode', // Add 'staffCode' to the fillable array
        'staffName',
        'staffPassword',
        //'staffPhoneNum',
        'staffType',
        'staffEmail',
        'deploymentDate',
        'image',
        
    ];
}

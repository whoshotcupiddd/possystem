<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staffLeaves extends Model
{
    use HasFactory;protected $fillable = [
        'staffCode', 'staffName', 'leaveType', 'numberOfLeaveDays', 'fromDate', 'toDate'
];
    
}

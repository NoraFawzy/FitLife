<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class User_Class extends Pivot
{
    use HasFactory;

    // Specify the table associated with the pivot model (optional)
    protected $table = 'user_classes';

    // Specify the fillable fields that can be mass-assigned
    protected $fillable = [
        'user_id', // Foreign key for users
        'class_id', // Foreign key for classes
    ];


}


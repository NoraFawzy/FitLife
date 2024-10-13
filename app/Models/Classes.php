<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes'; // Table name associated with the model

    // Specify the fillable fields (columns) that can be mass-assigned
    protected $fillable = [
        'name',
        'description',
        'price',
        'date',
        'coach_id',
        'image'
    ];



    public function Coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_classes', 'class_id', 'user_id')->withTimestamps();
    }


}

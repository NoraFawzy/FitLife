<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sub_title', 'desc', 'price', 'duration'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

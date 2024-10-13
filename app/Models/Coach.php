<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $table = 'coaches'; // Table name associated with the model

    protected $fillable = ['name', 'experience'];

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }



}

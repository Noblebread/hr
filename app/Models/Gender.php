<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, 'gender_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'gender_id',
        'birthdate',
        'age',
    ];

    // Define relationships if needed
    public function genders()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

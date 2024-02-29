<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'staffs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'id_no',
        'first_name',
        'middle_name',
        'last_name',
        'contact_number',
        'gender_id',
        'birthdate',
        'age',
        'department_id',
        // 'status_id',
        
    ];

    // Define relationships if needed
    public function genders()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }

    // public function status()
    // {
    //     return $this->belongsTo(Status::class, 'status_id', 'id');
    // }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    
    // public function requests()
    // {
    //     return $this->hasMany(Request::class, 'user_id', 'id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

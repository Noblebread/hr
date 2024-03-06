<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    use HasFactory;
   

    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'name',
        'type_id',
        'department_id',
    
    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function userss()
    {
        return $this->hasMany(User::class);
    }
}

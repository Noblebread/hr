<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];
    
    protected $table = 'requests';
    protected $primaryKey = 'id';
    protected $fillable = [ 'user_id', 'category_id', 'type_id', '', 'status_id' ];

    public function staff(){
        return $this->belongsTo(Staff::class, 'staff_id', 'id');
    }


    public function status(){
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

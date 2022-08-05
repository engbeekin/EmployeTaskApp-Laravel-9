<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depatment extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function task(){
        return $this->belongsTo(Task::class);
    }

    public function user(){
        return $this->hasMany(User::class,'department_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depatment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function task()
    {
        return $this->hasMany(task::class, 'department_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'department_id', 'id');
    }
}

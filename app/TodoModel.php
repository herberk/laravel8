<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoModel extends Model
{
    use HasFactory;

    protected $table="todos";
    protected $primaryKey = 'todo_id';
    protected $fillable = ['title', 'desc', 'status'];
}

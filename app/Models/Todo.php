<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TodoController;


class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['created_at','content'];

}

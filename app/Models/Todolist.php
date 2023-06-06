<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;
    protected $table = 'todolists';

    protected $fillable = [
        'start',
        'end',
        'name',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

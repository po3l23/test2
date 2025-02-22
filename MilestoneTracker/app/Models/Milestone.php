<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'type', 'due_date', 'completed'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);

    }
}
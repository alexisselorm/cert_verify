<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function program_run_type()
    {
        return $this->belongsTo(Program_RunType::class);
    }
    public function program_type()
    {
        return $this->belongsTo(Program_Type::class);
    }
    public function student()
    {
        return $this->hasMany(Student::class, 'program_id');

    }
}
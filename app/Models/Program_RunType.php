<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_RunType extends Model
{
    use HasFactory;
    public function program()
    {
        return $this->hasMany(Program::class, 'program_run_type_id');
    }
}

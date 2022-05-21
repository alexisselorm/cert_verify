<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program_RunType extends Model
{
    use Searchable;
    use HasFactory;


    
    public function program()
    {
        return $this->hasMany(Program::class, 'program_run_type_id');
    }
}

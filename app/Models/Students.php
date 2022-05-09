<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = ['fname', 'mname', 'lname', 'doa', 'doc', 'program_id', 'cert_no'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}

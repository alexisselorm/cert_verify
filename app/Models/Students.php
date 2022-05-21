<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['fname', 'mname', 'lname', 'doa', 'doc', 'program_id', 'cert_no'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}

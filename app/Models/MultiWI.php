<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiWI extends Model
{
    use HasFactory;

    protected $table = 'multiwis';
    
    protected $fillable = ['name'];

    public function workingSequences() {
        return $this->hasMany(WorkingSequence::class, 'multi_wi', 'name');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingSequence extends Model
{
    use HasFactory;

    protected $fillable = [
        'working_sequence_code',
        'person_required',
        'multiwi_id',
        'process_code',
        'process_name',
        'work_center_code',
        'work_center_name',
    ];

    protected $table = 'working_sequences';

    public function getPersonRequiredAttribute($value)
    {
        return $value ?? '-';
    }

    public function multiWi()
    {
        return $this->belongsTo(MultiWi::class, 'multiwi_id');
    }

}

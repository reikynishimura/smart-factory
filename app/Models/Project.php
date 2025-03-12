<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'finish_date' => 'date:Y-m-d',
    ];

    public function getStartDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('m-d-Y');
    }

    public function getFinishDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('m-d-Y');
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}

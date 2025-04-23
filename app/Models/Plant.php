<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $table = 'plants';

    protected $fillable = ['name'];

    public function users() {
        return $this->hasmany(User::class, 'plant', 'name');
    }
}

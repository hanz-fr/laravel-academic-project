<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'keterangan',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}

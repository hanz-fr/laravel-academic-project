<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'nama',
        'jenis_kelamin',
        'alamat',
        'nomor_hp'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }
}

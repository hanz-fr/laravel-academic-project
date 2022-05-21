<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $table = "students";

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ];

    protected $fillable = [
        'id',
        'kelas_id',
        'nama',
        'jenis_kelamin',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'tahun_ajaran',
        'status'
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
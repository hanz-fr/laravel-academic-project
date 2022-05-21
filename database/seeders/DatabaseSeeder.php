<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Kelas;
use App\Models\Report;
use App\Models\Student;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // TEACHER FACTORY
        /* Teacher::factory(5)->create(); */

        // SUBJECT FACTORY
        /* Subject::create([
            'nama' => 'Matematika',
            'keterangan' => 'Wajib',
        ]);

        Subject::create([
            'nama' => 'Bahasa Indonesia',
            'keterangan' => 'Wajib',
        ]);

        Subject::create([
            'nama' => 'Fisika',
            'keterangan' => 'Wajib',
        ]);

        Subject::create([
            'nama' => 'Kimia',
            'keterangan' => 'Wajib',
        ]); */

        // KELAS FACTORY
        /* Kelas::factory(1)->create();  */

        /* Kelas::create([
            'teacher_id' => 432055733,
            'tahun_ajaran' => '2017',
            'kelas' => 'X',
            'jurusan' => 'DKV',
            'status' => 'aktif'
        ]);

        Kelas::create([
            'teacher_id' => 901676020,
            'tahun_ajaran' => '2017',
            'kelas' => 'X',
            'jurusan' => 'TKJ',
            'status' => 'aktif'
        ]);

        Kelas::create([
            'teacher_id' => 158817045,
            'tahun_ajaran' => '2017',
            'kelas' => 'X',
            'jurusan' => 'PPLG',
            'status' => 'aktif'
        ]); */


        // STUDENT FACTORY
        Student::factory(25)->create();

        
        // REPORT FACTORY
        /* Report::factory(1)->create(); */

        /* foreach (Teacher::all() as $teacher)
        {
            $subjects = Subject::inRandomOrder()->take(rand(1,3))->pluck('id');
            $teacher->subjects()->attach($subjects);
        } */
    }
}

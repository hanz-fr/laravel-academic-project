<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->foreignId('student_id')->constrained('students')->references('id')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->references('id')->onDelete('cascade');
            $table->integer('semester');
            $table->integer('tugas_1');
            $table->integer('tugas_2');
            $table->integer('tugas_3');
            $table->integer('pts');
            $table->integer('pas');
            $table->integer('nilai_avg')->nullable();
            $table->integer('nilai_total')->nullable();
            $table->string('keterangan_raport')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};

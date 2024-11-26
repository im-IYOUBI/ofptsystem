<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeNotes extends Model
{
    public function up()
    {
        Schema::create('grade_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('teacher_id');
            $table->integer('grade');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }
    
}

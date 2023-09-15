<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // datatype BigInteger Unsigned

            // foreign key
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswas')
                ->onUpdate('cascade')->onDelete('cascade'); // constraints;
            // end of foreign key
            $table->string('project_name');
            $table->date('project_date');
            $table->string('photo');

            $table->timestamps(); // created at, updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

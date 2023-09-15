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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            // foreign key
            // siswa
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswas')
                ->onUpdate('cascade')->onDelete('cascade'); // constraints;
            // contact_type
            $table->unsignedBigInteger('contact_type_id');
            $table->foreign('contact_type_id')->references('id')->on('contact_types')
                ->onUpdate('cascade')->onDelete('cascade'); // constraints;
            // end of foreign key

            $table->string('name');

            $table->timestamps(); // created at, updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

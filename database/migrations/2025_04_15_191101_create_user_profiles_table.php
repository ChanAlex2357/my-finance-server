<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name', 50)->nullable();
            $table->string('last_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->decimal('salary', 15, 2)->nullable();
            $table->string('id_user');
            $table->string('id_professional_status');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_professional_status')->references('id')->on('professional_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
}

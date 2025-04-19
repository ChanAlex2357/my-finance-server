<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('id_bank');
            $table->string('id_user');
            $table->string('id_currency');
            $table->timestamps();
            $table->softDeletes(); // Add deleted_at column

            $table->foreign('id_bank')->references('id')->on('banks');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_currency')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}

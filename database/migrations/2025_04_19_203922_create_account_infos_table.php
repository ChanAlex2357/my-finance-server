<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_infos', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('etablissement')->nullable();
            $table->string('guichet_code')->nullable();
            $table->string('account_num')->nullable();
            $table->string('rib_key')->nullable();
            $table->string('bic')->nullable();
            $table->string('iban')->nullable();
            $table->string('id_account');
            $table->timestamps();
            $table->softDeletes(); // Add deleted_at column

            $table->foreign('id_account')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_infos');
    }
}

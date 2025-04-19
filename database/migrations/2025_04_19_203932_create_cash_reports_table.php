<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_reports', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('description')->nullable();
            $table->timestamp('report_date');
            $table->decimal('report_amout', 15, 2);
            $table->decimal('estimation_amount', 15, 2)->nullable();
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
        Schema::dropIfExists('cash_reports');
    }
}

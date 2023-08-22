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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->decimal('salary');
            $table->date('hire_date');
            $table->decimal('commission_pct')->nullable();
            $table->unsignedInteger('manager_id')->nullable();

            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('department_id');

            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('job_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};

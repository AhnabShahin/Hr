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
            $table->string('name');
            $table->string('email')->unique();
<<<<<<< Updated upstream:src/Database/migrations/2023_08_20_053018_create_employees_table.php
            $table->string('position');
            $table->unsignedBigInteger('department_id');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
=======
            $table->string('phone_number')->nullable();
            $table->decimal('salary');
            $table->date('hire_date');
            $table->decimal('commission_pct')->nullable();
            $table->string('manager_id')->nullable();

            $table->string('job_id');
            $table->string('department_id');

            $table->timestamps();
>>>>>>> Stashed changes:src/Database/migrations/06_create_employees_table.php
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

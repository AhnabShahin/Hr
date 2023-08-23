<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
<<<<<<< Updated upstream:src/Database/migrations/2023_08_20_053018_create_departments_table.php
            $table->string('name');
=======
            $table->string('department_name');
            $table->string('location_id');
            $table->string('manager_id')->nullable();
>>>>>>> Stashed changes:src/Database/migrations/05_create_departments_table.php
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
}

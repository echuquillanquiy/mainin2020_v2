<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborators', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('interviewer', 100)->nullable();

            $table->string('category')->nullable();

            $table->string('amount')->nullable();

            $table->string('area')->nullable();

            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('departamento')->nullable();

            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->string('provincia')->nullable();

            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->string('distrito')->nullable();

            $table->string('ubigeo_cod')->nullable();

            $table->string('position',50)->nullable();

            $table->string('company',100)->nullable();

            $table->string('name')->nullable();
            $table->string('document', 25)->nullable();
            $table->string('n_document', 20)->nullable();
            $table->datetime('date_of_birthday')->nullable();
            $table->string('phone', 9)->nullable();
            $table->string('address')->nullable();
            $table->date('date_medic_examen')->nullable();
            $table->text('observations')->nullable();
            $table->string('email')->nullable();
            $table->string('respirator')->nullable();
            $table->string('shoes')->nullable();
            $table->string('size_shoe',4)->nullable();
            $table->string('size_pant',4)->nullable();
            $table->string('size_shirt',4)->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->decimal('imc', 5,2)->nullable();
            $table->string('dx_nutrition')->nullable();
            $table->string('sex')->nullable();
            $table->string('blood_type',3)->nullable();
            $table->string('civil_state',25)->nullable();
            $table->string('n_sons',4)->nullable();
            $table->string('emergency_phone',9)->nullable();
            $table->string('contact',50)->nullable();
            $table->string('home_time',8)->nullable();
            $table->string('instruction', 50)->nullable();
            $table->string('especialty',50)->nullable();
            $table->string('bancary_account', 20)->nullable();
            $table->string('bank', 50)->nullable();
            $table->date('induction_date_start')->nullable();
            $table->date('induction_date_end')->nullable();
            $table->string('induction_place', 25)->nullable();
            $table->string('medic_center', 50)->nullable();
            $table->string('medic_aptitud', 50)->nullable();
            $table->text('comments')->nullable();
            $table->string('medium', 50)->nullable();
            $table->date('date_up_obs')->nullable();
            $table->string('state')->default('ACEPTADO')->nullable();
            $table->string('photo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaborators');
    }
}

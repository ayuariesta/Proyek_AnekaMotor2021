<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jenisService_id')->unsigned();
            $table->foreign('jenisService_id')->references('id')->on('jenis_services')->onDelete('cascade')->onUpdate('cascade');
            $table->string('queue')->nullable();
            $table->string('name_stnk');
            $table->string('number_plat');
            $table->string('nama_motor');
            $table->string('jenis_motor');
            $table->date('service_date');
            $table->text('complaint');
            $table->string('status')->default('pending');
            $table->string('jenis_service')->nullable();
            $table->string('tindakan')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('code_unic')->nullable();    
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
        Schema::dropIfExists('services');
    }
}

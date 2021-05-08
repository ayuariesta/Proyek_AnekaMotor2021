<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('sparepart_id')->unsigned();
            $table->foreign('sparepart_id')->references('id')->on('spareparts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('sparepartName');
            $table->integer('total_sparepart');
            $table->integer('price');
            $table->integer('total_price');
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
        Schema::dropIfExists('detail_service');
    }
}

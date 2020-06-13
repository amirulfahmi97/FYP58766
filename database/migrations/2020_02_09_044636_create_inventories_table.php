<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigInteger('serialNo');
            $table->string('assetTag');
            $table->text('itemName');
            $table->text('brand');
            $table->text('type');
            $table->date('dateMoveIn');
            $table->date('dateMoveOut')->nullable();
            $table->integer('locID')->unsigned();
            $table->foreign('locID')->references('locationID')->on('locations');
            $table->string('locName');
            $table->Text('place');
            $table->string('status');
            $table->Text('remarks');
            $table->rememberToken();
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
        Schema::dropIfExists('inventories');
    }
}

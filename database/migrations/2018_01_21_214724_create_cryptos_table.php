<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->unique();
            $table->text('symbol');
            $table->text('category')->nullable();
            $table->integer('current_rank')->default(9999);
            $table->float('latest_price')->default(0);
            $table->boolean('has_parent_chain'); // if true require parent_chain and contract_address
            $table->text('parent_chain')->nullable();
            $table->text('contract_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cryptos');
    }
}

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
            $table->text('cmc_symbol');
            $table->text('cc_api_symbol')->nullable();
            $table->text('category')->nullable();
            $table->integer('current_rank')->default(9999);
            $table->float('latest_price')->default(0);
            $table->decimal('percent_change_1h')->default(0);
            $table->decimal('percent_change_24h')->default(0);
            $table->decimal('percent_change_7d')->default(0);
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

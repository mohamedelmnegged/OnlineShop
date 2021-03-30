<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->string('email')->collation('utf8_general_ci');
            $table->string('name')->collation('utf8_general_ci');
            $table->text('address')->collation('utf8_general_ci');
            $table->string('city')->collation('utf8_general_ci');
            $table->string('provance')->collation('utf8_general_ci');
            $table->integer('postal');
            $table->integer('phone');
            $table->string('nameOnCard')->collation('utf8_general_ci');
            $table->integer('credit');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('checkout');
    }
}

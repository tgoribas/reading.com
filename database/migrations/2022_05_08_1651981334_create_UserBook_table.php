<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBookTable extends Migration
{
    public function up()
    {
        Schema::create('UserBook', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->id();
		$table->string('idGoogle',35);
        $table->unsignedBigInteger('userFk')->unsigned();
		$table->string('ISBN_13',20)->nullable();
		$table->date('dateStart');
		$table->date('dateEnd')->nullable();
		$table->integer('rating')->nullable()->default('0');
		$table->text('review')->nullable();;
        $table->timestamps();

        });

        Schema::table('UserBook', function($table)
        {   
            $table->foreign('userFk')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('UserBook');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharedWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_wishlists', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->integer('owner_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->primary(['owner_id', 'user_id']);

            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shared_wishlists');
    }
}

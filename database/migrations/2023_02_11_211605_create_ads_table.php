<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('year')->nullable();
            $table->string('category')->nullable();
            $table->string('color')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('seller_id');
            $table->string('rate')->nullable();
            $table->string('views')->nullable();
            $table->string('pic1')->nullable();
            $table->string('pic2')->nullable();
            $table->string('pic3')->nullable();
            $table->string('pic4')->nullable();
            $table->string('pic5')->nullable();
            $table->string('pic6')->nullable();
            $table->string('pic7')->nullable();
            $table->string('views')->nullable();
            $table->string('shares')->nullable();
            $table->timestamps();

            $table
                ->foreign('seller_id')
                ->references('id')
                ->on('users');
        });

        // Retrieve the current session id
        $seller_id = session()->get('id');

        // Update the seller_id column with the current session id
        DB::table('ads')->update(['seller_id' => $seller_id]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};

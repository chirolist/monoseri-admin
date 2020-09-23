<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_bookmark', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('category_id')->nullable()->comment('カテゴリーID');
            $table->string('title')->nullable()->comment('タイトル');
            $table->longText('url')->nullable()->comment('ブックマークURL');
            $table->tinyInteger('status')->default(0)->comment('ステータス');
            $table->unsignedMediumInteger('favo')->default(0)->comment('お気に入りカウンター');
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
        Schema::dropIfExists('book_marks');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('商品コード')->unique()->index();
            $table->string('name')->nullable()->comment('商品名');
            $table->longText('description')->nullable()->comment('商品説明');
            $table->integer('price')->default(0)->comment('価格');
            $table->mediumInteger('stock')->nullable()->comment('在庫');
            $table->string('memo')->nullable()->comment('備考');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_products');
        Schema::table('geo', function (Blueprint $table) {
            $table->dropIndex(['code']);
        });
    }
}

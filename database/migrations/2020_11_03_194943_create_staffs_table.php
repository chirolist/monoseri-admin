<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_staffs', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('顧客コード');
            $table->string('name')->nullable()->comment('氏名');
            $table->string('kana')->nullable()->comment('氏名(カナ)');
            $table->string('postcode')->nullable()->comment('郵便番号');
            $table->string('prefecture')->nullable()->comment('都道府県');
            $table->string('city')->nullable()->comment('市区町村');
            $table->string('address1')->nullable()->comment('住所1');
            $table->string('address2')->nullable()->comment('住所2');
            $table->string('tel')->nullable()->comment('電話番号');
            $table->string('email')->nullable()->comment('メールアドレス')->unique();
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->unsignedTinyInteger('sex')->nullable()->comment('性別');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('t_staffs');
    }
}

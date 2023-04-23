<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // store_idカラムを作成した後、mst_storesテーブルとのリレーションを定義する
            $table->unsignedBigInteger('store_id')->after('user_id')->nullable();
            $table->foreign('store_id')->references('id')->on('mst_stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // 外部キー制約を消してからstore_idカラムを削除する
            $table->dropForeign(['store_id']);
            $table->dropColumn('store_id');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPublicFlgToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // 公開フラグ追加
            $table->boolean('public_flg')->default(false)->after('email_verified_at');
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // 公開フラグ削除
            $table->dropColumn('public_flg');
        });
    }
}
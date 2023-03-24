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
        Schema::create('chats', function (Blueprint $table) {
	    /*
            $table->id();
            $table->timestamps();
	   */

            $table->bigIncrements('id');
	    $table->string('user_name', 50)->default('anonymous'); # ユーザー名
            $table->string('user_identifier', 50);  # ユーザー識別子
            $table->string('message', 255); # 投稿内容
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
};

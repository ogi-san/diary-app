<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 日記とタグの多対多のリレーションを取るためのテーブル
        Schema::create('diary_tag', function (Blueprint $table) {
            $table->bigInteger('diary_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->primary(['diary_id', 'tag_id']);
            $table->foreign('diary_id')->references('id')->on('diaries')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diary_tag');
    }
};

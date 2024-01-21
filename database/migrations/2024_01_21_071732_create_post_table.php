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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('post_date')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->foreign("category_id")->references('id')->on('categories')->onDelet('cascade');
            $table->foreign("subcategory_id")->references('id')->on('subcategories')->onDelet('cascade');
            $table->foreign("user_id")->references('id')->on('users')->onDelet('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};

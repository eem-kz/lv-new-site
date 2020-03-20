<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('book_category_id')->index()->unsigned();
            $table->integer('post_author')->index()->unsigned();
            $table->longText('post_content');
            $table->text('post_title');
            $table->string('slug')->unique()->nullable();
            $table->string('image')->default('default.png');
            $table->integer('view_count')->default(0);
            $table->boolean('is_approved')->default(false);
            $table->boolean('post_status')->default('0');
            $table->string('lang')->default('KZ');
            $table->enum('comment_status', ['open', 'close']);
            $table->date('post_modified')->nullable();
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
        Schema::dropIfExists('book_posts');
    }
}

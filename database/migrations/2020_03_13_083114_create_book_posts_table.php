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
            $table->integer('post_author')->index()->unsigned();
            $table->longText('post_content');
            $table->text('post_title');
            $table->string('slug')->unique()->nullable();
            $table->string('image')->default('default.png');
            $table->integer('view_count')->default(0);
            $table->boolean('is_approved')->default(false);
            $table->string('lang')->default('KZ');
            $table->boolean('post_status')->default('1');
            $table->enum('comment_status', ['open', 'close']);
            $table->bigInteger('comment_count')->default(0);
            $table->dateTime('post_modified')->nullable();
            $table->timestamps();

            /*

            `comment_count` BIGINT(20) NOT NULL DEFAULT '0',
            PRIMARY KEY (`ID`),
            INDEX `post_name` (`post_name`(191)),
            INDEX `type_status_date` (`post_type`, `post_status`, `post_date`, `ID`),
            INDEX `post_parent` (`post_parent`),
            INDEX `post_author` (`post_author`)
        )
            COLLATE='utf8_general_ci'
            ENGINE=InnoDB
            AUTO_INCREMENT=1255
        ;
             */
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

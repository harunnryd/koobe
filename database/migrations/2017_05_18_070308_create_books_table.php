<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('author')->default('anonymous');
            $table->string('photo')->default('default.jpg');
            $table->text('desc')->nullable();
            $table->integer('stock')->default(10);
            $table->integer('page')->default(300);
            $table->decimal('price', 10, 2)->default(145000);
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('book_category', function (Blueprint $table) {
            $table->integer('book_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('book_id')
                ->references('id')->on('books')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('book_category', function (Blueprint $table) {
            $table->dropForeign(['book_id']);
            $table->dropForeign(['category_id']);
        });

        Schema::table('book_category', function (Blueprint $table) {
            $table->dropIndex(['book_id']);
            $table->dropIndex(['category_id']);
        });

        Schema::dropIfExists('book_category');

        Schema::dropIfExists('categories');

        Schema::dropIfExists('books');
    }
}

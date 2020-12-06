<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('name');
            $table->string('slug');
            $table->text('small_description')->nullable();
            $table->string('image');

            $table->string('high_heading')->nullable();
            $table->text('high_description')->nullable();
            $table->string('description_heading')->nullable();
            $table->text('description')->nullable();
            $table->string('detail_heading')->nullable();
            $table->text('detail')->nullable();

            $table->string('sale_tag')->nullable();
            $table->bigInteger('original_price')->nullable();
            $table->bigInteger('offer_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->tinyInteger('priority')->default(0);

            $table->tinyInteger('new_arrival')->default(0);
            $table->tinyInteger('featured_product')->default(0);
            $table->tinyInteger('popular_product')->default(0);
            $table->tinyInteger('offer_product')->default(0);
            $table->tinyInteger('status')->default(0);

            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

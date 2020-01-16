<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); // ニュースのタイトルを保存するカラム
            $table->string('body');  // ニュースの本文を保存するカラム
            $table->string('image_path')->nullable();  // 画像のパスを保存するカラム
            $table->timestamps();
            $table->string('zip', 10)->comment('郵便番号');
		    $table->tinyInteger('prefecture_code')->unsigned()->comment('都道府県コード : JIS都道府県コード');
		    $table->string('prefecture', 40)->comment('都道府県名 フリーテキスト検索で使用');
	     	$table->string('address')->comment('住所2');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
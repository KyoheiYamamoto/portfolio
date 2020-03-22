<?php

declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('title'); // ニュースのタイトルを保存するカラム
            $table->string('body');  // ニュースの本文を保存するカラム
            $table->string('image_path1')->nullable();
            $table->string('image_path2')->nullable();
            $table->string('image_path3')->nullable(); // 画像のパスを保存するカラム
            $table->timestamps();
            $table->string('zip', 10000)->nullable()->comment('郵便番号');
            $table->tinyInteger('prefecture_code')->unsigned()->nullable()->comment('都道府県コード : JIS都道府県コード');
            $table->string('prefecture', 10000)->nullable()->comment('都道府県名 フリーテキスト検索で使用');
            $table->string('address')->nullable()->comment('住所2');
            $table->string('tel', 10000)->nullable()->comment('電話番号');
            $table->string('presence')->comment('wifi');
            $table->string('amenities')->comment('設備・備品');
            $table->string('star')->comment('評価');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
}

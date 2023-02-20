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
    Schema::create('gajis', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('gaji_pokok');
      $table->foreignId('user_id')
        ->constrained()
        ->onUpdate('cascade');
      $table->bigInteger('tunjangan')->nullable();
      $table->bigInteger('bonus_lembur')->nullable();
      $table->bigInteger('potongan')->nullable();
      $table->bigInteger('total_gaji')->nullable();

      $table->enum('status', ['Pending', 'Selesai'])->default('Pending');

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
    Schema::dropIfExists('gajis');
  }
};

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
    Schema::create('admins', function (Blueprint $table) {
      $table->id();
      $table->string('username')->default('admin');
      $table->string('nama_lengkap')->default('admin1');
      $table->string('password')->default('$2y$10$f3s.M15tQfHRovlXkZwL2e7kmEFPzN0gljQQr1sZqxMVbf/m1o.By');
      $table->string('foto')->default('default.jpg');
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
    Schema::dropIfExists('admins');
  }
};

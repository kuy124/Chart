<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jabatan_data', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan');
            $table->integer('laki_laki');
            $table->integer('perempuan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jabatan_data');
    }
};

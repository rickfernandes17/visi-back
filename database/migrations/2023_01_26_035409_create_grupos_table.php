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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
        Schema::create('grupo_regra', function (Blueprint $table) {
            $table->foreignId('grupo_id')->constrained('grupos');
            $table->foreignId('regra_id')->constrained('regras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_regra');
        Schema::dropIfExists('grupos');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beneficio_funcionario', function(Blueprint $table){
            $table->foreignId('beneficio_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('funcionario_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->primary('beneficio_id','funcionario_id');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficio_funcionario');
    }
};

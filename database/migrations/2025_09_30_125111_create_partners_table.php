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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('address')->nullable();;
            $table->string('manager')->nullable();
            $table->string('vat_number')->nullable(); //dds
            $table->string('tin_number')->nullable(); //eik
            $table->string('phone')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'type'], 'unique_name_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};

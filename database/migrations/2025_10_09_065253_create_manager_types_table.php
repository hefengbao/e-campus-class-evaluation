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
        Schema::create('manager_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyText('scope')->nullable()->comment('查询范围');
            $table->tinyText('scope_desc')->nullable()->comment('查询范围描述');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager_types');
    }
};

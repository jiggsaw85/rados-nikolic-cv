<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certifications', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('issuer');
            $table->string('location')->nullable();
            $table->unsignedSmallInteger('issued_at_year')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0)->index();
            $table->timestamps();

            $table->unique(['name', 'issuer']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};

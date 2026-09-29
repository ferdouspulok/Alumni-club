<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('notice_number')->nullable(); // e.g. CEC/NOTICE/2026/01
            $table->text('description')->nullable();
            $table->string('file_attachment')->nullable();
            $table->date('publish_date')->index();
            $table->boolean('is_pinned')->default(false);
            $table->string('status')->default('published'); // published, draft
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};

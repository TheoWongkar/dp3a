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
        Schema::create('victims', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('perpetrators', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('relationship_between')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('reporters', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('victim_id')->constrained('victims')->onDelete('cascade');
            $table->foreignId('perpetrator_id')->constrained('perpetrators')->onDelete('cascade');
            $table->foreignId('reporter_id')->constrained('reporters')->onDelete('cascade');
            $table->string('violence_category');
            $table->string('description');
            $table->date('date');
            $table->string('scene');
            $table->string('evidence')->nullable();
            $table->timestamps();
        });

        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->onDelete('cascade');
            $table->string('status')->default('Pending');
            $table->string('description')->default('Laporan berhasil dibuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('victims');
        Schema::dropIfExists('perpetrators');
        Schema::dropIfExists('reporters');
        Schema::dropIfExists('reports');
        Schema::dropIfExists('statuses');
    }
};

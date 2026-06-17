<?php

use App\Enums\VideoJobStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('video_jobs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('video_id');
            $table->foreign('video_id')->references('id')->on('videos')->cascadeOnDelete();

            $table->unsignedSmallInteger('type')->default(null);

            $table->unsignedSmallInteger('status')->default(VideoJobStatus::PENDING->value);

            $table->text('error_message')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_jobs');
    }
};

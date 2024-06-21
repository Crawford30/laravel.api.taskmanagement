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
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('status_id');
            $table->string('task_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->text('description')->nullable();
            $table->json('members');
            $table->string('task_priority');
            $table->smallInteger('order')->default(0);
            $table->timestamps();

            // 'task_name',
            // 'description',
            // 'task_priority',
            // 'start_date',
            // 'end_date',
            // 'order',
            // 'members',
            // 'user_id',
            // 'status_id'



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

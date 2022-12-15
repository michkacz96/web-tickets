<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_lists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->boolean('private')->default(1);
            $table->foreignIdFor(App\Models\Ticket::class)->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignIdFor(App\Models\User::class)->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');    
        Schema::dropIfExists('task_lists');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

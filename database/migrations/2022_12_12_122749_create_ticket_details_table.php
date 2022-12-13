<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignIdFor(App\Models\Ticket::class)->references('id')->on('tickets')->onDelete('cascade');
            $table->string('status', 1);
            $table->foreignIdFor(App\Models\User::class)->references('id')->on('users')->onDelete('cascade');
            $table->string('message', 1024)->nullable();
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
        Schema::dropIfExists('ticket_details');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

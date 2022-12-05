<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('title');
            $table->string('description');
            $table->string('status', 1)->default('N');
            $table->foreignIdFor(App\Models\User::class)->references('id')->on('users');
            $table->foreignIdFor(App\Models\Customer::class)->nullable()->references('id')->on('customers');
            $table->foreignIdFor(App\Models\TicketCategory::class)->nullable()->references('id')->on('ticket_categories')->nullOnDelete();
            $table->timestamp('closed_at')->nullable();
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
        Schema::dropIfExists('tickets');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

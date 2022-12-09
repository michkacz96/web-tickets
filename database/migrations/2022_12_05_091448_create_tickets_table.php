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
            $table->string('description', 512);
            $table->string('status', 1)->default('N');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('assigned_to')->nullable()->references('id')->on('users');
            $table->foreignIdFor(App\Models\Customer::class)->nullable()->references('id')->on('customers')->nullOnDelete();
            $table->foreignIdFor(App\Models\TicketCategory::class)->nullable()->references('id')->on('ticket_categories')->nullOnDelete();
            $table->timestamp('closed_at')->nullable();
            $table->datetime('due_date')->nullable();
            $table->boolean('overdue')->default(0);
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

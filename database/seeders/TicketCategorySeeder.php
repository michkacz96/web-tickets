<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TicketCategory;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_categories')->insert([
            'name' => 'Category 1',
            'description' => 'Description of category 1'
        ]);

        DB::table('ticket_categories')->insert([
            'name' => 'Category 2'
        ]);

        DB::table('ticket_categories')->insert([
            'name' => 'Category 3',
            'description' => 'Description of category 3'
        ]);

        DB::table('ticket_categories')->insert([
            'name' => 'Category 4',
            'description' => 'Description of category 4'
        ]);

        DB::table('ticket_categories')->insert([
            'name' => 'Category 5'
        ]);

        DB::table('ticket_categories')->insert([
            'name' => 'Category 6',
            'description' => 'Description of category 6'
        ]);
    }
}

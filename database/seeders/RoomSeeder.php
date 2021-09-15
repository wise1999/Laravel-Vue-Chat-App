<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name' => 'Room 1',
        ]);

        DB::table('rooms')->insert([
            'name' => 'Room 2',
        ]);

        DB::table('rooms')->insert([
            'name' => 'Room 3',
        ]);
    }
}

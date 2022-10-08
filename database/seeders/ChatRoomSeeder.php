<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chat_rooms')->insert([
            'name'=> 'Global'
        ]);
        DB::table('chat_rooms')->insert([
            'name'=> 'Tech Team'
        ]);
        DB::table('chat_rooms')->insert([
            'name'=> 'sales Team'
        ]);
        DB::table('chat_rooms')->insert([
            'name'=> 'Ops Team'
        ]);
        DB::table('chat_rooms')->insert([
            'name'=> 'CS Team'
        ]);
        DB::table('chat_rooms')->insert([
            'name'=> 'Smile Factory'
        ]);
    }
}

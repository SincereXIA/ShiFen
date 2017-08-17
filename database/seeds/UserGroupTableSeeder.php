<?php

use Illuminate\Database\Seeder;

class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cols = [];
        for ($i = 5; $i < 35; $i++) {
            $col = [
                'user_id' => $i,
                'group_id' => 7,
            ];
            $cols[] = $col;
        }
        DB::table('user_group')->insert($cols);
    }
}

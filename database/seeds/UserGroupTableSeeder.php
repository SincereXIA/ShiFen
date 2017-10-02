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
        for ($i = 36; $i < 65; $i++) {
            $col = [
                'user_id' => $i,
                'group_id' => 9,
            ];
            $cols[] = $col;
        }
        DB::table('user_group')->insert($cols);
    }
}

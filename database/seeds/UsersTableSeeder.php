<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // ランダムもしくは特定の文字列を入れることも可能
            'name' => $this->tester_str(10),  
            'email' => $this->tester_str(10).'@example.com',
            // bcryptでハッシュ化
            'password' => bcrypt('password'),  
            // Carbonクラスのnowで現在時刻になる
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    private function tester_str($length)
    {
        $dateObj = new Datetime('now');
        $datetime_str = $dateObj->format('YmdHis');
        $numToABCarr = [
            0 => 'A', 1 => 'B', 2 => 'C', 3 => 'D', 4 => 'E' ,
            5 => 'F', 6 => 'G', 7 => 'H', 8 => 'I', 9 => 'J',
        ];
        $datetime_str_arr = str_split($datetime_str);
        $STR = '';
        foreach($datetime_str_arr as $key => $value){
            $STR .= $numToABCarr[$value];
        }
        $cutSTR = substr($STR, '-'.$length);
        
        return $cutSTR;
    }
}
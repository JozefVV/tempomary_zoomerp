<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            ['id'=>1, 'name'=>'superadmin', 'description'=>'Najvyssie prava. Nie je mozne ho odmazat.'],
            ['id'=>2, 'name'=>'admin', 'description'=>'Vysoke prava. Je mozne ho odmazat.'],
            ['id'=>3, 'name'=>'moderator', 'description'=>'Moznosti urcenej editacie.'],
            ['id'=>4, 'name'=>'user', 'description'=>'Uzivatel bez opravneni.']
        ]);
    }
}

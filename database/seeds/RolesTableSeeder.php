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
            ['id'=>1, 'name'=>'superadmin', 'description'=>'Užívateľ "superadmin" je všetko, čo je "admin". Okrem toho je táto rola v systéme len jedna. Vzniká pri prvotnom nastavení systému. Užívateľ "superadmin" nemôže byť zmazaný.'],
            ['id'=>2, 'name'=>'admin', 'description'=>'Užívateľ "admin" je všetko, čo je "manager". Okrem toho je oprávnený na správu užívateľov a nastaveni kritických funkcií systému, prípadne modulov pre nastavenia systému.'],
            ['id'=>3, 'name'=>'manager', 'description'=>'Rola "manager" je všetko, čo je "user". Okrem toho je oprávnená pre CRUD všektých entít v moduloch mimo funkčných modulov systému.'],
            ['id'=>4, 'name'=>'user', 'description'=>'Rola "user" obsluhuje všetky ostatné bežné funkcie modulov, potrebné na bežnú prácu.']
        ]);
    }
}

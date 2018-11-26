<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


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
        app()['cache']->forget('spatie.permission.cache');  //delete spatie`s cache

        Role::create(['name' => 'superadmin']);     // Užívateľ "superadmin" je všetko, čo je "admin". Okrem toho je táto rola v systéme len jedna. Vzniká pri prvotnom nastavení systému. Užívateľ "superadmin" nemôže byť zmazaný.
        Role::create(['name' => 'admin']);          // Užívateľ "admin" je všetko, čo je "manager". Okrem toho je oprávnený na správu užívateľov a nastaveni kritických funkcií systému, prípadne modulov pre nastavenia systému.
        Role::create(['name' => 'manager']);        // Rola "manager" je všetko, čo je "user". Okrem toho je oprávnená pre CRUD všektých entít v moduloch mimo funkčných modulov systému.
        Role::create(['name' => 'user']);           // Rola "user" obsluhuje všetky ostatné bežné funkcie modulov, potrebné na bežnú prácu.
    }
}

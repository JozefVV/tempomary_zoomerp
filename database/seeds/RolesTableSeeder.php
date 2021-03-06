<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->truncate(); //fails when seeding empty db on strict DB settings
        app()['cache']->forget('spatie.permission.cache');  //delete spatie`s cache

        Role::create(['name' => 'superadmin','name_SK' => 'superadmin','hidden'=> true]);     // Užívateľ "superadmin" je všetko, čo je "admin". Okrem toho je táto rola v systéme len jedna. Vzniká pri prvotnom nastavení systému. Užívateľ "superadmin" nemôže byť zmazaný.
        $roleAdmin = Role::create(['name' => 'admin','name_SK' => 'administrátor']);          // Užívateľ "admin" je všetko, čo je "manager". Okrem toho je oprávnený na správu užívateľov a nastaveni kritických funkcií systému, prípadne modulov pre nastavenia systému.
        $roleManager = Role::create(['name' => 'manager','name_SK' => 'manažér']);        // Rola "manager" je všetko, čo je "user". Okrem toho je oprávnená pre CRUD všektých entít v moduloch mimo funkčných modulov systému.
        $roleUser = Role::create(['name' => 'user','name_SK' => 'používateľ']);           // Rola "user" obsluhuje všetky ostatné bežné funkcie modulov, potrebné na bežnú prácu.


        $roleAdmin->givePermissionTo([
            Permission::create(['name' => 'view users']),
            Permission::create(['name' => 'edit users']),
            Permission::create(['name' => 'delete users']),
            Permission::create(['name' => 'create users'])
         ]);

        $roleManager->givePermissionTo([
            'view users',

        ]);
    }
}

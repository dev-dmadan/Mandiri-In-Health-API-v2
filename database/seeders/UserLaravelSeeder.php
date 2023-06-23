<?php

namespace Database\Seeders;

use App\Models\SysAdminUnit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserLaravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userInCreatio = SysAdminUnit::with('contact')->whereNotNull('ContactId')
            ->select('Id', 'Name', 'ContactId')
            ->get();
        foreach ($userInCreatio as $userCreatio) {
            User::updateOrCreate(
                ['id' => $userCreatio->Id],
                [
                    'name' => $userCreatio->Name, 
                    'username' => $userCreatio->contact->Name
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $departemen = [
            ['departemen' => 'IT'],
            ['departemen' => 'HRGA'],
            ['departemen' => 'FINANCE'],
            ['departemen' => 'COMMERCIAL']
        ];
        Schema::disableForeignKeyConstraints();
        foreach ($departemen as $dept){
            Departemen::create($dept);
        }
        Schema::enableForeignKeyConstraints();
    }
}

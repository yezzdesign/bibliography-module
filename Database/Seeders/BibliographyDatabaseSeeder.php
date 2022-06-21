<?php

namespace Modules\Bibliography\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Bibliography\Database\factories\BibliographyFactory;

class BibliographyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        \Modules\Bibliography\Entities\Bibliography::factory(100)->create();
    }
}

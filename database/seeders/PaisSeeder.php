<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapapais = new mapapais();
        $mapapais->idPais = "EC";
        $mapapais->name = "Ecuador";
        $mapapais->currency = "USD";
        $mapapais->state = "A";
        $mapapais->save();
    }
}

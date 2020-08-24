<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
            [
                'municipio' => 'Cartagena',
                'departamentos_id' => 1
            ],
            [
                'municipio' => 'Barranquilla',
                'departamentos_id' => 2
            ]
        ]);
    }
}

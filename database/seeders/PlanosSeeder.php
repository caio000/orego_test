<?php

namespace Database\Seeders;

use App\Models\Planos;
use Illuminate\Database\Seeder;

class PlanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planos = [
            ['nome' => 'Free', 'mensalidade' => 0.00],
            ['nome' => 'Basic', 'mensalidade' => 100.00],
            ['nome' => 'Plus', 'mensalidade' => 187.00],
        ];
        foreach ($planos as $plano) {
            (new Planos($plano))->save();
        }
    }
}

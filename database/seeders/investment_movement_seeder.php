<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Models\Investment_Movements;

class investment_movement_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Obtencion de la ruta del csv
        $path = storage_path('app/private/movimientos_inversiones.csv');

        //Lector de registros
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        //Bucle que agrega los registros mediante el modelo
        foreach ($csv as $record){

            Investment_Movements::create([
                'amount'=>$record['cantidad'],
                'investment_type'=>$record['tipo_inversion'],
                'movement_date'=>$record['fecha_movimiento'],
                'account_id'=>$record['id_cuenta'],
            ]);

        }
    }
}

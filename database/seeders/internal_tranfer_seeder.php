<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Models\Internal_Transfers;

class internal_tranfer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Obtencion de la ruta del csv
        $path = storage_path('app/private/transferencias_internas.csv');

        //Lector de registros
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        //Bucle que agrega los registros mediante el modelo
        foreach ($csv as $record){

            Internal_Transfers::create([
                'amount'=>$record['cantidad'],
                'origin_account_id'=>$record['cuenta_emisora'],
                'target_account_id'=>$record['cuenta_receptora'],
                'movement_date'=>$record['fecha_movimiento'],
            ]);

        }
    }
}

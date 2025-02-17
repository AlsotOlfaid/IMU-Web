<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Models\External_Transfers;

class external_tranfer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Obtencion de la ruta del csv
        $path = storage_path('app/private/transferencias_externas.csv');

        //Lector de registros
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        //Bucle que agrega los registros mediante el modelo
        foreach ($csv as $record){

            External_Transfers::create([
                'amount'=>$record['cantidad'],
                'reason'=>$record['motivo'],
                'target_account'=>$record['cuenta_receptora'],
                'target_bank'=>$record['banco_receptor'],
                'movement_date'=>$record['fecha_movimiento'],
                'account_id'=>$record['id_cuenta'],
            ]);

        }
    }
}

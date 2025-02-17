<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Models\Payments;

class payment_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Obtencion de la ruta del csv
        $path = storage_path('app/private/pagos_tdc.csv');

        //Lector de registros
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        //Bucle que agrega los registros mediante el modelo
        foreach ($csv as $record){

            Payments::create([
                'minimum_payment'=>$record['cantidad_minima_pago'],
                'interestfree_amount'=>$record['cantidad_sin_intereses'],
                'total_amount'=>$record['cantidad_total'],
                'cut_date'=>$record['fecha_corte'],
                'payment_date'=>$record['fecha_pago'],
                'movement_date'=>$record['fecha_movimiento'],
                'card_id'=>$record['id_tarjeta'],
            ]);

        }
    }
}

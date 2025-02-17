<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Models\Credit_Cards;

class credit_card_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = storage_path('app/private/tarjetas_credito.csv');

        //Lector de registros
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        //Bucle que agrega los registros mediante el modelo
        foreach ($csv as $record){

            Credit_Cards::create([
                'client_id'=>$record['id_cliente'],
                'card_number'=>$record['numero_tarjeta'],
                'expiration_date'=>$record['fecha_vencimiento'],
                'credit_limit'=>$record['limite_credito'],
            ]);

        }
        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Models\Accounts;

class account_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = storage_path('app/private/cuentas.csv');

        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record){
            Accounts::create([
                'client_id'=>$record['id_cuenta'],
                'account_number'=>$record['numero_cuenta'],
                'balance'=>$record['saldo'],
            ]);
        }
    }
}

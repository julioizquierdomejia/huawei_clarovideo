<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImeiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lineNumber = 1;
        if (($handle = fopen(base_path("public/imeis.txt"), "r")) !== false) {
            while (($data = fgets($handle)) !== false) {
                if ($lineNumber === 1) {
                    $lineNumber++;
                    continue;
                }
                $lineNumber++;

                $row = str_getcsv($data, ",");

                $createQuery = 'INSERT INTO imeis (code) VALUES ("'.$row[0].'")';

                DB::statement($createQuery, $row);
                $this->command->info($lineNumber);
            }
            fclose($handle);
        }
    }
}

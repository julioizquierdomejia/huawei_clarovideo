<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row = 1;
        if (($handle = fopen(base_path("public/coupons.csv"), "r")) !== false) {
            while (($data = fgetcsv($handle, 0, ",")) !== false) {
                if ($row === 1) {
                    $row++;
                    continue;
                }
                $row++;

                $dbData = [
                    'code' => '"'.$data[0].'"',
                    'validity_date' => '"'.$data[0].'"',
                ];

                $colNames = array_keys($dbData);

                $createQuery = 'INSERT INTO coupons ('.implode(',', $colNames).') VALUES ('.implode(',', $dbData).')';

                DB::statement($createQuery, $data);
                $this->command->info($row);
            }
            fclose($handle);
        }
    }
}

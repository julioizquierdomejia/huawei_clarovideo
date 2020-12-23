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
    function insertquote($value) {
            return "'$value'";
        }

    public function run()
    {
        $lineNumber = 1;
        if (($handle = fopen(base_path("public/coupons.csv"), "r")) !== false) {
            while (($data = fgets($handle)) !== false) {
                if ($lineNumber === 1) {
                    $lineNumber++;
                    continue;
                }
                $lineNumber++;

                $row = str_getcsv($data, ";");
                $date = date('Y-m-d', strtotime(str_replace("/", "-", $row[1])));

                $createQuery = 'INSERT INTO coupons (code, validity_date) VALUES ("'.$row[0].'","'.$date.'")';

                DB::statement($createQuery, $row);
                $this->command->info($lineNumber);
            }
            fclose($handle);
        }
    }
}

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
        $date = '2021-03-30';
        if (($handle = fopen(base_path("public/coupons.csv"), "r")) !== false) {
            while (($data = fgets($handle)) !== false) {
                if ($lineNumber === 1) {
                    $lineNumber++;
                    continue;
                }
                $lineNumber++;

                $row = str_getcsv($data, ";");
                //$date = date('Y-m-d', strtotime(str_replace("/", "-", $row[1])));

                $createQuery = 'INSERT INTO coupons (code, validity_date) VALUES ("'.$row[0].'","'.$date.'")';

                DB::statement($createQuery, $row);
                $this->command->info($lineNumber);
            }
            fclose($handle);
        }

        /*$lineNumber = 1;
        $date = '2021-03-30';
        $today = date('Y-m-d H:i:s');
        if (($handle = fopen(base_path("public/coupons.txt"), "r")) !== false) {
            while (($data = fgets($handle)) !== false) {
                if ($lineNumber === 1) {
                    $lineNumber++;
                    continue;
                }
                $lineNumber++;

                $row = str_getcsv($data, ";");
                //$date = date('Y-m-d', strtotime(str_replace("/", "-", $row[1])));

                $createQuery = 'INSERT INTO `coupons`(`id`, `code`, `validity_date`, `is_used`, `created_at`, `updated_at`) VALUES (null, `'.$row[0].'`,`'.$date.'`, 0, `'.$today.'`, `'.$today.'`)';

                DB::statement($createQuery, $row);
                $this->command->info($lineNumber);
            }
            fclose($handle);
        }*/
    }
}

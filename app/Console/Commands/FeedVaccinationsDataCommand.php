<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vaccination;
use Exception;

class FeedVaccinationsDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ccs:who_vax';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load the WHO vaccination data into the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filename = storage_path() . "\\vaccination-data.csv";
        $stream = fopen($filename, 'r');
        if (!is_null($stream) || $stream !== FALSE) {
            $index = 0;
            while($row = fgetcsv($stream)) {
                // error_log(print_r($row, true));
                if ($index++ > 0) {
                    try {
                        $country = $row[0];
                        $source = $row[2];
                        $date_updated = $row[4];
                        $total = $row[5];

                        Vaccination::create([
                            'country' => $country,
                            'source' => $source,
                            'date_updated' => $date_updated,
                            'total' => $total
                        ]);
                        error_log('Entered record #' . $index);
                    } catch (Exception $e) {
                        error_log($e->getMessage());
                    }
                    
                }
            }
        }
        return 0;
    }
}

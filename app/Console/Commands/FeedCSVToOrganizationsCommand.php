<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FeedCSVToOrganizationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ccs:read_org_csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reads the storage/organizations.csv file and load the data into the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        error_log("We will load the CSV to the organizations table");
        $filename = storage_path() . "\\organizations.csv";
        $stream = fopen($filename, 'r');
        if (!is_null($stream) || $stream !== FALSE) {
            $index = 0;
            while($row = fgetcsv($stream)) {
                // error_log(print_r($row, true));
                if ($index++ > 0) {
                    $name = $row[0];
                    $address = $row[1];
                    $contact_number = $row[2];
                    $type = $row[3];
                    $website_url = $row[4];

                    // INSERT INTO organizations
                    // SET name="{$name}",
                    // address="{$address}",
                    // contact_number="{$contact_number}",
                    // type="{$type}",
                    // website_url="{$website_url}"

                    DB::table('organizations')->insert([
                        'name' => $name,
                        'address' => $address,
                        'contact_number' => $contact_number,
                        'type' => $type,
                        'website_url' => $website_url
                    ]);

                    // DB::table('organization')->insert(compact(
                    //     'name',
                    //     'address',
                    //     'contact_number',
                    //     'type',
                    //     'website_url'
                    // ));
                }
            }
        }
        return 0;
    }
}

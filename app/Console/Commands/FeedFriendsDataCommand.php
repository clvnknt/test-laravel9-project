<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Friend;
use Illuminate\Support\Facades\DB;

class FeedFriendsDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ccs:feed_friends_csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load the friends.csv file into the database table friends';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        error_log("This is the command that will load the friends.csv file into the database");
        
        $filename = storage_path() . "\\friends.csv";
        $stream = fopen($filename, 'r');

        $index = 0;
        while($row = fgetcsv($stream)) {
            // error_log(print_r($row, true));

            if ($index++ > 0) {
                // Add the data into the DB
                $complete_name = $row[0];
                $email = $row[1];
                $contact_number = $row[2];

                DB::table('friends')->insert([
                    'complete_name' => $complete_name,
                    'email' => $email,
                    'contact_number' => $contact_number
                ]);

                // Friend::create([
                //     'complete_name' => $complete_name,
                //     'email' => $email,
                //     'contact_number' => $contact_number
                // ]);
            }
        }
        
        return 0;
    }
}

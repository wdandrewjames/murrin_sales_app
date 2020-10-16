<?php

namespace App\Console\Commands;

use App\Models\Business;
use App\Models\Status;
use App\Models\Summary as SummaryModel;
use Illuminate\Console\Command;

class Summary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'summary:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Record the current status of users within each business to the summaries table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $statusIds = \App\Models\Status::all()->pluck('id');
        foreach (Business::all() as $business) {
            $counts = $business->customers->countBy('status_id');

            foreach ($statusIds as $status) {
                if (! $counts->has($status)) {
                    $counts[$status] = 0;
                }
            }
            $counts = $counts->sortKeys();
            foreach ($counts as $status => $count) {
                SummaryModel::create([
                    'business_id' => $business->id,
                    'status_id' => $status,
                    'count' => $count,
                    'date' => now(),
                ]);
            }
        }
    }

}
<?php

namespace App\Console\Commands;

use App\Http\Services\Osm\OsmServiceInterface;
use Illuminate\Console\Command;

class PopulateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'query:nodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $osmService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(OsmServiceInterface $osmService)
    {
        parent::__construct();

        $this->osmService = $osmService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->osmService->save_nodes_to_db();
    }
}

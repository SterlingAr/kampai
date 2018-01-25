<?php

namespace App\Console\Commands;
use App\Http\Services\Osm\OsmServiceInterface;

use Illuminate\Console\Command;

class DebugOSM extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:osm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $debug;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(OsmServiceInterface $debug)
    {
        parent::__construct();

        $this->debug = $debug;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->debug->debugger();
    }
}

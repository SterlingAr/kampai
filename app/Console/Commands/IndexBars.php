<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TeamTNT\TNTSearch\TNTSearch;
class IndexBars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:bars';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index the bars in the database';

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
     * @return mixed
     */
    public function handle()
    {
        $tnt = new TNTSearch;
        $driver = config('database.default');
        $config = config('scout.tntsearch') + config("database.connections.$driver");
        $tnt->loadConfig($config);
        $tnt->setDatabaseHandle(app('db')->connection()->getPdo());

        $indexer = $tnt->createIndex('bars.index');
        $indexer->query('SELECT id, node, keywords FROM bars;');
        $indexer->run();
    }
}

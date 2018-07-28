<?php

namespace App\Console\Commands;

use App\Http\Services\Search\SearchServiceInterface;

use Illuminate\Console\Command;

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

    protected $search_service;


    /**
     * IndexBars constructor. SearchServiceInterface $search_service
     * @param SearchServiceInterface $search_service
     */
    public function __construct(SearchServiceInterface $search_service)
    {
        parent::__construct();

//
        $this->search_service = $search_service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->search_service->index_bars();

    }
}

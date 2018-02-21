<?php
/**
 * Created by PhpStorm.
 * User: archie
 * Date: 1/25/18
 * Time: 10:38 AM
 */
namespace App\Http\Services\Search;

use TeamTNT\TNTSearch\TNTSearch;

class SearchService implements SearchServiceInterface
{


    public function index_bars()
    {
        $tnt = new TNTSearch();

        $driver = config('database.default');
        $config = config('scout.tntsearch') + config("database.connections.$driver");
        $tnt->loadConfig($config);

        $tnt->setDatabaseHandle(app('db')->connection()->getPdo());

        $indexer = $tnt->createIndex('bars.index');
        $indexer->setPrimaryKey('id');
        $indexer->query('SELECT id,name keywords, amenity, amenity_es,description,description_1, all_tags FROM bars;');
        $indexer->run();
    }
}
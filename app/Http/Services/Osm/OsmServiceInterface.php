<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/15/18
 * Time: 7:00 PM
 */

namespace App\Http\Services\Osm;


Interface OsmServiceInterface

{
    /**
     * Retrieve data for the nodes within that bbox.
     * @param $node_list
     * @param $bbox
     * @return mixed
     */
    public function retrieve_osm_data($node_list, $bbox);

    /**
     * If no keywords are given.
     * @param $bbox
     * @return mixed
     */
    public function retrieve_all_osm_data($bbox);


    /**
     * @return mixed
     */
    public function save_nodes_to_db();


    public function debugger();


}
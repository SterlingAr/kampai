<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/15/18
 * Time: 7:07 PM
 */

namespace App\Http\Services\Osm;


class OsmService implements OsmServiceInterface
{

    const  BASE_URI = 'https://z.overpass-api.de/api/interpreter?data=';
    const  QUERY_START = '[out:json][timeout:25];(';
    const  QUERY_END = ');out body;>;out skel qt;';


    public function retrieve_osm_data($node_list, $bbox)
    {

        return $this->query_node_data($node_list, $bbox);

    }

    public function retrieve_all_osm_data($bbox)
    {
        return $this->query_all_node_data($bbox);
    }

    /**
     *
     * Given a list of node ids and a map bounding box, query OSM for nodes
     * within the bounding box and
     *
     * @param $node_list
     * @param $bbox
     * @return \Psr\Http\Message\StreamInterface
     */
    private function query_node_data($node_list, $bbox)
    {
        $query_nodes = '';
        $query_bbox = '(' . $bbox . ');';

        foreach($node_list as $node)
        {
            $query_nodes = $query_nodes . 'node(' . (string)$node . ')' . $query_bbox ;
        }

        $query_uri = self::BASE_URI . self::QUERY_START . $query_nodes . self::QUERY_END;


        $res = $this->query_osm($query_uri);

        return $res;
    }

    /**
     * @param $bbox
     * @return \Psr\Http\Message\StreamInterface
     */
    private function query_all_node_data($bbox)
    {
        $format_bbox = '(' . $bbox . ');';
        $key = "amenity";
        $value = "bar";

        $key_block  = "['{$key}'='{$value}']";

        $body_block = "node{$key_block}{$format_bbox}way{$key_block}{$format_bbox}relation{$key_block}{$format_bbox}";

//        dd($body_block);


        $query_uri = self::BASE_URI . self::QUERY_START . $body_block . self::QUERY_END ;

//        dd($query_uri);

        $res = $this->query_osm($query_uri);

        return $res;
    }

    /**
     * @param $query
     * @return \Psr\Http\Message\StreamInterface
     */
    private function query_osm($query)
    {
        $client = new \GuzzleHttp\Client(); // library I use to communicate with other apis

        $res = $client->request('GET',$query);

        return $res->getBody();
    }





}
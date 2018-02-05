<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/15/18
 * Time: 7:07 PM
 */

namespace App\Http\Services\Osm;

use App\Bar;

class OsmService implements OsmServiceInterface
{
    const BBOX_SS = "43.18264913393606,-2.0571899414062504,43.34627851892777,-1.8754005432128908";
    const DEBUG_BBOX = "46.727271481220434,23.481731414794922,46.817213196155656,23.728923797607425";

    const  BASE_URI = 'https://z.overpass-api.de/api/interpreter';
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
     * Given a bbox and amenity, query all nodes and save to db.
     *
     */
    public function save_nodes_to_db()
    {

        $this->save_node_data();

    }


    /**
     * Loop through each node and save it to the database.
     */
    private function save_node_data()
    {

        $osm_obj = json_decode($this->query_all_node_data(self::DEBUG_BBOX));

        $nodes = $osm_obj->elements;


        foreach($nodes as $node)
        {
            $restaurante = 'restaurante';
            $cafeteria = 'cafeteria';
            $comida_rapida = 'comida rapida';

            $bar = new Bar();
            $bar->node = $node->id;

//            if(isset($node->tags))
//                $this->mix_remaining_tags($node);
//

            if(isset($node->tags))
            {

                if(isset($node->tags->name))
                {
                    $bar->name = $node->tags->name;
                }
                else
                {
                    $bar->name = 'no name';
                }


                $amenity = $node->tags->amenity;

                if($amenity == 'restaurant' )
                {
                    $bar->amenity_es = $restaurante;
                }
                if($amenity == 'cafe' )
                {
                    $bar->amenity_es = $cafeteria;
                }
                if($amenity == 'fast_food' )
                {
                    $bar->amenity_es = $comida_rapida;
                }

                if($amenity == 'bar' )
                {
                    $bar->amenity_es =  $amenity;
                }

                $bar->amenity= $amenity;


                if(isset($node->tags->description))
                {
                    $bar->description = $node->tags->description;
                }

                if(isset($node->tags->description_1))
                {
                    $bar->description_1 = $node->tags->description_1;
                }
                print_r($node->id . " [OK]" . "\n");

                $bar->all_tags = $this->mix_remaining_tags($node);


                $bar->save();
            }

        }

    }

    private function mix_remaining_tags($node)
    {
        $tags = $node->tags;
        $all_tags = "";

        foreach($tags as $key => $value)
        {

//                if(
//                $key == 'name' ||
//                $key == 'amenity'
////                $key == 'description' ||
////                $key == 'description_1'
//                )
//                    continue;

                if($key == 'wheelchair' && $value == 'no')
                    continue;

                if($key == 'delivery' && $value == 'no')
                    continue;

                if($key == 'payment:discover_card' && $value = 'no')
                    continue;

                if($key == 'payment:mastercard' && $value = 'no')
                    continue;

                if($key == 'payment:american_express' && $value = 'no')
                    continue;

                if($key == 'smoking' && $value == 'no')
                    continue;

                if($key == 'takeaway' && $value == 'no')
                    continue;

                if($key == 'outdoor_seating' && $value == 'yes')
                    continue;


//            print_r($key . " " . $value . "\n");
            $all_tags = $all_tags . " " . (string) $key . " " . $value;

        }


        return $all_tags;

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



        $res = $this->query_osm($query_nodes);

        return $res;
    }

    /**
     * @param $bbox
     * @return \Psr\Http\Message\StreamInterface
     */
    private function query_all_node_data($bbox)
    {
        $values = array('restaurant','bar','fast_food','bbq','cafe');

        $format_bbox = '(' . $bbox . ');';
        $key = "amenity";
        $body_block = "";

        foreach($values as $value)
        {
//            if($body_block < )
            $key_block  = "['{$key}'='{$value}']";

            $body_block = $body_block .  "node{$key_block}{$format_bbox}way{$key_block}{$format_bbox}relation{$key_block}{$format_bbox}";

        }

        $res = $this->query_osm($body_block);

        return $res;
    }

    /**
     * @param $body_block
     * @return \Psr\Http\Message\StreamInterface
     */
    private function query_osm($body_block)
    {

        $request_param = self::QUERY_START . $body_block .  self::QUERY_END;

        $client = new \GuzzleHttp\Client(); // library I use to communicate with other apis

        $res = $client->request('POST', self::BASE_URI, [
            'form_params' => [
                'data' => $request_param
                ]
        ]);

        $raw_json = $res->getBody();

//        return  $this->filter_bad_nodes($raw_json);
        return $raw_json;
    }

    /**
     * Exclude nodes that have no 'tag' parameters
     */
    private function filter_bad_nodes($raw_json)
    {

        dd($raw_json);
//        return $raw_json;
//        dd($raw_json);

    }


    public function debugger()
    {
        $raw_json = $this->retrieve_all_osm_data(self::DEBUGG_BBOX);
        dd(json_decode($raw_json));
    }

}
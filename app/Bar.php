<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Bar extends Model
{
    //
    protected $fillable = ['node'];

    use Searchable;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }


    /**
     * Get node data
     *
     * @return array
     */
    public function getDataAttribute()
    {

        $baseUri = 'https://z.overpass-api.de/api/interpreter?data=';
        $queryStart = '[out:json][timeout:25];(';
        $queryEnd = ');out body;>;out skel qt;';
        $node = 'node(' . (string)$this->node . ')';

        $osmQuery = $baseUri . urlencode($queryStart . $node . $queryEnd);

        $headers = array(
            'http' => array(
                'method' => 'GET',
                'header' => "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8" .
                            "Accept-Encoding: gzip, deflate, br" .
                            "Accept-Language:en-US,en;q=0.5" .
                            "Connection: keep-alive" .
                            "Host: z.overpass-api.de" .
                            "Upgrade-Insecure-Requests: 1 " .
                            "User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0"
            )
        );

        $context = stream_context_create($headers);

        $json_response = file_get_contents($osmQuery ,false,$context);

        return json_decode($json_response);
    }



    function console_log($data){
        echo '<script>';
        echo 'console.log('. $data  .')';
        echo '</script>';
    }

}

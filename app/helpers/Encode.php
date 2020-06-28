<?php

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Serializer;

final class Encode
{

    public function get_encoded_data($file, $type)
    {

        $json_data = $this->getJsonVal($file,$type);
        $yaml_data = $this->getYamlVal($file,$type);
        $csv_data = $this->getCsvVal($file,$type);
        $custom_output['d_json'] = $json_data;
        $custom_output['d_yaml'] = $yaml_data;
        $custom_output['d_csv'] = $csv_data;

        return $custom_output;
    }

    public function getJsonVal($file,$type){
        $encoders = [new CsvEncoder(), new XmlEncoder(), new JsonEncoder(), new YamlEncoder()];
        $serializer = new Serializer([], $encoders);
        $input_data =  $serializer->decode(file_get_contents($file), $type);
        return $serializer->encode($input_data, 'json');;
    }

    public function getYamlVal($file,$type){
        $encoders = [new CsvEncoder(), new XmlEncoder(), new JsonEncoder(), new YamlEncoder()];
        $serializer = new Serializer([], $encoders);
        $input_data =  $serializer->decode(file_get_contents($file), $type);
        return $serializer->encode($input_data, 'yaml');;
    }

    public function getCsvVal($file,$type){
        $encoders = [new CsvEncoder(), new XmlEncoder(), new JsonEncoder(), new YamlEncoder()];
        $serializer = new Serializer([], $encoders);
        $input_data =  $serializer->decode(file_get_contents($file), $type);
        return $serializer->encode($input_data, 'csv');;
    }
}

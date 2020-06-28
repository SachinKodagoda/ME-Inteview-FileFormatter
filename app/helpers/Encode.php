<?php

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Yaml\Yaml;

final class Encode
{

    public function get_encoded_data($file, $type)
    {

        $json_data = $this->getJsonVal($file,$type);
        $yaml_data = $this->getYamlVal($file,$type);
        $csv_data = $this->getCsvVal($file,$type);
        $yaml2_data = $this->getYaml2Val($file,$type);
        $xml_data = $this->getXml($file,$type);

        // Fixing the final array to send to the controller
        $custom_output['d_json'] = $json_data;
        $custom_output['d_yaml'] = $yaml_data;
        $custom_output['d_csv'] = $csv_data;
        $custom_output['d_yaml2'] = $yaml2_data;
        $custom_output['d_xml'] = $xml_data;

        return $custom_output;
    }

    public function getJsonVal($file,$type){
        // This will decode the file according to data type
        $encoders = [new CsvEncoder(), new XmlEncoder(), new JsonEncoder(), new YamlEncoder()];
        $serializer = new Serializer([], $encoders);
        $input_data =  $serializer->decode(file_get_contents($file), $type);
        // This will encode in json format
        return $serializer->encode($input_data, 'json');
    }

    public function getYamlVal($file,$type){
        // This will decode the file according to data type
        $encoders = [new CsvEncoder(), new XmlEncoder(), new JsonEncoder(), new YamlEncoder()];
        $serializer = new Serializer([], $encoders);
        $input_data =  $serializer->decode(file_get_contents($file), $type);
        // This will encode in yaml type 1 format
        return $serializer->encode($input_data, 'yaml');
    }

    public function getYaml2Val($file,$type){
        // This will decode the file according to data type
        $encoders = [new CsvEncoder(), new XmlEncoder(), new JsonEncoder(), new YamlEncoder()];
        $serializer = new Serializer([], $encoders);
        $input_data =  $serializer->decode(file_get_contents($file), $type);
        // This will encode in yaml type 2 format
        return Yaml::dump($input_data,2);
    }

    public function getCsvVal($file,$type){
        // This will decode the file according to data type
        $encoders = [new CsvEncoder(), new XmlEncoder(), new JsonEncoder(), new YamlEncoder()];
        $serializer = new Serializer([], $encoders);
        $input_data =  $serializer->decode(file_get_contents($file), $type);
        // This will encode in csv format
        return $serializer->encode($input_data, 'csv');
    }

    public function getXml($file,$type){
        // This will decode the file according to data type
        $encoders = [new CsvEncoder(), new XmlEncoder(), new JsonEncoder(), new YamlEncoder()];
        $serializer = new Serializer([], $encoders);
        $input_data =  $serializer->decode(file_get_contents($file), $type);
         // This will encode in xml format
        return $serializer->encode($input_data, 'xml');
    }
}

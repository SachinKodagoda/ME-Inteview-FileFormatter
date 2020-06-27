<?php

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Serializer;


function csv_get_data($file, $type)
{
    $serializer = new Serializer([], [new CsvEncoder()]);
    $encoders = [new CsvEncoder(), new XmlEncoder(), new JsonEncoder(), new YamlEncoder()];
    $serializer = new Serializer([], $encoders);

    $input_data =  "";
    switch ($type) {
        case 'csv':
            $input_data =  $serializer->decode(file_get_contents($file), 'csv');
            break;
        case 'json':
            $input_data =  $serializer->decode(file_get_contents($file), 'json');
            break;
        case 'yaml':
            $input_data =  $serializer->decode(file_get_contents($file), 'yaml');
            break;
        default:
            break;
    }
    $json_data = $serializer->encode($input_data, 'json');
    $yaml_data = $serializer->encode($input_data, 'yaml');
    $csv_data = $serializer->encode($input_data, 'csv');


    $custom_output['d_json'] = $json_data;
    $custom_output['d_yaml'] = $yaml_data;
    $custom_output['d_csv'] = $csv_data;

    return $custom_output;
}

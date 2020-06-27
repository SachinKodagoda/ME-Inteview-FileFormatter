<?php
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Serializer;


function csv_get_data($file)
{
    $rows   = array_map('str_getcsv', file($file));
    $header = array_shift($rows);
    $custom_output = array(
        "body" => array(),
        "header" => array()
    );
    $csv    = array();
    foreach($rows as $row) {
        $csv[] = array_combine($header, $row);
    }

    // $serializer = new Serializer([new CsvEncoder()]);
    $encoder = new JsonEncoder();
    $data = $encoder->encode($csv,'json');

    $custom_output['d_body'] = $rows;
    $custom_output['d_head'] = $header;
    $custom_output['d_json'] = $data;
    $custom_output['d_yaml'] = $data;

    // $associative_output["customer"] = $csv;

    // $encoders = [new XmlEncoder(), new JsonEncoder()];
    // $serializer = new Serializer([], $encoders);

    // $encoder = new XmlEncoder();
    // $encoder->encode(['foo' => ['@bar' => 'value']],'csv');
    // print_r($encoder);
    // csv("fucked");
    // include 'csv.php';
    // die();
    return $custom_output;
}

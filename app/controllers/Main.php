<?php

class Main extends BaseController
{

    public function index()
    {
        if (isset($_FILES["upload"]["name"])) {
            $tmpFile = basename($_FILES['upload']['name']);
            $fileType = strtolower(pathinfo($tmpFile, PATHINFO_EXTENSION));
            $values = [
                "data" => [],
                "error" => null,
                "file_type" => null,
            ];

            $file = $_FILES['upload']['tmp_name'];
            $temp_data = array();
            $encode = new Encode();

            if ($fileType == 'csv') {
                $values["file_type"] = "csv";
                try {
                    array_push($temp_data, $encode->get_encoded_data($file, 'csv'));
                } catch (\Throwable $th) {
                    flash('error_msg', 'Something wrong with the csv file', 'alert alert-danger');
                    $this->view('main/index', $values);
                }
            } else if (($fileType == 'yml') || ($fileType == 'yaml')) {
                $values["file_type"] = "yaml";
                try {
                    array_push($temp_data, $encode->get_encoded_data($file, 'yaml'));
                } catch (\Throwable $th) {
                    flash('error_msg', 'Something wrong with the yaml file', 'alert alert-danger');
                    $this->view('main/index', $values);
                }
            } else if ($fileType == 'json') {
                $values["file_type"] = "json";
                try {
                    array_push($temp_data, $encode->get_encoded_data($file, 'json'));
                } catch (\Throwable $th) {
                    flash('error_msg', 'Something wrong with the json file', 'alert alert-danger');
                    $this->view('main/index', $values);
                }
            } else if ($fileType == 'xml') {
                $values["file_type"] = "xml";
                try {
                    array_push($temp_data, $encode->get_encoded_data($file, 'xml'));
                } catch (\Throwable $th) {
                    flash('error_msg', 'Something wrong with the xml file', 'alert alert-danger');
                    $this->view('main/index', $values);
                }
            } else {
                flash('error_msg', 'Not a supported file type', 'alert alert-danger');
            }
            $values["data"] = $temp_data;
            $this->view('main/index', $values);
        } else {
            $values = [
                "data" => []
            ];
            $this->view('main/index', $values);
        }
    }

    public function getJson()
    {
        download_json($_POST['data_json']);
    }

    public function getYaml()
    {
        download_yaml($_POST['data_yaml']);
    }

    public function getYaml2()
    {
        download_yaml2($_POST['data_yaml2']);
    }

    public function getCsv()
    {
        download_csv($_POST['data_csv']);
    }

    public function getXml()
    {
        download_xml($_POST['data_xml']);
    }
}

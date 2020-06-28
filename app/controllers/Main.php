<?php

class Main extends BaseController
{
    // ADMIN PAGE
    public function index()
    {
        if (isset($_FILES["upload"]["name"])) {
            $tmpFile = basename($_FILES['upload']['name']);
            $fileType = strtolower(pathinfo($tmpFile, PATHINFO_EXTENSION));
            $values = [
                "data" => [],
                "error" => null
            ];

            $file = $_FILES['upload']['tmp_name'];
            $temp_data = array();
            $encode = new Encode();

            if ($fileType == 'csv') {
                try {
                    array_push($temp_data, $encode->get_encoded_data($file, 'csv'));
                } catch (\Throwable $th) {
                    $values["error"] = "wrong csv file uploaded";
                    $this->view('main/index', $values);
                }
            } else if (($fileType == 'yml') || ($fileType == 'yaml')) {
                try {
                    array_push($temp_data, $encode->get_encoded_data($file, 'yaml'));
                } catch (\Throwable $th) {
                    $values["error"] = "wrong yaml file uploaded";
                    $this->view('main/index', $values);
                }
            } else if ($fileType == 'json') {
                try {
                    array_push($temp_data, $encode->get_encoded_data($file, 'json'));
                } catch (\Throwable $th) {
                    $values["error"] = "wrong json file uploaded";
                    $this->view('main/index', $values);
                }
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

    public function getCsv()
    {
        download_csv($_POST['data_csv']);
    }
}

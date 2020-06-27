<?php
include 'csv_get_data.php';
include 'download_csv.php';
include 'download_yaml.php';
include 'download_json.php';
class Main extends BaseController
{
    // ADMIN PAGE
    public function index()
    {
        if (isset($_FILES["upload"]["name"])) {
            $tmpFile = basename($_FILES['upload']['name']);
            $fileType = strtolower(pathinfo($tmpFile, PATHINFO_EXTENSION));
            $values = [
                "data" => []
            ];

            $file = $_FILES['upload']['tmp_name'];
            $temp_data = array();

            if ($fileType == 'csv') {
                array_push($temp_data, csv_get_data($file,'csv'));
            } else if (($fileType == 'yml') || ($fileType == 'yaml')) {
                array_push($temp_data, csv_get_data($file,'yaml'));
            } else if ($fileType == 'json') {
                array_push($temp_data, csv_get_data($file,'json'));
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

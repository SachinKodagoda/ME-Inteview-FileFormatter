<?php
include 'csv_get_data.php';
include 'csv.php';
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

            if ($fileType == 'csv') {
                $file = $_FILES['upload']['tmp_name'];
                $temp_data = array();
                array_push($temp_data, csv_get_data($file));
                $values["data"] = $temp_data;
            }

            $this->view('main/index', $values);
        } else {
            $values = [
                "data" => []
            ];
            $this->view('main/index', $values);
        }
    }

    public function getJson(){
        csv($_POST['data_json']);
    }

    public function getYaml(){
        csv($_POST['data_yaml']);
    }
}

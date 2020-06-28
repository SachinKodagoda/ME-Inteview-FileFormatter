<?php
function download_yaml2($file)
{
    header("Content-type: text/yaml");
    ob_end_clean();
    header("Content-Disposition: attachment; filename=test_customer.yaml");
    print $file;
}

<?php
function download_yaml($file)
{
    header("Content-type: text/json");
    ob_end_clean();
    header("Content-Disposition: attachment; filename=test_customer.yaml");
    print $file;
}

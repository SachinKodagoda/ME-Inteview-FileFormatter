<?php
function download_csv($file)
{
    header("Content-type: text/csv");
    ob_end_clean();
    header("Content-Disposition: attachment; filename=test_customer.csv");
    print $file;
}

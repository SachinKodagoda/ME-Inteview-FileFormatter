<?php
function download_xml($file)
{
    header("Content-type: text/xml");
    ob_end_clean();
    header("Content-Disposition: attachment; filename=test_customer.xml");
    print $file;
}

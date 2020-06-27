<?php
function csv($file)
{
    header("Content-type: application/json");
    header("Content-Disposition: attachment; filename=customer.json");
    print $file;
}

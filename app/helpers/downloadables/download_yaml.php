<?php
function download_yaml($file)
{
    header("Content-type: text/yaml");
    ob_end_clean();
    header("Content-Disposition: attachment; filename=yml1_file.yaml");
    print $file;
}

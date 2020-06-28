<?php
require_once 'config/config.php';
require_once 'helpers/Encode.php';
require_once 'helpers/downloadables/download_csv.php';
require_once 'helpers/downloadables/download_json.php';
require_once 'helpers/downloadables/download_yaml.php';
require_once 'helpers/downloadables/download_yaml2.php';
require_once 'helpers/downloadables/download_xml.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/composer/vendor/autoload.php';

// Autoload Core Library
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
<?php
require 'vendor/autoload.php';

use App\Cadavrekski;
use App\FileDriver;
use App\MysqlDriver;


(new Cadavrekski(new FileDriver()))
	->run($argv);
<?php

namespace factcli\divers;
require_once 'vendor/autoload.php';
class Outils{

    public static function headerHTML($pageTitle) {
        echo "<!DOCTYPE html><html lang=\"fr\">";
        echo "<head><link rel='stylesheet' href='design.css' /><title>".$pageTitle."</title></head>";
        echo "<body>";
    }

    public static function footerHTML(){
        echo "</body>";
    }

}

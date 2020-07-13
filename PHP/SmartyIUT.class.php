<?php
    
set_include_path(get_include_path().":/usr/share/php/smarty3");
require_once "Smarty.class.php";


class SmartyIUT extends Smarty
{

    public function __construct()
    {
        parent::__construct();

        $this->template_dir = getcwd() ."/templates/";
        $this->compile_dir = getcwd() ."/templates_c/";
        $this->config_dir = getcwd() ."/configs/";
        $this->cache_dir = getcwd() ."/cache/";

    }
}
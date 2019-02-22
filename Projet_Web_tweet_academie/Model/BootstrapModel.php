<?php
spl_autoload_register('model_autoload');

function model_autoload($class){
    require "class/$class.php";
}
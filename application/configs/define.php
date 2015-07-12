<?php
$define = array(
    "STATIC_BK"     =>  "/static/templates/backend",
    "BACKEND"       =>  "/auth",
    "FRONTEND"      =>  $_SERVER['HTTP_HOST'],
);

define("STATIC_URL" , json_encode($define));
<?php
$define = array(
    "STATIC_BK"     =>  "/static/templates/backend",
    "BACKEND"       =>  "/auth",
    "FRONTEND"      =>  $_SERVER['HTTP_HOST'],
    "UPLOAD_DIR"    =>  "static/uploads/",
    "STATIC_FT"	    =>  "/static/templates/frontend/assets",
    'SHIP_PRICE'    =>  200000
);

define("STATIC_URL" , json_encode($define));
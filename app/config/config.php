<?php
    // DATABASE
    define("DB_HOST", $_ENV["DB_HOST"] ?? "localhost");
    define("DB_USER", $_ENV["DB_USER"] ?? "root");
    define("DB_PASS", $_ENV["DB_PASS"] ?? "");
    define("DB_NAME", $_ENV["DB_NAME"] ?? "lotus");


    // SITENAME
    define("SITENAME", "Lotus");

    // APPROOT
    define("APPROOT", dirname(dirname(__FILE__)));

    // URLROOT
    define("URLROOT", "localhost");
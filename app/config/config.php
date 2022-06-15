<?php
    // DATABASE
    define("DB_HOST", $_ENV["DB_HOST"] ?? "localhost");
    define("DB_USER", $_ENV["DB_USER"] ?? "root");
    define("DB_PASS", $_ENV["DB_PASS"] ?? "");
    define("DB_NAME", $_ENV["DB_NAME"] ?? "lotus");
    define("DB_PORT", $_ENV["DB_PORT"] ?? 3306);

    // SITENAME
    define("SITENAME", "Lotus");

    // APPROOT
    define("APPROOT", dirname(dirname(__FILE__)));

    // URLROOT
    define("URLROOT", $_ENV["URLROOT"] ?? "localhost");
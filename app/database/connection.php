<?php

function getConnection()
{
    return new PDO("mysql:host=localhost; dbname=site_devCart", "root", "", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
}
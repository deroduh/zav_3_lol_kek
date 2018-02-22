<?php


class Db
{

    public static function getConnection()
    {
        // Отримання параметрів підключення з файлу
        $paramsPath = 'db_params.php';
        $params = include($paramsPath);

        // Встановлення зєднання
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        // Задання кодування
        $db->exec("set names utf8");

        return $db;
    }

}

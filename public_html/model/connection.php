<?php

class Connection
{
    public static $instance;

    public static function getConnection() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=localhost;dbname=presentes", "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar: ". $e->getMessage());
            }
        }
        return self::$instance;
    }

    public static function closeConnection() {
        self::$instance = null;
    }
}
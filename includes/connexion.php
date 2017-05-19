<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=informagenie;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die($e->getMessage());
}
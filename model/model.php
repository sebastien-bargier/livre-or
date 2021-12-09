<?php

function dbConnect() {
    $db = mysqli_connect('localhost','root','','livreor');
    return $db;
}
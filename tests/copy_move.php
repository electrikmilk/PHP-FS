<?php
require_once "../src/Files.php";
include_once "reset.php";
$files = Files::getInstance("files");

$files->copy("file.txt");
$files->move("file2.txt","directory");
$files->rename("file.txt","file3.txt");
$files->copy("file.txt","directory/file.txt");

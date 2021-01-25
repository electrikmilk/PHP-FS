<?php
require_once "../src/Files.php";
include_once "reset.php";
$files = new Files::getInstance("files");

$files->file("file.txt","new content");
echo $files->file("file.txt");

$files->file("file.txt","new new content");
echo $files->file("file.txt");

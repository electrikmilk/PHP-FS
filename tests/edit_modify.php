<?php
include_once "../src/Files.php";
$files = new Files::getInstance("files");

$files->file("file.txt","new content");
echo $files->file("file.txt");

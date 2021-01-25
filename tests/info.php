<?php
require_once "../src/Files.php";
include_once "reset.php";
$files = new Files::getInstance("files");

print_r($files->info("directory"));

$file->file("file.txt","new content");
echo $file->size("file.txt");

echo $files->count("directory");

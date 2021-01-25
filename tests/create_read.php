<?php
require_once "../src/Files.php";
include_once "reset.php";
$files = Files::getInstance("files");

$files->dir("directory/new_dir");
$files->file("new_file.txt","content");

print_r($files->dir("directory"));
print_r($files->dir("directory2"));

echo $files->file("new_file.txt");

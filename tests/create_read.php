<?php
include_once "../src/Files.php";
$files = new Files::getInstance("files");

$files->dir("new_dir");
$files->file("new_file.txt");

print_r($files->dir("directory"));
print_r($files->dir("directory2"));

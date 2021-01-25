<?php
include_once "../src/Files.php";
$files = new Files::getInstance();
$files->delete("files",false);
$files->dir("files");
$files->path("files");
$files->dir("directory");
$files->dir("directory/subdir");
$files->file("directory/subdir/test1.txt");
$files->file("directory/subdir/test2.txt");
$files->dir("directory2");
$files->file("file.txt");
$files->file("file2.txt");

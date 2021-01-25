<?php
require_once "../src/Files.php";
include_once "reset.php";
$files = Files::getInstance("files");

$files->delete("directory");
$files->delete("directory2");
$files->delete("file.txt");

$files->delete("directory2",false); // nuke the folder

$files->delete(); // this should delete the folder and the instance

$test = new Files::getInstance();
$test->dir("test");
$test->destroy();
$test->info(); // try to use it again
$test = new Files::getInstance("test");
$test->delete();

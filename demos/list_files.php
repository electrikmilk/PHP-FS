<?php

require_once "../src/Filesystem.php";

$path = "/path/to/files/";

$files = new Filesystem($path);

$list = $files->list();
if($list) {
  echo "<ul>";
  foreach ($list as $file) {
    $f = new Filesystem("$path/$file");
    $info = $f->info();
    echo "<li>$file &mdash; {$info['type']} &mdash; {$f->size()}</li>";
  }
  echo "</ul>";
} echo "No files exist in this directory";

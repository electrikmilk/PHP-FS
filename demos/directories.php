<?php

$path = "path/to/dir";
$dir = new Filesystem:getInstance($path);

// get count of files and folders in directory
$count = $dir->count();
echo "This directory has {$count['files']} files and {$count['folders']} folders. Total is {$count['total']} files and folders.<br/>";

// get size of directory
$size = $dir->size(); // get raw size of directory in bytes
$formatted_size = $dir->size(true); // get formatted size of directory (eg. 256 GB)
echo "This folder is exactly $size bytes; sorry does that not make sense? This folder is about $formatted_size.";

// list files in a directory
echo "<ul>";
foreach ($dir->list() as $file) {
  $f = new Filesystem("$path/$file");
  $info = $f->info();
  echo "<li>$file &mdash; {$info['type']} &mdash; {$f->size()}</li>";
}
echo "</ul>";

$dir->delete(); // deletes the directory; WARNING: this will unset the instance.
$dir->delete("file.txt"); // deletes specified file within the path
$dir->delete("directory"); // deletes specified directory within the path
$dir->delete("directory/subdirectory"); // you can obviously just keep going deeper if you'd like

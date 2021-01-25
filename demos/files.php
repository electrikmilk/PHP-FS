<?php

$file = new Files:getInstance("path/to/file.txt"); // create/get instance of file, making it the current path
// Subject to change: specifying a file as the path or path might be confusing, but allows you to get info on a file, change or get the contents of it, etc.

// get info about file
$info = $file->info();
echo "This file is a {$info['mime']} type file. It's at the directory {$info['dir']}, and without an extension it would be {$info['base']}.<br/>";

// get size of file
$size = $file->size(); // get raw size of file in bytes
$formatted_size = $file->size(true); // get formatted size of file (eg. 256 GB)
echo "This file is exactly $size bytes; sorry does that not make sense? This file is about $formatted_size.";

// the following only applies if you set the path as a file and not a directory
$contents = $file->file(); // returns contents of file
$file->file("Change file contents"); // changes the content of the current file, this only works if the path is a file

$file->delete(); // deletes the file; WARNING: this will unset the instance.

<?php
// Basic instantiate
$files = new Filesystem("path/to/files"); // This will create a new Filesystem instance and set the path (current working directory).

/*
Instantiate using getInstance (recommended).
This will create a new Filesystem instance and set the path (current working directory),
but will return the existing instance if we have already created an instance for this path.
*/
$files = new Filesystem::getInstance("path/to/files");

// specifying a non-existant path/cwd will die(), specifying no path will default to __DIR__.

/*
all methods below are set to return requested data, bool, or NULL.
data = data you requested using file(), info() or dir() for example
bool = true meaning something went right, false meaning something went wrong
NULL = meaning something does or does not exist
*/

$files->path("set/new/path"); // change the path for this instance.
$files->info($name); // returns array of info about file or directory, pass an argument to instead get info about a file or directory in path.
$files->size($format); // byte count of current file or directory. $format (bool): true will return formatted byte count (eg. 256 KB), false will return raw byte count.
$files->count(); // numbers of files and folder in a directory, this includes subfolders and files.
$files->list(); // returns array of files list at set directory, returns NULL if directory is empty.
$files->empty($name); // if $name, returns true|false based on if directory at path/$name is empty, if no $name, returns true|false based on if path is empty.
$files->file($name); // if file does not exist, creates file at path/$name; if file does exist, returns file content.
$files->file($name,$newcontent); // change content of existing file or create new file with content
$files->copy($item); // copy file or directory in current path (will append " copy")
$files->copy($item,$newpath); // copy file or directory from path to new path
$files->move($item,$newpath); // move file or directory from path to new path
$files->rename($item,$newname); // change name of file or directory to $newname
$files->dir($name); // creates directory at path/$name if it does not already exist.
$files->delete($name); // deletes file or directory at path/$name, WARNING: deletes all files & subdirectories within a directory; $name argument only applies if current path is a directory.

<?php
// Create instance and set path.
$files = new Files::getInstance("path/to/files");

/* CLASS METHODS */

/*
path()
arguments: $path

change the path/cwd for this instance
if no $path, defaults to __DIR__
will die() if path doesn't exist or isn't readable
will continue if path is read-only, but gives notice, and methods that write will return false
*/
$files->path($path);

/*
info()
arguments: $path (optional)

returns array of info about file or directory ($path), pass an argument to instead get info about a file or directory in cwd

example output:
{
  name:"file",
  base:"file.txt",
  ext:"txt",
  dir:"path/to/file",
  mime:"text/plain",
  type:"file"
}
*/
$files->info($path);

/*
file()
arguments: $path (optional if cwd is file), $content (optional)

if file does not exist, creates file at cwd/$path with $content; if does exist, changes content of existing file to $content
*/
$files->file($path,$content);

/*
dir()
arguments: $path (optional if cwd is directory), $time, $order (bool)

creates directory at path/$name if it does not already exist
if it does exist, returns array of files within directory
returned array is basically combined info() methods
$time by can be "m", "c", or "a" (m = modified, c = changed, a = accessed) default is "m", this sets the timestamp in the key
$order: true (default, sort ascending), false (sort decending)

example output:
[
  "2020-01-01 02:59:00":{
    name:"file",
    type:"file",
    mime:"text/plain",
    base:"file.txt",
    ext:"txt",
    dir:"path/to/file",
    "mod":"2020-01-01 02:59:00",
    "change":"2020-01-01 02:59:00",
    "access":"2020-01-01 02:59:00"
  },
  "2020-01-02 02:59:00":{
    name:"directory",
    type:"dir",
    dir:"path/to/directory",
    "mod":"2020-01-01 02:59:00",
    "change":"2020-01-01 02:59:00",
    "access":"2020-01-01 02:59:00"
  }
]
*/
$files->dir($path,$time,$order);

/*
size()
directory arguments: $path, $format (bool)
file arguments: $format (bool)

(if $format true): returns raw byte count of cwd or $path (eg. 10240)
(if $format false): returns formatted size of cwd or $path (eg. 256 KB)
*/
$files->size($path,$format); // if cwd is directory
$files->size($format); // if cwd is file

/*
count()
arguments: $path (optional if cwd is directory)

returns array of items in a directory, this includes subfolders and files

example output:
{
  "files":"32,
  "folders":256,
  "total":288
}
*/
$files->count($path);

/*
empty()
arguments: $name

returns bool on wheather or not directory at path is empty
*/
$files->empty($path);

/*
copy() and move()
arguments: $path, $newpath (optional if using copy() and $path or cwd is a file)

copies or moves $path to $newpath
*/
$files->copy($path,$newpath);
$files->move($path,$newpath);

/*
rename()
arguments: $name, $newname

renames file or directory at $name, to $newname
*/
$files->rename($name,$newname);

/*
delete()
arguments: $path (does not apply if cwd is a file), $safe (bool)

remove file or directory at $path

WARNING: setting $safe to false while deleting a directory will delete all files and subdirectories within the directory
*/
$files->delete($path,$safe);

/*
destroy()

unsets the current instance
*/
$files->destroy();

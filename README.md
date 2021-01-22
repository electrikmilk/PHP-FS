# PHP Files Class (WIP)
A simple PHP filesystem class that takes care of some of the heavy lifting of managing files. This is particularly useful when building a file manager backend.

# Usage

```php
$files = new Files::getInstance("path/to/dir");
$files->file("file.txt"); // create a file
$files->dir("dir") // create a directory

$files->dir("dir_exist") // get array of files from existing directory

$files->info();
/*
get array of info about current directory
or pass a file or directory name argument to get info about that file or directory
*/
```

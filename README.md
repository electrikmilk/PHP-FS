# PHP Files Class (WIP)
A simple PHP filesystem class that takes care of some of the heavy lifting of managing files. This is particularly useful when building a file manager backend.

# Usage

```php
$files = new Files::getInstance("path/to/dir"); // create/get instance of file or directory

// get array of info about current file or directory (or pass argument with name of file or directory to get info about)
$files->info("file.txt"); // {name:"file",base:"file.ext",ext:".txt",dir:"path/to/file",mime:"text/plain",type:"file"}
```

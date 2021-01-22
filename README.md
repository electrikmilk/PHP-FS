# PHP Files Class
Simple PHP class that takes care of some of the heavy lifting of managing files. This is particularly useful when building a file manager backend.

# Usage

```php
$files = new Files::getInstance("path/to/dir"); // create/get instance of file or directory
$files->info("file.txt"); // {name:"file",base:"file.ext",ext:".txt",dir:"path/to/file",mime:"text/plain",type:"file"}

/* Check out examples.php for full usage examples */
```

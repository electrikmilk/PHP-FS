# PHP Files Class

PHP class that takes care of some of the heavy lifting of managing files. This is particularly useful when building a file manager backend.

Please let me know if you have suggestions on how the class can be better. I'm making this because I like making filesystem related code and want to practice, but also want to try and make a truly helpful class I and others can benefit from using in the future.

**DISCLAIMER:** This class is WIP. I wouldn't recommend using this class into any project until it has been fully tested. I will remove this disclaimer when it has.

# Usage

Create class instance and set the path or current working directory.

```PHP
$files = new Files::getInstance("path/to/files");
```

You can set the path as a file, but it's generally recommended to set it as a directory as you have access to more methods and it's less confusing.

Specifying no path will default path to `__DIR__` (cwd of script that class is included on).

### Instance will `die()` and not be instantiated if...
- Path does not appear to exist
- Path does not appear to be readable

*The class will still instantiate if path is read-only. You will get a NOTICE if so, and methods that write will return false.*

### All methods are set to return requested data, a boolean, or NULL:
- data (string or array) = data you requested using file(), info(), or dir() for example
- bool = true meaning something went right, false meaning something went wrong
- NULL = something already exists or does not exist
- empty = usually means you ran a method on someting it wasn't meant for (eg. count() is for directories not files)

<hr/>

Most methods have an argument allowing you to specify the file or directory inside of the path you instantiated with.

However, most methods don't require an argument and can just use the current path instead. For example:

```PHP
$files->info(); // use current path
$files->info("file.txt"); // use file in current path
$files->info("directory"); // use directory in current path
```

Methods lead double lives depending on if a file or directory exists:

```PHP
$files->file("file.txt"); // create file
$files->file("file2.txt","content"); // create file with content
$files->dir("directory"); // create directory

// ...and now that they exist...

$files->file("file.txt"); // read existing file
$files->file("file2.txt","new content"); // change contents of existing file
$files->dir("directory"); // get array of existing directory contents
```

Delete files and folders and destroy instances:

```PHP
$files->delete() // delete current path, and by proxy, this instance
$files->delete("file.txt") // delete file or directory in current path
$files->destroy(); // destroy the current instance
```

Check out examples.php for complete usage examples.

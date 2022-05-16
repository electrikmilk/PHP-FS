<?php
// The File class manages single file...
$file = new File("path/to/file.txt");
$file->info(); // included in info()
$file->size();
$file->contents();
$file->update("new content");
$file->remove();

// The Files class manages files generally...

Files::file("path/to/file.txt");
Files::info("path/to/file.txt");
Files::size("path/to/file.txt"); // included in info()

Files::dir("path/to/dir");
Files::count("path/to/dir");

Files::createFile("path/to/file.txt");
Files::createDir("path/to/dir");

/*
info() method output
this is also how items from Files::files() are returned...
*/
'name' => 'file.txt'
'filename' => 'file',
'type' => 'file',
'mime' => 'text/plain',
'ext' => 'txt',
'last_access' => UNIX_TIMESTAMP,
'last_mod' => UNIX_TIMESTAMP,
'created' => UNIX_TIMESTAMP,

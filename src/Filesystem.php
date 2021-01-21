<?php
class Filesystem {
  private static $instance = null;
  private $path;
  private function __construct($path) {
    try {
      if(!$path)throw new TypeError( "Path not specified." );
      if(!file_exists($path))throw new TypeError( "Path '$path' does not exist" );
      $this->path = $path;
    } catch(TypeError $e) {
      die($e);
    }
  }
  public static function getInstance( $path ) {
    if ( !isset( self::$_instance ) ) {
      self::$instance = new Filesystem( $path );
    }
    return self::$instance;
  }
  public function path($path) {
    try {
      if(!$path)throw new TypeError( "Path not specified." );
      if(!file_exists($path))throw new TypeError( "Path '$path' does not exist" );
      $this->path = $path;
    } catch(TypeError $e) {
      die($e);
    }
  }
  public function info() { // size() and count() not included for speed
    $info = array();
    $parts = pathinfo($this->path);
    $type = "file";
    if(is_dir($this->path))$type = "folder";
    $info['name'] = $parts['filename'];
    $info['base'] = $parts['basename'];
    $info['ext'] = $parts['extension'];
    $info['dir'] = $parts['dirname'];
    $info['mime'] = mime_content_type($this->path);
    $info['type'] = $type;
    return $info;
  }
  public function size($format = false) {
    $bytes = filesize($this->path);
    if($format === true) { // make it readable
      if ( $bytes >= 1073741824 )$bytes = number_format( $bytes / 1073741824, 2 ) . ' GB';
    	elseif ( $bytes >= 1048576 )$bytes = number_format( $bytes / 1048576, 2 ) . ' MB';
    	elseif ( $bytes >= 1024 )$bytes = number_format( $bytes / 1024, 2 ) . ' KB';
    	elseif ( $bytes > 1 )$bytes = $bytes . ' bytes';
    	elseif ( $bytes == 1 )$bytes = $bytes . ' byte';
    	else $bytes = '0 bytes';
    }
  	return $bytes;
  }
  public function count() {
    $count[ 'files' ] = 0;
    $count[ 'folders' ] = 0;
    $count[ 'total' ] = 0;
    $path = realpath( $this->path );
    $dir = opendir( $this->path );
    while ( ( $file = readdir( $dir ) ) !== false ) {
      if ( $file != "." && $file != ".." ) {
        if ( is_file( "$this->path/$file" ) ) {
          $count[ 'files' ]++;
          $count[ 'total' ]++;
        }
        if ( is_dir( "$this->path/$file" ) ) {
          $count[ 'folders' ]++;
          $count[ 'total' ]++;
          $counts = $this->count( "$this->path/$file" );
          $count[ 'folders' ] += $counts[ 'folders' ];
          $count[ 'files' ] += $counts[ 'files' ];
        }
      }
    }
    closedir( $dir );
    return $count;
  }
  public function list() {
    $folder_array = array();
    if ( $handle = opendir( $this->path ) ) {
      while ( false !== ( $entry = readdir( $handle ) ) ) {
        if ( $entry != "." && $entry != ".." && $entry[0] !== "." )array_push( $folder_array, $entry );
      }
      closedir( $handle );
    }
    if ( empty( $folder_array ) ) return false;
    else return $folder_array;
  }
  public function empty() {
    if ( !is_readable( $this->path ) ) return NULL;
    return ( count( scandir( $this->path ) ) == 2 );
  }
  public function file($name) {
    if(!$name)return;
    else {
      $path = "$this->path/$name";
      if(!file_exists($path)) {
        if(file_put_contents($path))return true;
        else return false;
      } else file_get_contents($path);
    }
  }
  public function folder($name) {
    if(!$name)return;
    else {
      if ( !file_exists( "$this->path/$name" ) ) {
        if(mkdir( "$this->path/$name", 0777, true ))return true;
        else return false;
      } else return NULL;
    }
  }
  public function delete($name) {
    $path = "$this->path/$name";
    if(!$name)return;
    else if(file_exists($path)) {
      if(is_dir($path)) {
        if ( substr( $path, strlen( $path ) - 1, 1 ) != '/' )$path .= '/';
        $files = glob( $path . '*', GLOB_MARK );
        foreach ( $files as $file ) {
          if ( is_dir( $file ) )self::delete( $file );
          else unlink( $file );
        }
        if(rmdir( $path ))return true;
        else return false;
      } else {
        if(unlink($path))return true;
        else return false;
      }
    } else return NULL;
  }
}

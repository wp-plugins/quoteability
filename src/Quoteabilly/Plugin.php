<?php
class Quoteabilly_Plugin implements ArrayAccess {
  protected $contents;

  public function __construct() {
    $this->contents = array();
  }

  /**
   * Plugin meta links.
   *
   * Adds links to the plugins meta.
   *
   * @since 1.0.0
   *
   * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/preprocess_comment
   */
  public function plugin_row_meta( $links, $file ) {
    if ( false !== strpos( $file, 'quoteabilly.php' ) ) {
      $links = array_merge( $links, array( '<a href="https://benmarshall.me/quoteabilly/">Documentation</a>' ) );
      $links = array_merge( $links, array( '<a href="https://www.gittip.com/bmarshall511/">Donate</a>' ) );
    }
    return $links;
  }

  public function offsetSet( $offset, $value ) {
    $this->contents[$offset] = $value;
  }

  public function offsetExists($offset) {
    return isset( $this->contents[$offset] );
  }

  public function offsetUnset($offset) {
    unset( $this->contents[$offset] );
  }

  public function offsetGet($offset) {
    if( is_callable($this->contents[$offset]) ){
      return call_user_func( $this->contents[$offset], $this );
    }
    return isset( $this->contents[$offset] ) ? $this->contents[$offset] : null;
  }

  public function run() {
    foreach( $this->contents as $key => $content ){ // Loop on contents
      if( is_callable($content) ){
        $content = $this[$key];
      }
      if( is_object( $content ) ){
        $reflection = new ReflectionClass( $content );
        if( $reflection->hasMethod( 'run' ) ){
          $content->run(); // Call run method on object
        }
      }
    }

    add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
  }
}
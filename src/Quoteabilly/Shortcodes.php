<?php
class Quoteabilly_Shortcodes {
  public function run() {
    add_shortcode( 'quoteabilly', array( $this, 'quoteabilly' ) );
  }

  public function quoteabilly( $atts, $content = "" ) {
    $data = '';
    if ( count( $atts )  > 0 ) {
      foreach( $atts as $key => $val ) {
        $data .= ' data-' . $key . '="' . $val . '"';
      }
    }

    return "<blockquote class='quoteabilly'" . $data . ">$content</blockquote>";
  }
}
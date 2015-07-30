<?php
class Quoteability_Shortcodes {
  public function run() {
    add_shortcode( 'quoteability', array( $this, 'quoteability' ) );
  }

  public function quoteability( $atts, $content = "" ) {
    $data = '';
    if ( is_array( $atts ) && count( $atts )  > 0 ) {
      foreach( $atts as $key => $val ) {
        $data .= ' data-' . $key . '="' . $val . '"';
      }
    }

    return "<blockquote class='quoteability'" . $data . ">$content</blockquote>";
  }
}
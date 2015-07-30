<?php
class Quoteabilly_Scripts {
  public function run() {
    add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
    add_action( 'login_footer', array( $this, 'wp_enqueue_scripts' ) );
  }

  public function wp_enqueue_scripts() {
    $this->register_styles();
    $this->register_scripts();

    $this->enqueue_styles();
    $this->enqueue_scripts();
  }

  public function register_styles() {
    wp_register_style( 'quoteabilly', plugins_url( '/css/quoteabilly.css', QUOTEABILLY_PLUGIN ) );
  }

  public function register_scripts() {
    wp_register_script( 'quoteabilly', plugins_url( '/js/quoteabilly.js' , QUOTEABILLY_PLUGIN ), array( 'jquery' ), '1.0.0', true );
  }

  public function enqueue_styles() {
    wp_enqueue_style( 'quoteabilly' );
  }

  public function enqueue_scripts() {
    wp_localize_script( 'quoteabilly', 'quoteabilly', array( 'url' => home_url( add_query_arg( NULL, NULL ) ), 'btn' => 'Tweet This Quote' ) );
    wp_enqueue_script( 'quoteabilly' );
  }
}
<?php

add_action( 'shutdown', function(){
    d( $GLOBALS['wp_actions'] ); 
});

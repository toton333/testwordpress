<?php
//read more

function new_excerpt_more( $more ) {
    return ' <span class="readmore"><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('--Read More--', 'testwordpress') . '</a></span>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

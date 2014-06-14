<?php

get_header(); ?>
 
<div id="page">
        <div id="page-bgtop">
            <div id="page-bgbtm">
                <div id="content">


<?php if ( have_posts() ) : ?>
 
<header class="page-header">
    <h1 class="page-title">
        <?php
            if ( is_category() ) {
                printf( __( 'Category Archives: %s', 'testwordpress' ), '<span>' . single_cat_title( '', false ) . '</span>' );
 
            } elseif ( is_tag() ) {
                printf( __( 'Tag Archives: %s', 'testwordpress' ), '<span>' . single_tag_title( '', false ) . '</span>' );
 
            } elseif ( is_author() ) {
                
                the_post();
                printf( __( 'Author Archives: %s', 'testwordpress' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
               
                rewind_posts();
 
            } elseif ( is_day() ) {
                printf( __( 'Daily Archives: %s', 'testwordpress' ), '<span>' . get_the_date() . '</span>' );
 
            } elseif ( is_month() ) {
                printf( __( 'Monthly Archives: %s', 'testwordpress' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
 
            } elseif ( is_year() ) {
                printf( __( 'Yearly Archives: %s', 'testwordpress' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
 
            } else {
                _e( 'Archives', 'testwordpress' );
 
            }
        ?>
    </h1>
    <?php
        if ( is_category() ) {
            // show an optional category description
            $category_description = category_description();
            if ( ! empty( $category_description ) )
                echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
 
        } elseif ( is_tag() ) {
            // show an optional tag description
            $tag_description = tag_description();
            if ( ! empty( $tag_description ) )
                echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
        }
    ?>
</header><!-- .page-header -->
 
<?php while ( have_posts() ) : the_post(); ?>

    <div class="post">
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="meta">Posted by <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?>
            &nbsp;&bull;&nbsp; <a href="<?php comments_link(); ?>" class="comments">Comments (<?php comments_number('0', '1', '%') ?>)</a> &nbsp;&bull;&nbsp; <a href="<?php the_permalink(); ?>" class="permalink">Full article</a></p>
        <div class="entry"> 
        
            <?php if ( is_category() || is_archive() ) {
                                the_excerpt();
                            } else {
                                the_content();
            } ?>
        </div>
    </div>

<?php endwhile; endif; wp_reset_postdata(); ?>

 <div style="clear: both;">&nbsp;</div>
</div>
<!-- end #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
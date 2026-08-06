<?php
/* Template Name: Reviews Page Template */
get_header();
?>

<?php include( get_stylesheet_directory() . '/partials/page-header.php' ); ?>

<main id="page-content">
    <div class="page-container">
        <div class="page-col-full">
            <div id="page-column" class="full-width">

                <section id="reviews-main">

                    <p><?php the_content(); ?></p>
<?php
                    $page_reviews = get_posts([
                        'post_type' => 'reviews',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ]);

                    if ($page_reviews) :
                        foreach ($page_reviews as $post) :
                            setup_postdata($post);
                            
                    ?>

                            <div class="testi-item inr review-item <?php echo ($count > 4) ? 'hidden-review' : ''; ?>">
                                <h5>-<?php the_title(); ?></h5>

                                <div class="star-rat">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sdbr-start-img.webp" width="119" height="21">
                                </div>

                                <h4><?php echo get_field("sub_title"); ?></h4>

                                <p><?php the_content(); ?></p>
                            </div>

                    <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                    ?>


                </section>

            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
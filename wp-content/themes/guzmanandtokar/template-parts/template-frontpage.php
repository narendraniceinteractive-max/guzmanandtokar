<?php
/* Template Name: Front Page Template 
 * @package rmtheme
 */
get_header();
?>
<main id="home-content">

    <div class="hm-bnr-sec">
        <div class="container">
            <?php echo get_field("home_banner_section") ?>
        </div>
    </div>

    <div class="case-about-cmn-sec">
        <div class="hm-case-results-section">
            <div class="container">
                <h2 class="text-heading">Our Case Results</h2>
                <p>Proven Results for Working People</p>
                <div class="case-list owl-carousel">
                    <?php
                    $page_case_results = get_posts([
                        'post_type' => 'case_result',
                        'posts_per_page' => 9,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ]);

                    if ($page_case_results):
                        foreach ($page_case_results as $post):
                            setup_postdata($post);
                            ?>
                            <div class="case-resuls-item">
                                <p><?php the_content(); ?></p>
                                <!-- <h4><?php the_title(); ?></h4> -->
                                <h5><?php echo get_field("sub_title") ?> </h5>
                            </div>
                            <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="case-res-btn">
                    <a href="<?php echo site_url('/case-results'); ?>" class="cmn-btn">View More Results</a>
                </div>
            </div>
        </div>

        <div class="hm-about-sec">
            <div class="container">
                <?php echo get_field("home_about_section") ?>
            </div>
        </div>
    </div>

    <div class="practice-areas-section">
        <div class="container">
            <?php echo the_field("home_practice_areas_section") ?>
        </div>
    </div>

    <div class="employment-sec">
    <div class="container">
        <?php echo do_shortcode(get_field('employment_section', 'option')); ?>
    </div>
</div>

    <div class="attorney-section">
        <div class="container">
            <?php echo the_field("home_attorney_section") ?>
        </div>
    </div>

    <div class="hm-testimonials">
        <div class="container">
            <h2 class="text-heading">What Our Clients Are Saying</h2>
            <div class="hm-testimonials-stras">
                <div class="hm-testimonials-avoo-rating-imge"><img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/images/testimonials-avvo-star-img.webp "
                        alt="testimonials-avvo-star-image" width="146" height="107"></div>
                <div class="hm-testimonials-avoo-imge"><img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/images/testimonials-avo-rating-imag.webp "
                        alt="testimonials-avo-rating-image" width="136" height="69"></div>
            </div>
            <div class="hm-testi-list owl-carousel">
                <?php
                $page_reviews = get_posts([
                    'post_type' => 'reviews',
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ]);
                if ($page_reviews):
                    foreach ($page_reviews as $post):
                        setup_postdata($post); ?>
                        <div class="testi-item">
                            <h4><?php echo get_field("sub_title"); ?></h4>
                            <p><?php echo wp_trim_words(get_the_content(), 80); ?></p>
                            <h5><?php the_title(); ?></h5>
                        </div>
                    <?php endforeach;
                    wp_reset_postdata();
                endif; ?>
            </div>
            <div class="hmtesti-btn"><a href="<?php echo esc_url(home_url('/client-testimonials/')); ?>" class="cmn-btn">View
                    More Testimonials</a></div>
        </div>
    </div>

    <?php
    get_footer();

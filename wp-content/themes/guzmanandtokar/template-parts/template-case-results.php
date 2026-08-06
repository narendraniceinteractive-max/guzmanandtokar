<?php
/* Template Name: Case Results Page Template */
get_header();
?>
<?php include( get_stylesheet_directory() . '/partials/page-header.php' ); ?>
<main id="page-content">
    <div class="page-container">
        <div class="page-col-full">
           <div id="page-column" class="full-width">
            <section id="case-results-main">
                <?php
                $page_case = get_posts([
                    'post_type' => 'case_result',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ]);

                if ($page_case) : foreach ($page_case as $post) : setup_postdata($post);
                        ?>
                        <div class="case-resuls-item inr">
                            <p><?php the_content(); ?></p>
                            <!-- <h4><?php the_title(); ?></h4> -->
                            <h5><?php echo get_field("sub_title") ?> </h5>
                            
                            
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

<?php
get_footer();

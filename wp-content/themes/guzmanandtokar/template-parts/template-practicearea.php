<?php
/* Template Name: Practice Area Page Template */
get_header(); ?>
<?php include( get_stylesheet_directory() . '/partials/page-header.php' ); ?>
<main id="page-content">
    <div class="page-container">
        <div class="page-col-full">
        <div id="page-column" class="full-width">
          
<section id="practicearea-main">
                <?php if (have_rows('practice_areas_list')): ?>
                    <div class="practice-list">
                        <?php while (have_rows('practice_areas_list')): the_row(); ?>
                            <div class="practice-item inr">
                                
                                <?php if (get_sub_field('practice_area_name')) { ?>
                                    <div class="practice-name">
                                        <h4><?php echo get_sub_field('practice_area_name'); ?></h4>
                                    </div>
                                <?php } ?>


                                <?php if (get_sub_field('practice_area_link')) { ?>
                                    <div class="practice-name item-hover">
                                        <a href="<?php echo get_sub_field('practice_area_link'); ?>"><?php echo get_sub_field('practice_area_name'); ?></a>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </section>

  <section id="practicearea-main">
<?php echo the_content() ?>

            </section>

        </div>

        </div>
    </div>
</main>

<?php get_footer();
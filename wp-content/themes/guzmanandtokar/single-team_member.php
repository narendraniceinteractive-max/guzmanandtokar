<?php
/* Template Name: Single Profile Page Template */
get_header();
?>

<?php include( get_stylesheet_directory() . '/partials/page-header.php' ); ?>

<main id="page-content" class="content-area">
    <div class="page-container">
        <div class="page-col-full">
            
            <section id="page-column">
                <div class="single-profile-pg">
                <div class="single-profile-block">
                    <?php
                    $profile_image = get_field('single_profile_page_image');
                    if ($profile_image) {
                        ?>
                        <div class="single-profile-image">
                            <img src="<?php echo $profile_image; ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="" height="">
                        </div>
                    <?php } ?>
                    <div class="sp-block">
                        <?php if (get_field('single_profile_name')) { ?>
                            <h2><?php echo get_field('single_profile_name'); ?></h2>
                        <?php } ?>

                        <?php if (get_field('single_profile_designation')) { ?>
                            <h5>-<?php echo get_field('single_profile_designation'); ?></h5>
                        <?php } ?>

                        <?php if (get_field('single_profile_phone_number')) { ?>
                            <div class="profile-tel">
                                <a href="tel:<?php echo get_field('single_profile_phone_number'); ?>"><?php echo get_field('single_profile_phone_number'); ?></a>
                            </div>
                        <?php } ?>
                         
                        <?php $link = get_field('single_profile_consult_btn'); if ($link): ?>
                        <div class="profile-consult-btn"> <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"> <?php echo esc_html($link['title']); ?> </a> 
                            </div> <?php endif; ?>
                    </div>
                </div>
                <div class="single-profile-content">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>
</div>
            </section>

            <?php get_sidebar('page'); ?>
        </div>
    </div>
</main>

<?php
get_footer();

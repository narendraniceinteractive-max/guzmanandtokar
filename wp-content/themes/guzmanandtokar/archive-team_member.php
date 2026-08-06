<?php
/* Template Name: Single Profile Page Template */

get_header();
?>

<?php include get_stylesheet_directory() . '/partials/page-header.php'; ?>

<main id="page-content" class="content-area">
    <div class="page-container">
          <div class="page-col-full">

<section id="page-column" class="team-profile-section">

    <div class="page-content-wrap">
        <h2>Our Lawyers</h2>

        <!-- Left Column -->
        <div class="in-attorney-blk">

            <?php
            $args = array(
                'post_type'      => 'team_member',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
               'orderby'        => 'date',
               'order'          => 'DESC',
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :

                while ($query->have_posts()) :
                    $query->the_post();

                    $profile_image = get_field('single_profile_page_image');
                    $profile_name  = get_field('single_profile_name');
                    $designation   = get_field('attorney_designation');
                    $button        = get_field('attorney_button');
                    $content       = get_field('attorney_content');
            ?>

            <div class="in-attorny-itm">

                <div class="attorny-singel-imgs">
<div class="in-attorny-img">
    <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'medium_large', array(
            'alt' => esc_attr( get_the_title() ),
        ) ); ?>
    <?php endif; ?>
</div>
                    <div class="in-right">

                        <?php if($profile_name): ?>
                            <h3><?php echo $profile_name; ?></h3>
                        <?php endif; ?>

                        <?php if($designation): ?>
                            <h5><?php echo $designation; ?></h5>
                        <?php endif; ?>

                        <?php if($button): ?>
                            <a class="cmn-btn"
                               href="<?php echo esc_url($button['url']); ?>">
                                <?php echo esc_html($button['title']); ?>
                            </a>
                        <?php endif; ?>

                    </div>

                </div>

                <div class="attorney-content">
                    <?php echo wp_kses_post($content); ?>
                </div>

            </div>

            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>
    </div>

</section>
        <!-- Right Sidebar -->
       
            <?php get_sidebar('page'); ?>
       
    </div>


</div>
</main>

<?php get_footer(); 
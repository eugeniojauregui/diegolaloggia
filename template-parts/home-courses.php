<section id="Courses" class="courses">
    <h2>CURSOS DE ENTRENAMIENTO ONLINE</h2>
    <ul class="courses-list">
        <?php
        $prensa = array(
            'post_type' => 'product',
            'order' => 'DESC',
            'posts_per_page' => 24,
        );
        $catquery = new WP_Query($prensa);

        if ($catquery->have_posts()) :
        ?>
            <?php while ($catquery->have_posts()) : $catquery->the_post(); ?>
            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <div class="square">
                            <img src="<?= esc_url($featured_img_url) ?>" alt="<?php the_title(); ?>" />
                            <div class="info">
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <p><?php the_field('docentes'); ?></p>
                            </div>
                        </div>
                        <div class="btn green">VER</div>
                    </a>
                </li>
            <?php endwhile ?>
        <?php endif; ?>
        
    </ul>
</section>
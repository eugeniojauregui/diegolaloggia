<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
<header class="entry-header" style="background-image:url(<?= esc_url($featured_img_url) ?>)">
    <div class="wrap">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <div class="faculty">- <?php the_field('docentes'); ?> -</div>
        <div>
</header><!-- .entry-header -->
<nav class="tabs">
    <ul>
        <li data-tab="what" class="active">¿QUÉ APRENDERÁS?</li>
        <li data-tab="about">TEMARIO</li>
        <li data-tab="who">PARTICIPANTES</li>
        <li data-tab="buy">COMPRAR CURSO</li>
    </ul>
</nav>
<section class="main-section">
    <section id="what" class="course-section">
        <div class="container">
            <div class="course-desc pad50">
                <?php the_field('descripcion'); ?>
            </div>
            <?php
            if (have_rows('bloques_de_color')) :
                while (have_rows('bloques_de_color')) : the_row();
            ?>
                    <div class="<?php the_sub_field('color_de_fondo'); ?> center pad50">
                        <h3><?php the_sub_field('titulo'); ?></h3>
                        <p><?php the_sub_field('texto'); ?></p>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
            <?php if (get_field('video')) : ?>
                <div class="course-video">
                    <?php the_field('video'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section id="about" class="course-section">

    </section>
    <section id="who" class="course-section">

    </section>
    <section id="buy" class="course-section">

    </section>
</section>
<aside class="faqs">

</aside>
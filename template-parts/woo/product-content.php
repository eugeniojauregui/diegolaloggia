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
    <section id="what" class="course-section active">
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
        <div class="container">
            <?php
            if (have_rows('temario')) :
                while (have_rows('temario')) : the_row();
            ?>
                    <div class="green-back center heroic pad0">
                        <h3><?php the_sub_field('titulo_modulo'); ?></h3>
                    </div>
                    <?php $type = get_sub_field('tipo_de_clase'); ?>
                    <ul class="units">
                        <?php
                        $i = 0;
                        if (have_rows('clases')) :
                            while (have_rows('clases')) : the_row();
                                $i++;
                        ?>
                                <li>
                                    <span class="unit"><?= $type; ?> <?= $i; ?></span>
                                    <p><?php the_sub_field('descripcion_de_la_clase'); ?></p>
                                </li>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </ul>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>
    <aside class="faqs">
        <ul class="aside-btn">
            <li data-tab="buy" class="buy">COMPRAR CURSO</li>
        </ul>
        <h4>PREGUNTAS FRECUENTES</h4>
        <ul>
            <li><strong>¿Cómo hago para comprar el curso</strong>
                Podés abonar el curso de manera online a través de los distintos medios de pago que podés ver haciendo click aquí.</li>

            <li><strong>¿Cuál es la modalidad del curso</strong>
                El curso se dicta en modadlidad online.</li>

            <li><strong>¿Cómo accedo al curso</strong>
                Una vez que realices la compra del curso y se ejectue el pago, podrás acceder mediante la página de acceso (login) con tu usuario y contraseña generados.

            <li><strong>¿Cómo hago para comprar el curso</strong>
                Podés abonar el curso de manera online a través de los distintos medios de pago que podés ver haciendo click aquí.</li>

            <li><strong>¿Cuál es la modalidad del curso</strong>
                El curso se dicta en modadlidad online.</li>

            <li><strong>¿Cómo accedo al curso</strong>
                Una vez que realices la compra del curso y se ejectue el pago, podrás acceder mediante la página de acceso (login) con tu usuario y contraseña generados.

            </li>
        </ul>
    </aside>
</section>

<section id="who" class="course-section">
    <h2>Participantes</h2>
    <ul class="participants">
        <?php
        if (have_rows('participantes')) :
            while (have_rows('participantes')) : the_row();
                $foto = get_sub_field('foto');
        ?>
                <li class="part">
                    <div class="participant-pic"><img src="<?= $foto['url']; ?>" alt="<?php the_sub_field('nombre'); ?>" /></div>
                    <h3><?php the_sub_field('nombre'); ?></h3>
                    <p><?php the_sub_field('bio'); ?></p>
                </li>
        <?php
            endwhile;
        endif;
        ?>
    </ul>
</section>
<?php if (get_field('banner')) { ?>
    <header class="entry-header bg" style="background-image:url(<?php the_field('banner'); ?>)">
    <?php } else { ?>
        <header class="entry-header">
        <?php }; ?>
        <div class="wrap">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            <div class="faculty">- <?php the_field('docentes'); ?> -</div>
            <div>
        </header><!-- .entry-header -->
        <nav class="tabs">
            <ul>
                <li data-tab="what" class="active">¿QUÉ APRENDERÁS?</li>
                <li data-tab="about">PROGRAMA Y METODOLOGIA</li>
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
                    if (have_rows('bloques_de_color')) : ?>
                        <div class="info-color-blocks">
                            <?php
                            while (have_rows('bloques_de_color')) : the_row();
                            ?>
                                <div class="<?php the_sub_field('color_de_fondo'); ?> center pad50">
                                    <div class="icon-modulo"><img src="<?php the_sub_field('icono'); ?>" alt="Icon" /></div>
                                    <h3><?php the_sub_field('titulo'); ?></h3>
                                    <p><?php the_sub_field('texto'); ?></p>
                                </div>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    <?php
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
                            <div class="black-back center heroic pad0">
                                <h3>METODOLOGIA: <span class="green-text"><?php the_sub_field('metodologia'); ?></span></h3>
                            </div>
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
                <div data-tab="buy" class="buy">COMPRAR CURSO</div>
                <h4>PREGUNTAS FRECUENTES</h4>
                <ul>
                    <li><strong>¿Con qué dispositivos debo contar?</strong>
                        Para poder realizar la formación online necesitas un ordenador, tablet o móvil con conexión a Internet.</li>

                    <li><strong>¿Cómo accedo a los cursos?</strong>
                        Una vez realizada y aprobada la compra se enviará un mail con el permiso correspondiente de acceso a los mismos.</li>

                    <li><strong>¿Los cursos tienen un horario determinado?</strong>
                        Podrás consultar y realizar los cursos en el momento que desees.</li>

                    <li><strong>¿A quién debo contactar por consultas, dudas o inconvenientes?</strong>
                        Por cualquier consulta que tengas puedes contactar con <a href="mailto:diegolaloggia@gmail.com">diegolaloggia@gmail.com</a></li>

                    <li><strong>¿Métodos de pago utilizados?</strong>
                        Se podrá abonar mediante tarjeta de crédito, PayPal o transferencia bancaria.</li>
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
                            <?php if (get_sub_field('instagram')) : ?>
                                <p><a href="https://instagram.com/<?php the_sub_field('instagram'); ?>" target="_blank"><span class="icon-ig"><img src="https://ejdg.com.ar/dev/dlt/wp-content/themes/dll/img/icon-instagram.svg" alt="Instagram"></span> /<?php the_sub_field('instagram'); ?></a></p>
                            <?php endif; ?>
                        </li>
                <?php
                    endwhile;
                endif;
                ?>
            </ul>
        </section>
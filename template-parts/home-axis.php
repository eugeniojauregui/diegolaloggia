<section id="Axis" class="axis">
    <h2>EJES DE TRABAJO</h2>
    <ul class="axis-items">
        <li data-axis="fitness">

            <img src="<?php bloginfo('template_directory'); ?>/img/axis-001.jpg" alt="Eje 1" />
            <a href="<?php echo esc_url(home_url('/')); ?>courses-overview/fitness/">
                Fitness
            </a>
        </li>
        <li data-axis="fem">

            <img src="<?php bloginfo('template_directory'); ?>/img/axis-002.jpg" alt="Eje 2" />
            <a href="<?php echo esc_url(home_url('/')); ?>courses-overview/futbol-femenino/">
                Fútbol <br />Femenino
            </a>
        </li>
        <li data-axis="masc">

            <img src="<?php bloginfo('template_directory'); ?>/img/axis-003.jpg" alt="Eje 3" />
            <a href="<?php echo esc_url(home_url('/')); ?>courses-overview/futbol-masculino/">
                Fútbol <br />Masculino
            </a>
        </li>
    </ul>
    <ul class="axis-info">
        <li id="data-fitness">
            <p>Llamamos Fitness a la rutina de ejercicios que se realizan para conseguir un estado de salud óptimo, apoyados en una dieta saludable (...)</p>
            <div class="btn green"><a href="https://ejdg.com.ar/dev/dlt/ejes-de-trabajo/fitness/">Seguir Leyendo</a></div>
        </li>
        <li id="data-fem">
            <p>Afortunadamente el auge de este deporte ha llegado a muchos países y se expande cada vez más. Es notable el optimismo, la adaptación y el compromiso con que (...)</p>
            <div class="btn green"><a href="https://ejdg.com.ar/dev/dlt/ejes-de-trabajo/futbol-femenino/">Seguir Leyendo</a></div>
        </li>
        <li id="data-masc">
            <p>Tradicionalmente se pretendía que el jugador respondiese como un todo, aunque se entrenaban los conceptos de forma separada, con la idea de que los jugadores no lleguen (...)</p>
            <div class="btn green"><a href="https://ejdg.com.ar/dev/dlt/ejes-de-trabajo/futbol-masculino/">Seguir Leyendo</a></div>
        </li>
    </ul>
</section>
<script>
    (function($) {
        $(document).ready(function() {
            $('.axis-items li').mouseover(function() {
                var data = $(this).data('axis');
                console.log('#data-' + data);
                $('.axis-info li').hide();
                $('#data-' + data).fadeIn();

            })
        });
    })(jQuery);
</script>
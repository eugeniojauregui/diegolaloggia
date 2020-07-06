<?php

/**
 * List the Course Modules and Lesson in these modules
 *
 * Template is hooked into Single Course sensei_single_main_content. It will
 * only be shown if the course contains modules.
 *
 * All lessons shown here will not be included in the list of other lessons.
 *
 * @author      Automattic
 * @package     Sensei
 * @category    Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<?php

/**
 * Hook runs inside single-course/course-modules.php
 *
 * It runs before the modules are shown. This hook fires on the single course page. It will show
 * irrespective of irrespective the course has any modules or not.
 *
 * @since 1.8.0
 */
do_action('sensei_single_course_modules_before');
function slugify($sluggable)
{
    $sluggable = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $sluggable);
    $sluggable = trim($sluggable, '-');
    if (function_exists('mb_strtolower')) {
        $sluggable = mb_strtolower($sluggable);
    } else {
        $sluggable = strtolower($sluggable);
    }
    $sluggable = preg_replace("/[\/_|+ -]+/", '-', $sluggable);

    return $sluggable;
}
?>

<?php if (sensei_have_modules()) : ?>

    <?php
    while (sensei_have_modules()) :
        sensei_setup_module();
    ?>
        <?php if (sensei_module_has_lessons()) : ?>
            <article class="module <?= slugify(sensei_get_the_module_title()) ?>">
                <?php

                /**
                 * Hook runs inside single-course/course-modules.php
                 *
                 * It runs inside the if statement after the article tag opens just before the modules are shown. This hook will NOT fire if there
                 * are no modules to show.
                 *
                 * @since 1.9.0
                 * @since 1.9.7 Added the module ID to the parameters.
                 *
                 * @hooked Sensei()->modules->course_modules_title - 20
                 *
                 * @param int sensei_get_the_module_id() Module ID.
                 */
                do_action('sensei_single_course_modules_inside_before', sensei_get_the_module_id());

                ?>

                <header>

                    <h2>
                        <?php
                        $module = get_term(sensei_get_the_module_id(), Sensei()->modules->taxonomy);
                        if ($module && Sensei()->modules->do_link_to_module($module, true)) {
                        ?>

                            <a href="<?php sensei_the_module_permalink(); ?>" title="<?php sensei_the_module_title_attribute(); ?>">

                                <?php sensei_the_module_title(); ?>

                            </a>

                        <?php } else { ?>

                            <?php sensei_the_module_title(); ?>

                        <?php } ?>

                    </h2>

                    <?php sensei_the_module_status(); ?>
                </header>

                <section class="entry">

                    <p class="module-description"><?php sensei_the_module_description(); ?></p>
                    <?php if (slugify(sensei_get_the_module_title()) === 'full-body') { ?>
                        <div class="full-body-info">
                            <div class="white-back flex-center">
                                <div>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/video-class.svg" alt="Videos" />
                                    En cada rutina encontrarás un video explicativo, la grilla de entrenamiento y explicaciones detalladas sobre cada ejercicio.
                                </div>
                            </div>
                            <div class="green-back flex-center">
                                <div>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/alert.svg" alt="Atención" />
                                    No te olvides de realizar los chequeos médicos correspondientes previos a cualquier actívidad física.<br />
                                    Es muy importante que te hidrates antes, durante y después del Full Body.
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <section class="module-lessons">

                        <header>

                            <h3><?php esc_html_e('Lessons', 'sensei-lms'); ?></h3>

                        </header>

                        <ul class="lessons-list">

                            <?php
                            while (sensei_module_has_lessons()) :
                                the_post();
                            ?>

                                <li class="<?php sensei_the_lesson_status_class(); ?>">

                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail('medium') ?>
                                        <div class="lesson-title">
                                            <?php the_title(); ?>
                                        </div>
                                        <?php
                                        $course_id = Sensei()->lesson->get_course_id(get_the_ID());
                                        if (Sensei_Utils::is_preview_lesson(get_the_ID()) && !Sensei_Course::is_user_enrolled($course_id)) {

                                            echo wp_kses_post(Sensei()->frontend->sensei_lesson_preview_title_tag($course_id));
                                        }
                                        ?>

                                    </a>

                                </li>

                            <?php endwhile; ?>

                        </ul>

                    </section><!-- .module-lessons -->

                </section>

                <?php

                /**
                 * Hook runs inside single-course/course-modules.php
                 *
                 * It runs inside the if statement before the closing article tag directly after the modules were shown.
                 * This hook will not trigger if there are no modules to show.
                 *
                 * @since 1.9.0
                 * @since 1.9.7 Added the module ID to the parameters.
                 *
                 * @param int sensei_get_the_module_id() Module ID.
                 */
                do_action('sensei_single_course_modules_inside_after', sensei_get_the_module_id());

                ?>

            </article>

        <?php endif; // sensei_module_has_lessons 
        ?>

    <?php endwhile; // sensei_have_modules 
    ?>

<?php endif; // sensei_have_modules 
?>

<?php

/**
 * Hook runs inside single-course/course-modules.php
 *
 * It runs after the modules are shown. This hook fires on the single course page,but only if the course has modules.
 *
 * @since 1.8.0
 */
do_action('sensei_single_course_modules_after');

<?php
/*
 * Template name: Página de Inicio
 * Template Post Type: page
 */

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>


<main class="container pt-4">


    <h1 class="text-center"><?php the_title(); ?></h1>



    <!--//GOOGLE ADSENSE (PC) -->
    <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>                
        <div class="pb-3 pt-3 text-center d-none d-lg-block">

            <?php  echo get_option('template_oregoom_adsense_728_90'); ?>

        </div>                
    <?php } ?>

    <!--//GOOGLE ADSENSE (Movil) -->
    <?php if(get_option('template_oregoom_adsense_auto') != ''){ ?>                
        <div class="pb-3 pt-3 d-lg-none text-center">

            <?php  echo get_option('template_oregoom_adsense_auto'); ?>

        </div>                
    <?php } ?>



    <div class="pt-3 pb-4">
        <?php the_content(); ?>   
    </div>


    <!--//GOOGLE ADSENSE (PC) -->
    <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>                
        <div class="pb-3 pt-3 text-center d-none d-lg-block">

            <?php  echo get_option('template_oregoom_adsense_728_90'); ?>

        </div>                
    <?php } ?>

    <!--//GOOGLE ADSENSE (Movil) -->
    <?php if(get_option('template_oregoom_adsense_auto') != ''){ ?>                
        <div class="pb-3 pt-3 d-lg-none text-center">

            <?php  echo get_option('template_oregoom_adsense_auto'); ?>

        </div>                
    <?php } ?>




    <div class="pt-5">

        <div class="row pt-3 pb-3">

                <?php 

                //Consulta que pertenece a una categoria específica 
                $wordpress_query = new WP_Query( array(
                        'post_type' => 'post',
                        'orderby' => 'DESC',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    ));   

                while ($wordpress_query->have_posts()) : $wordpress_query->the_post(); 

                    if(has_post_thumbnail()){ ?>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-3">

                        <div class="shadow-lg rounded">  
                            
                            <a class="text-dark" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', array( 'class' => 'img-fluid' )); ?>
                            </a>

                            <div class="p-4">
                                <a class="text-dark" href="<?php the_permalink(); ?>">
                                    <h3 class="h5" style="font-family: Raleway, sans-serif; line-height: 1.2em;">
                                        <strong><?php the_title(); ?></strong>
                                    </h3>
                                </a>
                                <p> <?php the_excerpt(); ?> </p>
                            </div>
                        </div>
                    </div>

                    <?php }                    

                endwhile;

                wp_reset_postdata(); ?>

        </div>

    </div>



    <div class="container pt-5 pb-5">

        <!--//GOOGLE ADSENSE (PC y Movil) -->
        <?php if(get_option('template_oregoom_adsense_auto') != ''){ ?>                
            <div class="pb-3 pt-3 text-center">

                <?php  echo get_option('template_oregoom_adsense_auto'); ?>

            </div>                
        <?php } ?>

    </div>



</main>



<?php
    
    endwhile;  
    
}




/*
 * ===============================
 * Pie de página 
 */
get_footer();
<?php get_header(); ?>

<div class="container mb-5 mt-lg-5 mt-4 ">

    <h1 class="text-center">Categoría: <strong><?php single_cat_title(); ?></strong></h1>

    <!--//GOOGLE ADSENSE 728x92 (PC) -->
    <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>    
        
        <div class="pb-4 pt-3 text-center d-none d-lg-block">

            <?php  echo get_option('template_oregoom_adsense_728_90'); ?>

        </div>     

    <?php } ?>

    <!--//GOOGLE ADSENSE 300x250 (PC) -->
    <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>    
        
        <div class="pb-2 pt-2 text-center d-lg-none">

            <?php  echo get_option('template_oregoom_adsense_300_250'); ?>

        </div>     

    <?php } ?>

    <div class="h5 mt-lg-5 mt-4 mb-3">ÚLTIMOS ARTÍCULOS</div>


    <div class="row pt-2 pb-3"> <?php

        if(have_posts()){
            
            while(have_posts()) : the_post(); ?>



                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 pb-3">

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

                </div> <?php  


            endwhile;
            
        } ?>

    </div>

    <div class="pt-5 pb-5 text-center text-white h3">
        <small> 
        
        <?php

        //global $queryCursos;

                $big = 999999999; // need an unlikely integer

                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages
                ) ); ?>
            
        </small>

    </div>


    
    <!--//GOOGLE ADSENSE AUTO (PC and MOVIL) -->
    <?php if(get_option('template_oregoom_adsense_auto') != ''){ ?>    
    
        <div class="pb-4 pt-1 text-center">

            <?php  echo get_option('template_oregoom_adsense_auto'); ?>

        </div>     

    <?php } ?>





</div> <?php

/*
 * ===============================
 * Pie de página 
 */
get_footer();
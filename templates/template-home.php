<?php
/*
 * Template name: Página de Inicio
 * Template Post Type: page
 */

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>


<main class="container mt-5">
    
    <div class="row">
        
        <aside class="col col-xxl-3 col-xl-4 col-lg-3 d-none d-lg-block">
        
            <div class="list-group list-group-flush">
                
                <span class="h5"><strong>Contenido</strong></span>
                
                <?php 
                
                $ID_post = get_the_ID();

                //Consulta que pertenece a una categoria específica 
                $wordpress_query = new WP_Query( array(
                        'post_type' => 'post',
                        'orderby' => 'DESC',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    ));   

                while ($wordpress_query->have_posts()) : $wordpress_query->the_post(); 
                
                    // Título corto
                    if(get_post_meta(get_the_ID(), 'oregoom_title_corto_post', true)){ 

                        $oregoom_title_corto_post = get_post_meta(get_the_ID(), 'oregoom_title_corto_post', true); ?>              

                        <a class="list-group-item list-group-item-action <?php if($ID_post == get_the_ID()){ echo "list-group-item-secondary"; } ?>" target="_self" href="<?php the_permalink(); ?>"><?php echo $oregoom_title_corto_post; ?></a> <?php
                        
                    } else { ?>
                         
                        <a class="list-group-item list-group-item-action <?php if($ID_post == get_the_ID()){ echo "list-group-item-secondary"; } ?>" target="_self" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php

                    }
                
                endwhile;
                
                wp_reset_postdata(); ?>
                    
            </div>
            
        </aside>
        
        <article class="col">
            
            <div class="container" style="max-width: 760px; margin-left: auto; margin-right: auto;">
                
                <h1 class="text-center h1" style="font-weight: bold;"><?php the_title(); ?></h1>
                
                <div class="pt-4 pb-4">
                    <?php the_content(); ?>   
                </div> 
                
            </div>
            
        </article>
        
        <div class="col col-2 d-none d-xxl-block">
            
            <!--//GOOGLE ADSENSE (PC) -->
            <?php if(get_option('template_oregoom_adsense_160_600') != ''){ ?>                
                <div class="pb-3 text-end">

                    <?php  echo get_option('template_oregoom_adsense_160_600'); ?>

                </div>                
            <?php } ?>
            
        </div>
        
    </div>    
    
</main>

<div class="container mt-4 mb-5">
    
    <div class="row">
        
        <div class="col">
            
            <!--//GOOGLE ADSENSE (PC) -->
            <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
                <div class="pb-3 text-center">

                    <?php  echo get_option('template_oregoom_adsense_300_250'); ?>

                </div>                
            <?php } ?>
            
        </div>
        
        <div class="col d-none d-lg-block">
            
            <!--//GOOGLE ADSENSE (PC) -->
            <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
                <div class="pb-3 text-center">

                    <?php  echo get_option('template_oregoom_adsense_300_250'); ?>

                </div>                
            <?php } ?>
            
        </div>
        
        <div class="col d-none d-xl-block">
            
            <!--//GOOGLE ADSENSE (PC) -->
            <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
                <div class="pb-3 text-center">

                    <?php  echo get_option('template_oregoom_adsense_300_250'); ?>

                </div>                
            <?php } ?>
            
        </div>
        
        <div class="col d-none d-xxl-block">
            
            <!--//GOOGLE ADSENSE (PC) -->
            <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
                <div class="pb-3 text-center">

                    <?php  echo get_option('template_oregoom_adsense_300_250'); ?>

                </div>                
            <?php } ?>
            
        </div>
        
    </div>
    
</div>

<?php
    
    endwhile;  
    
}




/*
 * ===============================
 * Pie de página 
 */
get_footer();
<?php get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>   





<div class="pb-5">


    <?php if(is_single()){ ?>

        <nav aria-label="breadcrumb" class="container d-none d-md-block pb-0 mb-0 mt-1">

            <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
                <li class="breadcrumb-item"><a href="<?php echo esc_url('https://oregoom.com/'); ?>">Inicio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">WordPress</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page"><?php the_title(); ?></li>
            </ol>

        </nav>

    <?php } ?> 
    
    

    <!--//GOOGLE ADSENSE 970x250 (PC) -->
    <?php if(get_option('template_oregoom_adsense_970_250') != ''){ ?>    
    
        <div class="pb-4 pt-1 text-center d-none d-xl-block">

            <?php  echo get_option('template_oregoom_adsense_970_250'); ?>

        </div>     
    
    <?php } ?>


    

    <!--//GOOGLE ADSENSE 728x92 (PC) -->
    <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>    
    
        <div class="pb-4 pt-1 text-center d-none d-lg-block d-xl-none">

            <?php  echo get_option('template_oregoom_adsense_728_90'); ?>

        </div>     

    <?php } ?>

    
    
    <div id="oregoom-container" class="container pt-1 pb-md-4 border-bottom"> <?php 
        
        foreach((get_the_category()) as $category)
        {
            // echo get_category_link( $category->term_id ); // Tema Para Venta

            $ID_cat = $category->term_id; ?>
        
            <div class="text-center mb-3 d-none d-lg-block">

                <a class="text-center" style="font-family: 'Poppins', Sans-serif;" href="<?php echo esc_url(home_url().'/'.$category->slug.'/'); ?>">
                <!--<a class="text-center" style="font-family: 'Poppins', Sans-serif;" href="<?php echo esc_url(home_url().'/'); ?>">-->
                    <?php echo $category->name; ?>
                </a>

            </div><?php

        } ?>
        


        <h1 class="mb-3 mt-md-0 mt-3 text-center" style="font-family: 'Poppins', Sans-serif; font-weight: bold;">
            <?php the_title(); ?>
        </h1>
        
        
        

        <!-- COMPARTIR en Redes Sociales -->
        <div class="d-none mt-2 d-lg-block mb-4">
            <div class="pb-1 align-items-center text-center">    

                <span class="mr-2">
                    <amp-social-share class="rounded" type="facebook" data-param-app_id="216472885737679" width="36" height="36"></amp-social-share>
                </span>

                <span class="mr-2">
                    <amp-social-share class="rounded" type="twitter" width="36" height="36"></amp-social-share>
                </span>

                <span class="mr-2">
                    <amp-social-share class="rounded" type="whatsapp" width="36" height="36"></amp-social-share>
                </span>

                <span class="mr-2">
                    <amp-social-share class="rounded"  aria-label="Share on LinkedIn"  type="linkedin"  width="36"  height="36"></amp-social-share>
                </span>

                <span class="mr-2">
                    <amp-social-share class="rounded"  aria-label="Share by email" type="email"  width="36" height="36"></amp-social-share>
                </span>

            </div>
        </div>
        
        
        <div class="row">
            
            <div class="col-xl-8 col-lg-7 pr-xl-4">               
            
            
                <!-- Vídeo de YouTube (Escritorio) -->
                <?php if(get_post_meta(get_the_ID(), 'hb_idyoutube_post', true)){ 
                    
                    $ID_YouTube = get_post_meta(get_the_ID(), 'hb_idyoutube_post', true); ?>
                
                    <amp-lightbox id="my-lightbox-<?php echo $ID_YouTube; ?>" layout="nodisplay">
                        <div class="lightbox" tabindex="0">

                             <!-- Vídeo de YouTube -->
                             <div class="container">
                                 <div class="overflow-hidden">
                                    <!--<h5 class="text-light float-left">Alejandro Bullón</h5>-->
                                    <span role="button" class="text-light h2 float-right" on="tap:my-lightbox-<?php echo $ID_YouTube; ?>.close">&times;</span>
                                  </div>

                                  <div class="">
                                    <amp-youtube
                                    data-videoid="<?php echo $ID_YouTube; ?>"
                                    layout="responsive"
                                    width="480"
                                    height="270"
                                    ></amp-youtube>
                                  </div>
                            </div>

                        </div>
                    </amp-lightbox>

                    <div class="pb-4 text-center">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" on="tap:my-lightbox-<?php echo $ID_YouTube; ?>">
                    </div>
                
                    <div class="text-center mb-4">
                        <button type="button" class="btn btn-primary btn-lg btn-block rounded-pill" on="tap:my-lightbox-<?php echo $ID_YouTube; ?>">Ver video tutorial</button>
                    </div>

                <?php } else {
                    
                    //IMG destacada de POST
                    if( has_post_thumbnail() ) {

                        the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4' )); 

                    } 
                    
                } ?>
                
                
                
                <!--//GOOGLE ADSENSE (Movil) -->
                <?php if(get_option('template_oregoom_adsense_auto') != ''){ ?>     

                    <div class="pb-4 d-lg-none text-center">

                        <?php  echo get_option('template_oregoom_adsense_auto'); ?>

                    </div>     

                <?php } ?>
                
                
                
                
            <?php the_content(); ?>   
                
                
<!--                <div class="mb-5 mt-5">
                    <h2 class="border-bottom"><span class="h4">¡Adelante! deja tu comentario</span></h2>
                    <amp-facebook-comments
                        width="486"
                        height="657"
                        layout="responsive"
                        data-numposts="5"
                        data-href="<?php the_permalink() ?>"
                    >
                    </amp-facebook-comments>
                </div>-->
                
                
            </div>
            
            <div class="col-xl-4 col-lg-5 pl-lg-4">  

                <?php get_sidebar('sidebar'); ?>            
                
                <!--<div class="sticky-top pt-2 mb-5 text-center">                    
                    <a href="https://oregoom.com/curso-de-wordpress/" target="_blank">
                        <img src="https://oregoom.com/wp-content/uploads/2021/03/curso-de-wordpress-300-600.jpg">
                    </a>
                </div>-->

                <!--//THEME ADS (PC) -->
                <?php if(get_option('template_oregoom_theme_ads_300_600') != ''){ ?>    
                            
                    <div class="pb-4 text-center sticky-top">
            
                        <?php  echo get_option('template_oregoom_theme_ads_300_600'); ?>
            
                    </div>    
                
                <?php } ?>
                
            </div>
            
        </div>
        
    </div>

</div>






<div>
    
    <div class="container pt-2 pb-5 text-center">
        
        <p class="display-4"><strong>¡Comienza Ahora!</strong></p>
        
        <img src="https://oregoom.com/wp-content/uploads/2020/05/arrow-silver-1.png" class="pb-4 img-fluid">
        
        <img src="https://oregoom.com/wp-content/uploads/2020/05/diseno-cajas-gral-2.png" class="pb-4 img-fluid">
        
        <p class="display-4"><strong>Curso Completo de WordPress</strong></p>
        
        <p class="h1">Tema Divi Gratis</p>
        
        <p>Aprender WordPress es invertir en tu futuro personal y profesional a medio y largo plazo. Y tú estás a un paso de aprender a crear páginas y sitios webs con el mejor curso sobre WordPress que hay en la actualidad.</p>
        
        <a href="https://oregoom.com/curso-de-wordpress/" target="_blank" class="btn btn-warning btn-lg rounded-pill pl-5 pr-5">
            <strong>Me Apunto Ahora</strong>
        </a>
               
    </div>
    
</div>



<div class="container pt-5">                        
                
    <h2 class="border-bottom"><span class="h4">Vea también</span></h2>

    <div class="row pt-4 pb-3">

            <?php 
            //Post que no deben de mostrar en la consulta
            $NOT_post[] = get_the_ID();

            //Consulta que pertenece a una categoria específica 
            $wordpress_query = new WP_Query( array( 
                    'post_type' => 'post',
                    'orderby' => 'rand',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    'post__not_in' => $NOT_post
                ));   

            while ($wordpress_query->have_posts()) : $wordpress_query->the_post(); 

                if( has_post_thumbnail() ) { ?>

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
                        
                    </div> <?php 
                
                }                    

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
    
</div> <?php
    
    endwhile;
    
} 


/*
 * ===============================
 * Pie de página 
 */
get_footer();



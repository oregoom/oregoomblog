<?php get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>   


<div class="pb-5">


    <?php if(is_single()){ ?>

        <nav aria-label="breadcrumb" class="container d-none d-md-block pb-0 mb-0 mt-3 mb-3">

            <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo esc_url('https://oregoom.com/'); ?>">Inicio</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo esc_url(home_url()); ?>">WordPress</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page"><?php the_title(); ?></li>
            </ol>

        </nav>

    <?php } ?> 
    
    

    <!--//GOOGLE ADSENSE 970x250 (PC) -->
    <?php if(get_option('template_oregoom_adsense_970_250') != '' && esc_textarea(get_option('template_oregoom_uasr_google_adsense')) == 'template_oregoom_uasr_google_adsense_yes'){ ?>    
    
        <div class="pb-4 pt-1 text-center d-none d-xl-block">

            <?php  echo get_option('template_oregoom_adsense_970_250'); ?>

        </div>     

    <?php } ?>


    

    <!--//GOOGLE ADSENSE 728x92 (PC) -->
    <?php if(get_option('template_oregoom_adsense_728_90') != ''  && esc_textarea(get_option('template_oregoom_uasr_google_adsense')) == 'template_oregoom_uasr_google_adsense_yes'){ ?>    
    
        <div class="pb-4 pt-1 text-center d-none d-lg-block d-xl-none">

            <?php  echo get_option('template_oregoom_adsense_728_90'); ?>

        </div>     

    <?php } ?>

    
    
    <div id="oregoom-container" class="container pt-1 pb-md-4 border-bottom"> <?php 
        
        foreach((get_the_category()) as $category)
        {

            $ID_cat = $category->term_id; ?>
        
            <div class="text-center mb-3 d-none d-lg-block">

                <!--<a class="text-center" style="font-family: 'Poppins', Sans-serif;" href="<?php echo get_category_link( $ID_cat ); ?>">-->
                <a class="text-center text-decoration-none" style="font-family: 'Poppins', Sans-serif;" href="<?php echo esc_url(home_url().'/'); ?>">
                    <?php echo $category->name; ?>
                </a>

            </div><?php

        } ?>
        


        <h1 id="oregoom-1140-width" class="me-auto ms-auto mb-3 mt-md-0 mt-3 text-center" style="font-family: 'Poppins', Sans-serif; font-weight: bold;">
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
        
        
        <div class="row px-xxl-3">

            <div class="col-xxl-8 col-xl-8 col-lg-9">
                
                <!-- Vídeo de YouTube (Escritorio) -->
                <?php if(get_post_meta(get_the_ID(), 'hb_idyoutube_post', true)){ 
                    
                    $ID_YouTube = get_post_meta(get_the_ID(), 'hb_idyoutube_post', true); ?>

                    <div class="pb-4 text-center">
                        <a target="_blank" href="https://www.youtube.com/watch?v=<?php echo $ID_YouTube; ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid">
                        </a>                        
                    </div>
                
                    <div class="text-center mb-4 d-grid ">
                        <a class="btn btn-primary btn-lg btn-block rounded-pill" target="_blank" href="https://www.youtube.com/watch?v=<?php echo $ID_YouTube; ?>">Ver video tutorial</button>
                    </div>

                <?php } else {
                    
                    //IMG destacada de POST
                    if( has_post_thumbnail() ) {

                        the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4' )); 

                    } 
                    
                } ?>
                
                
                
                <!--//GOOGLE ADSENSE (Movil) -->
                <?php if(get_option('template_oregoom_adsense_auto') != ''  && esc_textarea(get_option('template_oregoom_uasr_google_adsense')) == 'template_oregoom_uasr_google_adsense_yes'){ ?>     

                    <div class="pb-4 d-lg-none text-center">

                        <?php  echo get_option('template_oregoom_adsense_auto'); ?>

                    </div>     

                <?php } ?>
                    
                <div class="px-xxl-5 px-xl-4">

                    <?php the_content(); ?>  

                </div>                    
                     

            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-3">

                <div class="d-none d-lg-block">

                    <?php get_sidebar('sidebar'); ?>   

                </div>

                <!--CURSO COMPLETO DE WORDPRESS (PC) -->
                <div class="px-xxl-4 px-xl-2 pt-4 d-none d-xl-block sticky-top">

                    <a href="https://bit.ly/3kb2We3" target="_blank">
                        <img src="https://img-c.udemycdn.com/course/750x422/1111518_cec6_21.jpg" class="img-fluid rounded" alt="Curso Completo de WordPress">
                    </a>

                    <a href="https://bit.ly/3kb2We3" target="_blank" class="text-decoration-none text-body">
                        <h3 class="h5 pt-2"><small><strong>Curso Completo de WordPress + Divi, ¡Desde 0 Hasta Experto!</strong></small></h3>
                        <p>¡Más de <span class="text-primary">2.655 alumnos</span> satisfechos!</p>
                    </a>

                </div> 

            </div>

        </div>
        
    </div>

</div>




    
<div class="container pt-2 pb-5 text-center" id="oregoom-1140-width">
    
    <p class="display-4"><strong>¡Comienza Ahora!</strong></p>
    
    <div>
        <img src="https://oregoom.com/wp-content/uploads/2020/05/arrow-silver-1.png" class="pb-4 img-fluid">
    </div>

    <div>
        <img src="https://oregoom.com/wp-content/uploads/2020/05/diseno-cajas-gral-2.png" class="pb-4 img-fluid">
    </div>
    
    <p class="display-4"><strong>Curso Completo de WordPress</strong></p>
    
    <p class="h1">Tema Divi Gratis</p>
    
    <p>Aprender WordPress es invertir en tu futuro personal y profesional a medio y largo plazo. Y tú estás a un paso de aprender a crear páginas y sitios webs con el mejor curso sobre WordPress que hay en la actualidad.</p>
    
    <a href="https://bit.ly/3kb2We3" target="_blank" class="btn btn-warning btn-lg rounded-pill ps-5 pe-5 pt-2 pb-2">
        <strong>Me Apunto Ahora</strong>
    </a>
    
</div>


<div class="container pt-5" id="oregoom-1140-width">                        
                
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

                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-3">

                    <div class="shadow-lg rounded">   
                        
                        <a class="text-dark" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('full', array( 'class' => 'img-fluid' )); ?>
                        </a>

                        <div class="p-4">
                            
                            <a class="text-dark text-decoration-none" href="<?php the_permalink(); ?>">
                                
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
    <?php if(get_option('template_oregoom_adsense_auto') != ''  && esc_textarea(get_option('template_oregoom_uasr_google_adsense')) == 'template_oregoom_uasr_google_adsense_yes'){ ?>    
    
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



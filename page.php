<?php get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>   


<div class="pb-5">
    

    <!--//GOOGLE ADSENSE 970x250 (PC) -->
    <?php if(get_option('template_oregoom_adsense_970_250') != ''){ ?>    
    
        <div class="pb-4 pt-4 text-center d-none d-xl-block">

            <?php  echo get_option('template_oregoom_adsense_970_250'); ?>

        </div>     
    
    <?php } ?>


    

    <!--//GOOGLE ADSENSE 728x92 (PC) -->
    <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>    
    
        <div class="pb-4 pt-4 text-center d-none d-lg-block d-xl-none">

            <?php  echo get_option('template_oregoom_adsense_728_90'); ?>

        </div>     

    <?php } ?>

    
    
    <div id="oregoom-container" class="container pt-3 pt-lg-1 pb-md-4">         


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

        </div><?php         
                

        //IMG destacada de POST
        if( has_post_thumbnail() ) {

            the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4' )); 

        } ?>                
        
        
        <!--//GOOGLE ADSENSE (Movil) -->
        <?php if(get_option('template_oregoom_adsense_auto') != ''){ ?>     

            <div class="pb-4 d-lg-none text-center">

                <?php  echo get_option('template_oregoom_adsense_auto'); ?>

            </div>     

        <?php } ?>

        <div class="pl-lg-5 pr-lg-5">
        
            <?php the_content(); ?>           
        
        </div>
        
            
        
    </div>

</div>




<div class="container pb-5">
    
    <!--//GOOGLE ADSENSE (PC y Movil) -->
    <?php if(get_option('template_oregoom_adsense_auto') != ''){ ?>    
    
        <div class="pb-3 text-center">

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

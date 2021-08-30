<!--<div style="position: -webkit-sticky; position: sticky; top: 10px;">-->

    <!--//GOOGLE ADSENSE (PC y Movil) -->
    <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>    
                
        <div class="pb-4 text-center">

            <?php  echo get_option('template_oregoom_adsense_300_250'); ?>

        </div>    
    
    <?php } ?>

    <?php 

    if( is_active_sidebar('sidebar_right_post') ){

        dynamic_sidebar('sidebar_right_post');

    } ?>

    <!--//GOOGLE ADSENSE (PC y Movil) -->
    <?php if(get_option('template_oregoom_adsense_300_600') != ''){ ?>    
                
        <div class="pb-4 text-center">

            <?php  echo get_option('template_oregoom_adsense_300_600'); ?>

        </div>    
    
    <?php } ?>

<!--</div>-->
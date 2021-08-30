        <footer class="container-fluid bg-dark pt-5 pb-5 mt-0">
            
            <div class="container text-center mb-2"><?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } ?>  
            </div>

            <div class="container text-center">
                <span class="text-white">Copyright © 2016 - <?php echo Date('Y'); ?> Oregoom.com – Todos los derechos reservados</span><br>
                <span class="text-white">Blog especializado en WordPress</span><br>
                <span class="text-white">Cusco - Perú</span><br>
                <span class="text-success">Algunos imágenes diseñado por <a class="text-info" href="https://www.freepik.es/" target="_blank" >freepik</a></span>
            </div>

        </footer>   

        <?php wp_footer(); ?>

    </body>
</html>
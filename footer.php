    <footer class="container text-center">
        <div class="row">
            <div class="col">
                <?php wp_nav_menu([
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'navbar-nav me-auto'
                ]); ?>
            </div>
            <div class="col">
                <address><a href="mailto:cookup@hotmail.com">cookup@hotmail.com</a></address>
            </div>
            <div class="col">
                <address><a href="tel:+32123456789">+32 123 45 67 89</a></address>
            </div>
        </div>
        <div class="row">
            <div class="container text-center">
                <p>Tous droits réservés à Cookup.be  ©2024</p>
            </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>
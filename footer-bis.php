    <footer class="container-fluid bg-secondary text-center">
        <nav class="navbar navbar-expand">
            <div class="container-fluid">
                <ul class="navbar-nav d-flex w-100 flex-wrap justify-content-around">
                    <?php  wp_nav_menu_no_ul(); ?>
                    <li class="nav-item">
                        <a 
                            href="mailto:cookup@hotmail.com"
                            class="nav-link"
                        >
                            cookup@hotmail.com
                        </a>
                    </li>
                    <li class="nav-item">
                        <a 
                            href="tel:+32123456789"
                            class="nav-link"
                        >
                            +32 123 45 67 89
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <p>Tous droits réservés à Cookup.be  ©2024</p>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>
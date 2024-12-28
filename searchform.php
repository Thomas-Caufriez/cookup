<form 
    class="d-flex" 
    role="search" 
    action="<?php echo esc_url(home_url('/')); ?>"
    method="get"
>
    <input 
        type="hidden" 
        name="post_type" 
        value="creation_recette" 
    />
    <input 
        class="form-control" 
        type="search" 
        placeholder="Rechercher..." 
        aria-label="Search" 
        name="s" 
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/iconRecherche.svg');"
        value="<?php echo get_search_query(); ?>"
    >
</form>
<form 
    class="d-flex" 
    role="search" 
    action="<?php echo esc_url(home_url('/')); ?>"
>
    <button 
        class="btn" 
        type="submit"
    >
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
            alt="Rechercher" 
            class="img-fluid"
        >
    </button>
    <input 
        class="form-control" 
        type="search" 
        placeholder="Rechercher..." 
        aria-label="Search" 
        name="s" 
        value="<?php echo get_search_query(); ?>"
    >
</form>
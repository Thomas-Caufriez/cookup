<form 
    class="d-flex" 
    role="search" 
    action="<?php echo esc_url(home_url('/')); ?>"
>
    <button 
        class="btn btn-outline-success" 
        type="submit"
    >
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
            alt="Rechercher" 
            width="30" 
            height="24"
        >
    </button>
    <input 
        class="form-control me-2" 
        type="search" 
        placeholder="Rechercher..." 
        aria-label="Search" 
        name="s" 
        value="<?php echo get_search_query(); ?>"
    >
</form>
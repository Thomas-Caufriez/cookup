<?php
/*
Template Name: Page modify profil
*/

if (!is_user_logged_in()) {
    wp_redirect( home_url('/login') );
      exit;
    }

get_header('bis');

$current_user = wp_get_current_user();

if ( isset( $_POST['new_password'] ) && !empty( $_POST['new_password'] ) ) {
    $user_id = $current_user->ID;

    $new_password = sanitize_text_field( $_POST['new_password'] );

    wp_set_password( $new_password, $user_id );
}
?>


<div>
    <div class="container">
        <h1 class="text-center h2Salsa mt-4 mb-4">Modifier mon compte</h1>
    </div>

    <form method="post"
    class="bg-light m-0 m-md-3 m-xl-5 p-3 p-md-4 p-xl-5" 
    style="border-radius: 15px;" 
    >
        <div class="text-center mb-3 mt-3">
            <div class="input-group">
                <input 
                    type="password" 
                    name="new_password" 
                    id="new_password" 
                    required
                    placeholder="Ex : lesCr3at3ursDeC0okupSontL3s+Beaux"
                    class="form-control"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                >
                <span class="input-group-text"><input type="checkbox" onclick="changepwd2()" class="form-check-input me-2">Voir</span>
            </div>
        </div>
        <div>
          <p class="small pRobotoThinLogin">Le mot de passe doit contenir au minimum 6 caractères dont au moins une majuscule, une minuscule et un chiffre</p>
        </div>
        <button
            type="submit"
            class="btn btnAllLogin d-flex align-items-center justify-content-center"
        >
            <p class="pRobotoLogin m-0"> Mettre à jour </p>
            <img    
                src="<?php echo get_template_directory_uri(); ?>/assets/img/iconValiderNewMdp.svg" 
                alt="icon valider"
                class="iconLogin"
            >
        </button>
        <input 
            type="hidden" 
            name="redirect_to" 
            value="<?php echo esc_url( home_url('/profil') ); ?>"
        >
    </form>
</div>

<?php get_footer(); ?>
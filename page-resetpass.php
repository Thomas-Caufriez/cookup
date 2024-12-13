<?php
/*
Template Name: Page reset password
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

<div class="container">
    <form method="post">
        <div class="mb-3">
            <label 
                for="new_password"
                class="from-label"
            >
                Nouveau mot de passe
            </label>
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
                <span class="input-group-text"><input type="checkbox" onclick="changepwd2()" class="form-check-input">Voir</span>
            </div>
        </div>
        <div>
          <p class="small">Le mot de passe doit contenir au minimum 6 caractères dont au moins une majuscule, une minuscule et un chiffre</p>
        </div>
        <div class="mb-3 form-check">
            <input 
                type="checkbox" 
                class="form-check-input" 
                id="verif"
                required
            >
            <label 
                class="form-check-label" 
                for="verif"
            >
                Vérification
            </label>
        </div>
        <button
            type="submit"
            class="btn btn-primary"
        >
            Mettre à jour le mot de passe
        </button>
        <input 
            type="hidden" 
            name="redirect_to" 
            value="<?php echo esc_url( home_url('/profil') ); ?>"
        >
    </form>
</div>

<?php get_footer('bis'); ?>
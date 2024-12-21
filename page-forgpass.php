<?php
/*
Template Name: Page forgot password
*/

if (is_user_logged_in()) {
    wp_redirect( home_url('/profil') );
      exit;
    }

get_header('bis');
?>

<h2 class="text-center mb-3 mt-3 h2Salsa ">Mot de passe oublié</h2>



<form>
  <div class="container mb-3">
      <label 
        for="retrieve" 
        class="form-label pRobotoLogin"
      >
        Adresse email
      </label>
      <input 
        type="text" 
        name="retrieve"
        class="form-control" 
        id="retrieve" 
        placeholder="Ex : John@doe.com"
      >
      <p class="pRobotoThinLogin">Vous allez recevoir un e-mail pour changer votre mot de passe</p>
    </div>
    
    <div class="container text-center">
      <button
          type="submit"
          class="btn btn-light btnAllLogin"
          onclick="sendmail()"
      >
        <span class="pRobotoLogin">Envoyer</span>
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/envoyé.svg" 
          alt="login"
          class="iconLogin"
        >
      </button>
    </div>
</form>

<?php get_footer(); ?>
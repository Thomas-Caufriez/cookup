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

<h1 class="text-center">Récupération de mot de passe</h1>



<form>
  <div class="container mb-3">
      <label 
        for="retrieve" 
        class="form-label"
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
    </div>
    <div class="container">
      <button
          type="submit"
          class="btn btn-primary"
          onclick="sendmail()"
      >
          Envoyer un email de récupération
      </button>
    </div>
</form>

<?php get_footer(); ?>
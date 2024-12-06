<?php
/*
Template Name: Page Inscription
*/

/*if (is_user_logged_in()) {
    wp_redirect( home_url('/profil') );
      exit;
  }*/

get_header('bis'); 
?>

<form method="post" name="myForm">
  User <input type="text"  name="uname" />
  Email  <input id="email" type="text" name="uemail" />
  Password  <input type="password"  name="upass" />
  <input type="submit" value="Submit" />
</form>

<?php get_footer('bis'); ?>
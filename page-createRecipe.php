<?php
/*
Template Name: Page create recipe
*/

if (!is_user_logged_in()) {
    wp_redirect( home_url('/login') );
	    exit;
    }

get_header('bis'); 
?>

<h1 class="text-center m-3">Créer / modifier ma recette</h1>

<form 
    method="post" 
    enctype="multipart/form-data"
    class="m-3"
>
    <div class="row row-cols-1 row-cols-md-2 gx-5">
        <div class="col">
            <div class="my-3">
                <label 
                    for="post_title" 
                    class="form-label"
                >
                    Titre de la recette
                </label>
                <input 
                    type="text" 
                    name="post_title" 
                    id="post_title" 
                    required class="form-control"
                >
            </div>
            <div class="my-3">
                <div>
                    <label for="thumbnail">Image de la recette</label><span class="fw-lighter">  Veuillez changer la taille de votre image à 1024px/438px (21:9) avant de l'envoyer</span>
                    <input 
                        type="file" 
                        name="thumbnail" 
                        id="thumbnail"
                        accept="image/jpeg, image/png" 
                        required 
                        class="form-control"
                    >
                </div>
            </div>
            <div class="my-3">
                <?php 
                    $tags = [
                        'temps' => [
                            1 => '-30min',
                            2 =>  '+30min',
                            3 => '+1h'
                        ],
                        'difficulte' => [
                            1 => 'facile',
                            2 => 'moyen',
                            3 => 'difficile'
                        ],
                        'prix' => [
                            1 => '-15€',
                            2 =>  '+15€',
                            3 => '+30€'
                        ],
                    ]
                ?>
                <?php foreach ($tags as $tagcategory => $tagtab): // boucle qui parcourt le tableau tag en prenant le nom des autres tableaux. Prends aussi leur valeur (le tableau associé) ?>
                    <p class="mb-0 mt-3"><?php echo ucfirst($tagcategory); //met la première lettre en majuscule ?></p>
                    <div class="row row-cols-3 justify-content-around my-2">
                        <?php foreach ($tagtab as $tagval => $tag): // boucle qui parcourt les tableaux avec les tags ?>
                            <div class="col-4 d-flex align-items-center gap-2">
                                <input 
                                    type="radio" 
                                    name="<?php echo $tagcategory; ?>" 
                                    id="<?php echo $tag; ?>" 
                                    value="<?php echo $tagval; ?>" 
                                    class="btn-check"
                                    required
                                >
                                <label 
                                    for="<?php echo $tag; ?>" 
                                    class="btn btn-outline-primary w-100"
                                >
                                    <?php echo ucfirst($tag); ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="d-flex gap-2 my-3">
                <div>
                    <label for="dishtype">Choisissez le type de plat</label>
                </div>
                <div>
                    <select 
                        class="form-select" 
                        id="dishtype" 
                        name="dishtype"
                    >
                        <option value="starter">Entrée</option>
                        <option value="maincourse" selected>Plat</option>
                        <option value="desert">Dessert</option>
                        <option value="drink">Boisson</option>
                        <option value="brunch">Brunch</option>
                        <option value="sidedish">Assortiment</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col my-3">
            <div>
                <label for="description">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    required 
                    class="form-control"
                ></textarea>
            </div>
            <div class="my-3">
                <p>Sélectionnez les types d'ingrédients de votre plat</p>
                <div class="row gap-2 justify-content-evenly text-center">
                    <?php 
                    $ingredients = ['proteine', 'legumineuse', 'cereale & grain', 'noix & graine', 'fruit', 'legume', 'produit laitier'];
                    ?>

                    <?php foreach ($ingredients as $ingredient): ?>
                        <div class="col-3 d-flex align-items-center gap-2 my-1">
                            <input 
                                class="btn-check" 
                                type="checkbox" 
                                role="switch" 
                                value="<?php echo $ingredient; ?>" 
                                id="<?php echo $ingredient; ?>"
                            >
                            <label 
                                class="btn btn-outline-primary w-100" 
                                for="<?php echo $ingredient; ?>"
                            >
                                <?php echo ucfirst($ingredient); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="my-3">
                <label for="descingredient">Ingrédients</label> <!-- à la base, je voulais controller cette partie en ajoutant des lignes via jquery quand l'utilisateur coche une des cases via des boutons déroulants du menu au dessus -->
                <textarea 
                    name="descingredient" 
                    id="descingredient"
                    required
                    placeholder="Ex : 3 oignons rouges"
                    class="form-control"
                ></textarea>
            </div>
            <div class="d-flex gap-2 my-3">
                <label for="nbrperson">Nombre de personnes</label>
                <div>
                    <input
                        type="number"
                        class="form-control"
                        required
                        name="nbrperson"
                        id="nbrperson"
                    >
                </div>
            </div>
        </div>
    </div>
    <div class="my-3">
        <label for="preparation">Recette</label>
        <textarea 
            name="preparation" 
            id="preparation"
            required
            placeholder="Ex : Etape 1 : ...."
            class="form-control"
        ></textarea>
    </div>
    <div class="my-3">
        <p>Status</p>
        <div class="d-flex gap-2">
            <div>
                <button
                    type="button"
                    class="btn btn-outline-primary"
                >
                    <input 
                        type="radio" 
                        name="status" 
                        id="private" 
                        value="private" 
                        class="form-check-input"
                    >
                    <label 
                        for="private" 
                        class="form-check-label"
                    >
                        Privé
                    </label>
                </button>
            </div>
            <div>
                <button 
                    type="button"
                    class="btn btn-outline-primary"
                >
                    <input 
                        type="radio" 
                        name="status" 
                        id="public" 
                        value="public" 
                        class="form-check-input"
                        checked
                    >
                    <label 
                        for="public" 
                        class="form-check-label"
                    >
                        Public
                    </label>
                </button>
            </div>
        </div>
    </div>
    <div class="text-center">
        <input 
            type="submit" 
            name="submit" 
            value="Publier ma recette" 
            class="btn btn-primary">
    </div>    
</form>
<?php get_footer(); ?>
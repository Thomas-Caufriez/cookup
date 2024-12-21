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

<h1 class="text-center">Créer / modifier ma recette</h1>

<form 
    method="post" 
    enctype="multipart/form-data"
>
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <div>
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
            <div>
                <div>
                    <label for="thumbnail">Image de la recette</label>
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
            <div>
                <?php 
                    $tags = [
                        'temps' => ['-30m', '+30m', '+1h'],
                        'difficulte' => ['facile', 'moyen', 'difficile'],
                        'prix' => ['-15€', '+15€', '+30€'],
                    ]
                ?>
                <?php foreach ($tags as $tagcategory => $tagtab): // boucle qui parcourt le tableau tag en prenant le nom des autres tableaux. Prends aussi leur valeur (le tableau associé) ?>
                    <p><?php echo ucfirst($tagcategory); //met la première lettre en majuscule ?></p>
                    <div class="row row-cols-3 justify-content-evenly">
                        <?php foreach ($tagtab as $tag): // boucle qui parcourt les tableaux avec les tags ?>
                            <div class="col-3 d-flex align-items-center gap-2">
                                <input 
                                    type="radio" 
                                    name="<?php echo $tagcategory; ?>" 
                                    id="<?php echo $tag; ?>" 
                                    value="<?php echo $tag; ?>" 
                                    class="form-check-input"
                                    required
                                >
                                <button
                                type="button"
                                class="btn btn-outline-primary w-100"
                                >
                                    <label 
                                        for="<?php echo $tag; ?>" 
                                        class="form-check-label w-100"
                                    >
                                        <?php echo ucfirst($tag); ?>
                                    </label>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="d-flex gap-2">
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
        <div class="col">
            <div>
                <label for="description">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    required 
                    class="form-control"
                ></textarea>
            </div>
            <p>Sélectionnez les types d'ingrédients de votre plat</p>
            <div class="row gap-2 justify-content-evenly text-center">
                <?php 
                $ingredients = ['proteine', 'legumineuse', 'cereale & grain', 'noix & graine', 'fruit', 'legume', 'produit laitier'];
                ?>

                <?php foreach ($ingredients as $ingredient): ?>
                    <div class="col-3 d-flex align-items-center gap-2">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            role="switch" 
                            value="<?php echo $ingredient; ?>" 
                            id="<?php echo $ingredient; ?>"
                        >
                        <button 
                            class="btn btn-outline-primary w-100" 
                            type="button"
                        >
                            <label 
                                class="form-check-label w-100" 
                                for="<?php echo $ingredient; ?>"
                            >
                                <?php echo ucfirst($ingredient); ?>
                            </label>
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
            <div>
                <label for="descingredient">Ingrédients</label> <!-- à la base, je voulais controller cette partie en ajoutant des lignes via jquery quand l'utilisateur coche une des cases via des boutons déroulants du menu au dessus -->
                <textarea 
                    name="descingredient" 
                    id="descingredient"
                    required
                    placeholder="Ex : 3 oignons rouges"
                    class="form-control"
                ></textarea>
            </div>
            <div class="d-flex gap-2">
                <label>Nombre de personnes</label>
                <div>
                    <input 
                        type="number"
                        class="form-control"
                        required
                    >
                </div>
            </div>
        </div>
    </div>
    <div>
        <label for="preparation">Recette</label>
        <textarea 
            name="'preparation" 
            id="preparation"
            required
            placeholder="Ex : Etape 1 : ...."
            class="form-control"
        ></textarea>
    </div>
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
    <div class="text-center">
        <input 
            type="submit" 
            name="submit" 
            value="Publier ma recette" 
            class="btn btn-primary">
    </div>
</form>
<?php get_footer(); ?>
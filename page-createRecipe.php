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

<h1>Créer / modifier ma recette</h1>

<form 
    method="post" 
    enctype="multipart/form-data"
>
    <div class="col-6">
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
    <div class="row">
        <div class="col-6">
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
        <div class="col-6">
            <div class="row row-cols-3">
                <div class="col">
                    <input 
                        type="radio" 
                        name="time" 
                        id="-30m" 
                        value="-30m" 
                        class="form-check-input"
                    >
                    <label 
                        for="-30m" 
                        class="form-check-label"
                    >
                        -30min
                    </label>
                </div>
                <div class="col">
                    <input 
                        type="radio" 
                        name="time" 
                        id="+30m" 
                        value="+30m" 
                        class="form-check-input"
                    >
                    <label 
                        for="+30m" 
                        class="form-check-label"
                    >
                        +30min
                    </label>
                </div>
                <div class="col">
                    <input 
                        type="radio" 
                        name="time" 
                        id="+1hm" 
                        value="+1h" 
                        class="form-check-input"
                    >
                    <label 
                        for="+1hm" 
                        lass="form-check-label"
                    >
                        +1h
                    </label>
                </div>
            </div>
            <div class="row row-cols-3">
                <div class="col">
                    <input 
                        type="radio" 
                        name="difficulty" 
                        id="easy" 
                        value="easy" 
                        class="form-check-input"
                    >
                    <label 
                        for="easy" 
                        class="form-check-label"
                    >
                        Facile
                    </label>
                </div>
                <div class="col">
                    <input 
                        type="radio" 
                        name="difficulty" 
                        id="medium" 
                        value="medium" 
                        class="form-check-input"
                    >
                    <label 
                        for="medium" 
                        class="form-check-label"
                    >
                        Moyen
                    </label>
                </div>
                <div class="col">
                    <input 
                        type="radio" 
                        name="difficulty" 
                        id="hard" 
                        value="hard" 
                        class="form-check-input"
                    >
                    <label 
                        for="hard" 
                        class="form-check-label"
                    >
                        Difficile
                    </label>
                </div>
            </div>
            <div class="row row-cols-3">
                <div class="col">
                    <input 
                        type="radio" 
                        name="cost" 
                        id="-15e" 
                        value="-15e" 
                        class="form-check-input"
                    >
                    <label 
                        for="-15e" 
                        class="form-check-label"
                    >
                        -15€
                    </label>
                </div>
                <div class="col">
                    <input 
                        type="radio" 
                        name="cost" 
                        id="+15" 
                        value="+15e" 
                        class="form-check-input"
                    >
                    <label 
                        for="+15e" 
                        class="form-check-label"
                    >
                        +15€
                    </label>
                </div>
                <div class="col">
                    <input 
                        type="radio" 
                        name="cost" 
                        id="+30e" 
                        value="+30e" 
                        class="form-check-input"
                    >
                    <label 
                        for="+30e" 
                        class="form-check-label"
                    >
                        +30€
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="dishtype">Choisissez le type de plat</label>
        </div>
        <div class="col-3">
            <select 
                class="form-select" 
                id="dishtype" 
                name="dishtype"
                required
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
    <div>
        <label for="description">
            Description :
        </label>
        <textarea 
            name="description" 
            id="description" 
            required 
            class="form-control"
        >
        </textarea>
    </div>
    <div class="row text-center">
        <!-- tableaux -->
        <?php 
        $proteins = ['boeuf', 'poulet', 'porc', 'saumon', 'thon'];
        $leguminous = ['lentille', 'fève', 'haricot', 'pois', 'soja'];
        $cereals = ['quinoa', 'mais', 'riz', 'avoine', 'blé'];
        $nuts = ['noix', ];
        $fruits = [];
        $vegetables = [];
        $dairys = [];
        ?>
        <p>Sélectionnez les ingrédients de votre plat</p>
        <div class="dropdown col"> <!-- bouton pour les protéines -->
            <button 
                class="btn btn-primary dropdown-toggle" 
                type="button" 
                data-bs-toggle="dropdown" 
                aria-expanded="false"
            >
                <p>Prot. animale</p>
            </button>
            <ul class="dropdown-menu">
                <?php foreach ($proteins as $protein): ?>
                    <li class="dropdown-item">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            value="<?php echo $protein; ?>"
                            id="<?php echo $protein; ?>"
                        >
                        <label class="form-check-label" for="<?php echo $protein; ?>"><?php echo ucfirst($protein); ?></label>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="dropdown col"> <!-- bouton pour les légumineuses-->
            <button 
                class="btn btn-primary dropdown-toggle" 
                type="button" 
                data-bs-toggle="dropdown" 
                aria-expanded="false"
            >
                <p>Légumineuses</p>
            </button>
            <ul class="dropdown-menu">
                <?php foreach ($leguminous as $legume): ?>
                    <li class="dropdown-item">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            value="<?php echo $legume; ?>"
                            id="<?php echo $legume; ?>"
                        >
                        <label class="form-check-label" for="<?php echo $legume; ?>"><?php echo ucfirst($legume); ?></label>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div>
        <input type="submit" name="submit" value="Publier ma recette" class="btn btn-primary">
    </div>
</form>


<?php get_footer(); ?>
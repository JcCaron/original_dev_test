
    <div>
        <a href="/" class="btn-back">Retour</a>
    </div>

    <?php if (isset($ressource)):?>
        <h1>Modifier: <?= esc($ressource['name']) ?></h1>
        <form id="modifyRessourceForm" enctype="multipart/form-data" method="POST" onsubmit="event.preventDefault(); modifyRessource(<?= esc($ressource['id']) ?>);">
    <?php else: ?>
        <h1>Ajouter une ressource</h1>
        <form id="creerRessourceForm" enctype="multipart/form-data" method="POST" onsubmit="event.preventDefault(); addRessource()">
    <?php endif; ?>
        <div class="form-group">
            <label for="image_src">Image:</label>
            <?php if (isset($ressource) && !empty($ressource['image_src'])): ?>
            <img src="<?= esc($ressource['image_src']) ?>" class="small-image"/>
            <input type="hidden" id="image_src" name="image_src" value="<?= esc($ressource['image_src']) ?>">
            <input type="file" name="image" id="image">
            <?php else: ?>
            <input required type="file" name="image" id="image">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" name="name" id="name" value="<?= isset($ressource) ? esc($ressource['name']) : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description courte:</label>
            <textarea required name="description" id="description"><?= isset($ressource) ? esc($ressource['description']) : '' ?></textarea>
        </div>

        <div class="form-group">
            <label for="long_description">Description longue:</label>
            <textarea required name="long_description" id="long_description"><?= isset($ressource) ? esc($ressource['long_description']) : '' ?></textarea>
        </div>

        <div class="form-group">
            <label for="type">Type:</label>
            <select name="type" id="type">
                <option value="siteweb" <?= isset($ressource) && $ressource['type'] == 'siteweb' ? 'selected' : '' ?>>Site Web</option>
                <option value="youtube" <?= isset($ressource) && $ressource['type'] == 'youtube' ? 'selected' : '' ?>>YouTube</option>
                <option value="livre" <?= isset($ressource) && $ressource['type'] == 'livre' ? 'selected' : '' ?>>Livre</option>
                <option value="application" <?= isset($ressource) && $ressource['type'] == 'application' ? 'selected' : '' ?>>Application</option>
            </select>
        </div>

        <div class="form-group">
            <label for="website">Site web:</label>

            <input required type="text" name="website" id="website" value="<?= isset($ressource) ? esc($ressource['website']) : '' ?>">
        </div>

        <div class="form-group">
            <label for="is_free">Gratuit:</label>
            <select name="is_free" id="is_free">
                <option value="yes" <?= isset($ressource) && $ressource['is_free'] == 'yes' ? 'selected' : '' ?>>Oui</option>
                <option value="no" <?= isset($ressource) && $ressource['is_free'] == 'no' ? 'selected' : '' ?>>Non</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="visible" <?= isset($ressource) && $ressource['status'] == 'visible' ? 'selected' : '' ?>>Visible</option>
                <option value="hidden" <?= isset($ressource) && $ressource['status'] == 'hidden' ? 'selected' : '' ?>>Hidden</option>
            </select>
        </div>

        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" value="<?= isset($ressource) ? esc($ressource['slug']) : '' ?>">
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <select name="rating" id="rating">
                <option value="1" <?= isset($ressource) && $ressource['rating'] == '1' ? 'selected' : '' ?>>1</option>
                <option value="2" <?= isset($ressource) && $ressource['rating'] == '2' ? 'selected' : '' ?>>2</option>
                <option value="3" <?= isset($ressource) && $ressource['rating'] == '3' ? 'selected' : '' ?>>3</option>
                <option value="4" <?= isset($ressource) && $ressource['rating'] == '4' ? 'selected' : '' ?>>4</option>
                <option value="5" <?= isset($ressource) && $ressource['rating'] == '5' ? 'selected' : '' ?>>5</option>
            </select>
        </div>

        <?php if (isset($ressource)): ?>
            <input type="hidden" name="creation_date" id="creation_date" value="<?= esc($ressource['creation_date']) ?>">
        <?php endif; ?>

        <div class="form-actions">
            <button type="submit"><?= isset($ressource) ? 'Modifier Ressource' : 'Ajouter Ressource' ?></button>
        </div>
    </form>
</div>

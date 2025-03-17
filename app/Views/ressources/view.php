

<!-- CONTENT -->
<div class="container">
    <section>

        <img src="<?= esc($ressource['image_src']) ?>" alt="<?= esc($ressource['name']) ?>"/>
        <br/><br/>
        <strong><?= esc($ressource['name']) ?></strong><br/>
        <?= esc($ressource['description']) ?><br/>
        <a href="<?= esc($ressource['website']) ?>" target="_blank">Visitez le site web</a>
        <br/><br/>
        <strong>Rating:</strong>
        <?php for ($i = 0; $i < $ressource['rating']; $i++): ?>
            <span>&#9733;</span>
        <?php endfor; ?>
        <?php for ($i = $ressource['rating']; $i < 5; $i++): ?>
            <span>&#9734;</span>
        <?php endfor; ?>
        
    </section>
</div>
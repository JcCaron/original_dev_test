

<!-- CONTENT -->

<section>

    <img src="<?= esc($ressource['image_src']) ?>" alt="<?= esc($ressource['name']) ?>"/>
    <br/><br/>
    <strong><?= esc($ressource['name']) ?></strong><br/>
    <?= esc($ressource['description']) ?><br/>
    <a href="<?= esc($ressource['website'], 'url') ?>" target="_blank">Visitez le site web</a>
    
</section>



<!-- CONTENT -->

<section>

	<table class="repertoire">
		<?php foreach($ressources as $ressource) { ?>
			<tr>
				<td class="ressource_image"><img src="<?= esc($ressource['image_src']) ?>" alt="<?= esc($ressource['name']) ?>"/></td>
				<td>
					<strong><?= esc($ressource['name']) ?></strong><br/>
					<?= esc($ressource['description']) ?><br/>
					<a href="<?= esc($ressource['website'], 'url') ?>" target="_blank">Visitez le site web</a> 
					<a href="/ressource/<?= esc($ressource['slug'], 'url') ?>">Plus d'info</a>
				</td>
			</tr>
		<?php } ?>	
	</table>

</section>




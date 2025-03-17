<!-- CONTENT -->
<div class="bg-white bg-opacity-40 p-8">
	<form method="GET" action="">
		<div class="mb-10 border-lg p-4 rounded-lg bg-white shadow-[8px_8px_24px_0px_rgba(78,90,114,0.08)]">
			<div class="flex gap-2 items-stretch">
				<input id="search_name" name="search_name"  placeholder="Rechercher..." 
				class="p-2 w-full rounded-lg border border-gray-300" type="text" value="<?= isset($filters['search_name']) ? esc($filters['search_name']) : '' ?>">
				<button type="submit" class="group/button inline-flex items-center justify-center whitespace-nowrap font-medium text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 transition-[color,background-color,border-color,box-shadow] duration-200 ease-in-out shadow-none shadow-transparent bg-background-cold text-secondary-foreground hover:bg-accent hover:shadow-lg h-9 px-3 py-2 rounded-md !block !h-auto shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
					stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
				class="lucide lucide-search w-4 h-4">
						<circle cx="11" cy="11" r="8"></circle>
						<path d="m21 21-4.3-4.3"></path>
					</svg>
				</button>
			</div>
		</div>

		<div class="md:flex gap-8">
			<div class="mb-5 md:mb-0 md:w-2/5 lg:w-1/5">
				<div class="rounded-lg bg-opacity-80 p-4 bg-white shadow-[8px_8px_24px_0px_rgba(78,90,114,0.08)]">
				<p class="text-lg font-bold text-[#1B1F25]">Filtres</p>

					<div class="md:block">
							<nav class="relative">
								<div>
									<div class="group/accordion divide-y divide-accent border-accent border-y py-3" data-orientation="vertical">
									<div data-state="opened" data-orientation="vertical" class="hover:bg-accent/35 rounded-lg">
										<div class="rounded-lg p-0 hover:bg-transparent !bg-transparent my-0">
											<div data-state="opened" id="radix-:r4:" role="region" aria-labelledby="radix-:r3:" data-orientation="vertical" class="overflow-hidden text-sm">
												<div class="p-0 pl-6 mt-3">
													<div class="flex items-center gap-2 my-2 text-[#9696A3] text-base">
														<div class="relative flex items-center flex-shrink-0">
															<input name="siteweb" id="siteweb" value="1" class="h-5 w-5 flex-shrink-0 rounded-full border" 
																type="checkbox" <?= isset($filters['siteweb']) && $filters['siteweb'] ? 'checked' : '' ?>>
														</div>
														<label class="font-medium cursor-pointer" for="web">Site Web</label>
													</div>
													<div class="flex items-center gap-2 my-2 text-[#9696A3] text-base">
														<div class="relative flex items-center flex-shrink-0">
															<input id="youtube" name="youtube" value="1" class="h-5 w-5 flex-shrink-0 rounded-full border" 
															type="checkbox" <?= isset($filters['youtube']) && $filters['youtube'] ? 'checked' : '' ?>>
														</div>
														<label class="font-medium cursor-pointer" for="youtube">Youtube</label>
													</div>
													<div class="flex items-center gap-2 my-2 text-[#9696A3] text-base">
														<div class="relative flex items-center flex-shrink-0">
															<input id="livre" name="livre" value="1" class="h-5 w-5 flex-shrink-0 rounded-full border" 
															type="checkbox" <?= isset($filters['livre']) && $filters['livre'] ? 'checked' : '' ?>>
														</div>
														<label class="font-medium cursor-pointer" for="livre">Livre</label>
													</div>
													<div class="flex items-center gap-2 my-2 text-[#9696A3] text-base">
														<div class="relative flex items-center flex-shrink-0">
															<input name="application" id="application" value="1" class="h-5 w-5 flex-shrink-0 rounded-full border" 
															type="checkbox" <?= isset($filters['application']) && $filters['application'] ? 'checked' : '' ?>>
														</div>
														<label class="font-medium cursor-pointer" for="application">Application</label>
													</div>
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-auto text-center">
									<button type="submit" class="group/button justify-center rounded-md m-auto mt-3 bg-[#313DC5] hover:bg-[#252d8f]">
										Appliquer les filtres
									</button>
									<?php if (isset($logged_user) && $logged_user["role"] == "admin")  { ?> 
										<a id="addRessource" href="/admin/ressources/add">Créer une ressource</a>
									<?php }  ?>
									
								</div>
							</nav>

					</div>
				</div>
			</div>

			<div class="grid-container">
				<?php foreach($ressources as $ressource): ?>
					<div class="grid-item" style="background-image: url('<?= esc($ressource['image_src']) ?>');">
						<div class="info">
							<a class="slug" href="/ressource/<?= esc($ressource['slug'], 'url') ?>">+</a>
							<strong><?= esc($ressource['name']) ?></strong><br/>
							<p><?= esc($ressource['description']) ?></p>
							<a class="site"href="<?= esc($ressource['website']) ?>" target="_blank">Visitez le site</a>
						</div>
						<?php if (isset($logged_user) && $logged_user["role"] == "admin") { ?> 
								<a class="btn btn-primary" href="/admin/ressources/modify/<?= esc($ressource['id']) ?>">Modifier</a>
								<button class="btn btn-danger" onclick="deleteRessource(<?= esc($ressource['id']) ?>)">Supprimer</button>
							<?php }  ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		</form>
</div>




<!-- CONTENT -->

<section class="login">
    <h2>Connexion</h2>
	<form action="/account/login" method="POST">
        <label>Nom d'utilisateur :<input type="text" name="username"/></label><br/>
        <label>Mot de passe :<input type="password" name="password"/></label><br/>
        <button type="submit">Connexion</button>
    </form>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?php echo session()->getFlashdata('error'); ?></p>
    <?php endif; ?>
</section>
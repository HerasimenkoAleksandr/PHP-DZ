<!doctype html>
<html>

<head>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
    <!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PHP-DZ</title>
	<link rel="stylesheet" href="/css/site.css" />
</head>

<body>
<nav>
	<div class="nav-wrapper deep-purple">
	  <a href="/" class="brand-logo"><img src="/img/php.png"/></a>
	  <ul id="nav-mobile" class="right ">
		<?php foreach( [
			'/basics' => 'Основи',
			'/layout' => 'Шаблонізація', 
            '/regexp' => 'Регулярні вирази' ,
			'/api' => 'API',
			'/registration' => 'Реєстрація'
		] as $href => $name ) : ?>
			<li <?= $uri==$href ? 'class="active"' : '' ?> ><a href="<?= $href ?>"><?= $name ?></a></li>
		<?php endforeach ?>
		<li><a class="modal-trigger" href="#modal-login">Вхід</a></li>
	  </ul>
	</div>
</nav>

<div class="container">
<div id="modal-login" class="modal">
    <div class="modal-content">
        <h4>Вхід</h4>
        <form id="login-form">
            <div class="input-field">
                <input id="emailCheck" name="emailCheck" type="email" class="validate" required>
                <label for="emailCheck">Email</label>
            </div>
            <div class="input-field">
                <input id="passwordCheck" name="passwordCheck" type="password" class="validate" required>
                <label for="passwordCheck">Пароль</label>
            </div>
            <button class="btn deep-purple" type="submit" name="action">Увійти</button>
        </form>
    </div>
    <div class="modal-footer">
        <a  href="#!" class="modal-close waves-effect waves-green btn-flat">Закрити</a>
    </div>
</div>
	<?php include $page_body ; ?>
	
</div>



<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="/js/site.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var modalTrigger = document.querySelector('.modal-trigger');
    var modalLogin = document.getElementById('modal-login');
	var modalClose = document.querySelector('.modal-footer');

    modalTrigger.addEventListener('click', function() {
        modalLogin.style.display = 'block';
    });

	modalClose.addEventListener('click', function () {

		 modalLogin.style.display = 'none';
	})
});
</script>

</body>
</html>
<?php
    session_start();
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $interval = time() - $_SESSION['auth-moment'];
        if($interval > 10) {
            unset($_SESSION['user']);
            unset($_SESSION['auth-moment']);

        }
        else {
            $user = $_SESSION['user'];
            $_SESSION['auth-moment'] = time();
        }
    }
    else {
        $user = "null";
    }
?>
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
			'/signup' => 'Реєстрація'
		] as $href => $name ) : ?>
			<li <?= $uri==$href ? 'class="active"' : '' ?> ><a href="<?= $href ?>"><?= $name ?></a></li>
		<?php endforeach ?>
      
                 <?php
                 if(isset($_SESSION['user'])) {
                 ?> 
                          <img style="max-height: 50px; max-width: 50px; border-radius: 50%;" src="/avatar/<?=$_SESSION['user']['avatar']?>"/>
                          <li >  <a  id="out-botton" type="submit">Вихід</a> </li>
                          
                 <?php
                         } else {
                  ?>
                        <li > <a class="modal-trigger" href="#modal-login">Вхід</a> </li>
                    <?php
                 }
                ?>
           
	  </ul>
	</div>
</nav>

<?= var_export($user, true) ?></br> 

<div class="container  p4 ">
<div id="modal-login" class="modal p4">
    <div class="auth-modal p4">
        <h4 >Вхід</h4>
        <form id="login-form">
            <div class="input-field">
                <input id="emailCheck" name="emailCheck1" type="email" class="validate" required>
                <label for="emailCheck">Email</label>
            </div>
            <div class="input-field">
                <input id="passwordCheck" name="passwordCheck1" type="password" class="validate" required>
                <label for="passwordCheck">Пароль</label>
            </div>
            <button id = "auth-button" class="btn deep-purple" type="submit" name="action">Увійти</button>
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
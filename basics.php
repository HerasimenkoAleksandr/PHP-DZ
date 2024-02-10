<h1>Основи РНР</h1>
<p>
PHP додає наступну функціональність до HTML
</p>
<ul>
<li>Вирази</li>
<li>Інструкції</li>
<li>Управління формуванням HTML</li>
</ul>
<p>
Вирази задаються спеціальними тегами &lt;?= 2 + 3 ?&gt; =
<?= 2 + 3 ?>
</p>
<p>
Інструкції - блоки коду, який виконується без впливу на HTML
Є дві форми тегів: повна <?php ?> та скорочена <? ?>
Повна працює завжди, скорочена - якщо є відповідні налаштування
у конфігурації сервера. Вживання скороченої форми не рекомендується.
</p>
<p>
Змінні. Оскільки у РНР процедурна парадигма і простори імен не дуже
поширені, більшість слів є зарезервованою. Щоб не створювати конфлікти
зі змінними, всі змінні у РНР починаються з знаку $.
Типізація динамічна (на читання - як у JS)
</p>
<?php 
	$x = 30 ;
	$y = "20" ;
?>
<p>
!!! У РНР розрізняються оператори арифметичного додавання (+)
та рядкової конкатенації (.)
 x + y = <?= $x + $y ?>,  x . y = <?= $x . $y ?> <br/>
Ділення дробове, навіть якщо аргументи цілі: x / y = <?= $x / $y ?>
 для одержання цілого значення використовуються функції, наприклад,
intval( x / y ) = <?= intval( $x / $y ) ?>
</p>
<p>
Управління формуванням HTML - умовна та циклічна верстка.

</p>
<?php 
	$arr1 = [1,2,3,4,5] ;   // звичайний масив
	$arr2 = [ 'name2' => 'Petrovich', "age" => 42 ] ;   # асоціативний масив
?>
<?php if( count( $arr1 ) > 10 or false ) { ?>
	<h3>У масиві більше за 10 елементів</h3>
<?php } else { ?>
	<h3>У масиві не більше ніж 10 елементів</h3>
<?php } ?>

<?php if( isset( $arr2['name'] ) || false ) : ?>
	<p>Є елемент 'name' = <?= $arr2['name'] ?></p>
<?php else : ?>
	<b>Елемент 'name' не задано</b>
<?php endif ?>

<?php foreach( $arr1 as $element ) { ?>
	<b><?= $element ?></b><br/>
<?php } ?>

<?php foreach( $arr2 as $key => $value ) : ?>
	<b><?= $key ?>: <?= $value ?></b><br/>
<?php endforeach ?>
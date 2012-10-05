<?php require('_partials/header.php'); ?>

	<header>
		<h1>PHP + jQuery</h1>
	</header>

	<div class="main">
		
		<?php
			if ( $info) {
				echo "<h1>{$info->first_name} {$info->last_name}</h1>";
				echo "<p>{$info->film_info}</p>";
			} else {
				echo '<h2>Not Found</h2>';
			}
		?>

		<a class='button' href="index.php">back</a>

	</div>

<?php require('_partials/footer.php'); ?>
<?php require('_partials/header.php'); ?>

	<header>
		<h1>PHP + jQuery</h1>
	</header>

	<div class="main">
		<h1 class='t'>Search Actors By Last Name</h1>
			<form id='actor-selection' action="index.php" method='post'>
				<select name="q" id="q">
					<?php
						$alphabet = str_split('abcdefghijklmnopqrstuvwxyz');
						foreach ($alphabet as $letter) {
							echo "<option value='$letter'>$letter</option>";
						}
					?>
				</select>

				<button id='go' type='submit'>Go!</button>

			</form>
</div>

	<ul class="actors_list">
			
			<?php 
					#error_reporting(0); 
			if ( isset($actors) ) {
						foreach( $actors as $a ) {
							echo "<li data-actor_id='{$a->actor_id}'><a href='actor.php?actor_id={$a->actor_id}'>{$a->first_name} {$a->last_name}</a></li>";
					}
				}
			?>		
			<script id="actor_list_template" type="text/x-handlebars-template">
				{{#each this}}
				<li data-actor_id="{{actor_id}}">
					<a href="actor.php?actor_id={{actor_id}}">{{fullName this}}</a>
				</li>
				{{/each}}
			</script>	
	</ul>

	<div class="actor_info">

		<script id="actor_info_template" type="text/x-handlebars-template">
			<p>{{info}}</p>
			<span class="close">X</span>
		</script>		
  </div><!-- end .actor_info -->
	



<?php require('_partials/footer.php'); ?>




<?php

function  isXHR() {
	return isset(  $_SERVER['HTTP_X_REQUESTED_WITH'] );
}

function connect() {
	global $pdo;
	$pdo = new PDO('mysql:host=localhost;dbname=sakila', 'username', 'password');
}

function get_actors_by_last_name( $letter ) {
	global $pdo;

	$stmt = $pdo->prepare('
		 SELECT actor_id, first_name, last_name 
		 FROM actor
		 WHERE last_name LIKE :letter
		 LIMIT 10');

	$stmt->execute( array(':letter' => $letter . '%' ) );

	return $stmt->fetchAll( PDO::FETCH_OBJ ); 
}

function get_actor_info( $actor_id ) {
	global $pdo;

	$stmt = $pdo->prepare('
		 SELECT first_name, last_name, film_info
		 FROM actor_info
		 WHERE actor_id LIKE :actor_id
		 LIMIT 1');

	$stmt->execute( array(':actor_id' => $actor_id ) );

	return $stmt->fetch( PDO::FETCH_OBJ );
}
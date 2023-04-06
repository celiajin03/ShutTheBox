#!/usr/local/bin/php
<?php header('Content-Type: text/plain; charset=utf-8');

  $file = fopen('scores.txt', 'a');
  fwrite($file, "{$_POST['val1']} {$_POST['val2']}\n");
  fclose($file);
	
  $db = new SQLite3('all_scores.db');

  $statement = 'CREATE TABLE IF NOT EXISTS scores(username TEXT, score INTEGER)';
  $db->exec($statement);

  $statement = 'INSERT INTO scores (username, score) VALUES ';
  $statement .= "('$_POST[val1]', '$_POST[val2]')";
  $db->exec($statement);

  $db->close(); 
?>
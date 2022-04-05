<?php

// Session
require "models/Session.php";
Session::start();

echo "<p>Automatic redirection 2 secondes.</p>";

header('Refresh: 2; url=index.php');

require "views/success.phtml";
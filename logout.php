<?php
require "models/Session.php";

Session::start();
Session::destroy();

header("Location: index.php");
exit;


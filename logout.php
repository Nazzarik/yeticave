<?php
session_start();

unset($_SESSION['user']);

header("location: /yeticave/index.php");

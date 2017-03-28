<?php
session_start();
$httpSession = unserialize($_SESSION['s3ss10n']);
echo '<pre>'; print_r($httpSession);

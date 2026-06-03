<?php
session_start();
session_destroy();

// Redirect to Home Page
header("Location: index.html");
exit();
?>
<?php

session_start();

unset($_SESSION['userid']);
unset($_SESSION['user_name']);


session_destroy();



?>
<script>
window.location="login.php";
</script>
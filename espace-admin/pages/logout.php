<?php

session_destroy();

// echo '<script>window.location.href="?p=login-user"</script>';
header('Location: ?p=login-user');
?>
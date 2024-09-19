
<body>
    
</body>
<?php

session_start();
if (!empty($_SESSION['user'])){
    session_unset();
    session_destroy();
}
header("Location: http://localhost/php/project/templates/login.php");
die();


?>
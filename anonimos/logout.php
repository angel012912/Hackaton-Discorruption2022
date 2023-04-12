<!--Logout directo--> 
<?php
session_start();
session_destroy();
session_unset();
echo '<script type="text/javascript">
        setTimeout( function() { window.location.href = "index.php"; }, 1000 )
        </script>';
?>
<!--Logout directo--> 
<?php
/*
Authors: 
  Jose Angel Garcia Gomez
  Jair Josue Jimarez Garcia
  Pablo Gonzalez de la Parra
  Erika Marlene García Sánchez
  Yael Ariel Marquez Mas      
Date: 06-03-2022
Description: This files manage the logout function of the user
*/

session_start();
session_destroy();
session_unset();
echo '<script type="text/javascript">
        setTimeout( function() { window.location.href = "index.php"; }, 1000 )
        </script>';
?>
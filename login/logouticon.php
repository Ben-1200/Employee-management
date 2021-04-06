<?php
   if(isset($_SESSION['id'])){
        echo "
        <form action='includes/logout.php' method='post'>
            <button type='submit' name='logout'>Log Out</button>
        </form>
             ";
      }      
?>
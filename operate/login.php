<?php 
    session_start();
    
    $_SESSION['islog'] = true;
    echo "<script>window.location.href='/app/organisation.php'</script>";
?>
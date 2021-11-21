<?php 
    session_start();
    
    $_SESSION['islog'] = true;
    $_SESSION['companyname'] = 'Çözelti';
    echo "<script>window.location.href='/app/organisation.php'</script>";
?>
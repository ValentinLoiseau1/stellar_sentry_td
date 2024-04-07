<?php
    if(isset($_SESSION['msg'])){
    $contenu = $_SESSION['msg'];

    echo "<div><p style='color: rgb(206, 0, 0);'>$contenu</p></div>";

    unset($_SESSION['msg']);
}
?>
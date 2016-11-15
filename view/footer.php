<footer style="position:absolute;right:0px;">
<?php
// DEBUG
echo '<div class="debug"><pre><p>DEBUG</p>';
echo '<p>GET    : ' . var_dump($_GET) . '</p>';
echo '<p>POST   : ' . var_dump($_POST) . '</p>';
echo '<p>SESSION: ' . var_dump($_SESSION) . '</p>';
echo '</pre></div>';

if (isset($_SESSION['user'])){
    $userName = $_SESSION['user'];
    $memberID= $_SESSION['userID'];
    echo 'USER Name:'. $userName . '</br>';
    echo 'UserID:' . $memberID;
}
else{
    $userName = 'Anonymous';
    echo 'USER Name:'. $userName;
}
?>
</footer>
<!--
</body>
</html>
-->

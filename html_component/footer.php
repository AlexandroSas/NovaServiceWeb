<footer>
    <ul id="footer-navbar">
        <li><a href="./tech_vehicles.php"><span class="material-icons">local_shipping</span></a></li>
        <li><a href="./tech_replacement.php"><span class="material-icons">build</span></a></li>
        <li><a href="./tech_home.php"><span class="material-icons">home</span></a></li>
        <li><a href="./tech_profile.php"><img src="./res/img/profile_pictures/<?php if(isset($_SESSION['Image'])){echo $_SESSION['Image'];} else {echo "default.jpg";} ?>" alt="profile"></a></li>
    </ul>
</footer>
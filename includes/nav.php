<nav class="navbar">
    <div class="link-container">
        <a href="./">
            <img class="nav-logo" src = "assets/logo.png"/>
        </a>
        <div class="links-right">
            <a href="index.php">Movies</a>
            <?php 
            if(!isset($_SESSION['email'])){ ?>
                <a href="register.php">Register</a>
                <a href="login.php">Log in</a>
                <?php }
            
            if(isset($_SESSION['email'])){ ?>
                <a href="logout.php">Log out</a>
            <?php }
            ?>
            <a href="moviebookingrequest.php">Request a movie</a>
        </div>
    </div>
</nav>
<nav class="navbar">
    <div class="link-container">
        <a href="./">
            <img class="nav-logo" src = "assets/logo.png"/>
        </a>
        <div class="links-right">
            <a class="glow-on-hover" href="index.php">Movies</a>
            <?php 
            if(!isset($_SESSION['email'])){ ?>
                <a class="glow-on-hover" href="register.php">Register</a>
                <a class="glow-on-hover" href="login.php">Log in</a>
                <?php }
            
            if(isset($_SESSION['email'])){ ?>
                <a class="glow-on-hover" href="logout.php">Log out</a>
            <?php }
            ?>
            <a class="glow-on-hover" href="moviebookingrequest.php">Request a movie</a>
        </div>
    </div>
</nav>
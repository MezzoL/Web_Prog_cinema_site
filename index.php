<?php
 include_once 'includes/head.php';
    try {
        require_once 'utils/init.php';

        $categories = $pdo->query("SELECT * FROM movies");
    } catch (Throwable $exp) { }
?>

<?php
if (isset($_GET['movie_id']) AND !isset($_SESSION["id"])){
    header("Location: login.php");
}elseif(isset($_GET['movie_id']) AND isset($_SESSION["id"])){
    $movie_id =$_GET['movie_id'];
    $user_id=$_SESSION["id"];
    $query = $pdo->prepare('INSERT INTO booking(user_id , movie_id) VALUES(?, ?)');
    $query->execute([$user_id, $movie_id]);
}
?>

    <body>
    <?php include_once 'includes/nav.php' ?>

        <div >
         
        <!-- for the BG -->
         <div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
         </div>

            <h1>CINEMA</h1>
            <div class="center"><h2 class="animate-character">Let the movies carry you away</h2></div>

            <div class= "flex">
                <?php
                    if ($error->type === 'db' || !isset($categories)) {
                ?>
                    <p> Could not load products. Please try again later.</p>
                <?php
                    } else {
                        foreach ($categories as $row) {
                ?>
                        
                            <div class="flex-element">
                                <a href="poster.php?row_id=<?php echo $row['id'] ?>"><?= $row['name'] ?></a>
                                <a href="poster.php?row_id=<?php echo $row['id'] ?>">
                                    <img class="dynamic" src="<?= $row['url'] ?>" />
                                </a>
                            </div>
                        
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>

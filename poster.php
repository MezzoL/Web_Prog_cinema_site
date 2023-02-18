<?php
 include_once 'includes/head.php';
    try {
        require_once 'utils/init.php';

        $categories = $pdo->query("SELECT * FROM movies");
    } catch (Throwable $exp) { }
?>
    <body>
        <?php include_once 'includes/nav.php' ?>
        <?php
                if (isset($_GET['row_id'])) {
                    $id = $_GET['row_id'];
                

                $query = $pdo->prepare("SELECT * FROM movies WHERE id = {$id}");
                $query->execute();
                $post = $query->fetchAll();
                foreach ($post as $row) {
                    $name=$row['name'];
                    $description=$row['description'];
                    $url=$row['url'];
                    ?>
                    <div class="poster-container">
                    <div class="box flex-element">
                        <p><?= $row['name'] ?></p>
                            <img class="dynamic" src="<?= $url ?>" />
                        <p class="movie-description"><?=  $description ?></p>
                    </div>
                    <a href="index.php?movie_id=<?php echo $id ?>">
                    <button class="glow-on-hover book-btn" type="submit" > Book Now! </button></a>
                </div>
                
        <?php
                }
            }
        ?>
    </body>
</html>

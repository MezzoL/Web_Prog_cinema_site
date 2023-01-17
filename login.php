<?php
include_once 'includes/head.php';
try {
    require_once 'utils/init.php';
} catch (Throwable $exp) {
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validation = [];

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    
    if (!isset($_POST['password'])) {
        $validation['password'] = 'Password field is required.';
    } else {
        $password = $_POST['password'];
    }

        if (isset($password)) {
            $query = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1");
            $query->execute([$username, $username]);
            $user = $query->fetchAll();

            if (!is_array(($user)) || count($user) === 0) {
                $validation['username'] = 'Username or password is incorrect.';
                $validation['password'] = 'Username or password is incorrect.';
            } else {
                
                foreach($user as $row){
                    $db_user_id = $row['id'];
                    $db_username = $row['username'];
                    $db_user_email = $row['email'];
                    $db_user_password = $row['password'];
                    $db_user_fname = $row['fname'];
                    $db_user_lname  = $row['lname'];
                    $db_user_birthday = $row['dob'];
                    $db_user_sex= $row['sex'];
                    $db_user_lang= $row['lang'];
                } 
                if (password_verify($password, $db_user_password)) {
                    $_SESSION['id'] = $db_user_id;
                    $_SESSION['username'] = $db_username;
                    $_SESSION['fname'] = $db_user_fname;
                    $_SESSION['lname'] = $db_user_ltname;
                    $_SESSION['lang'] = $db_user_lang;
                    $_SESSION['sex'] = $db_user_sex;
                    $_SESSION['dob'] = $db_user_birthday;
                    $_SESSION['email'] = $db_user_email;
                    header("Location: index.php");
                    die();
                } else {
                    $validation['username'] = 'Username or password is incorrect.';
                    $validation['password'] = 'Username or password is incorrect.';
                }
            }
        }
    } else {
        $validation['username'] = 'Username field is required.';
    }

}
?>



    <body>
    <?php include_once 'includes/nav.php' ?>
        <h1>LOGIN</h1>
       <form method="POST">
        <div class=" box flex-element">
            
            <div>
                <label> Username or E-mail Address </label>
                <input type="text" name="username" value="<?= isset($username) ? $username : '' ?>" />
                <?php
                    if (isset($validation) && isset($validation['username'])) {
                ?>
                <span><?= $validation['username'] ?></span>
                <?php
                    }
                ?>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?= isset($password) ? $password : '' ?>" />
                <?php
                    if (isset($validation) && isset($validation['password'])) {
                ?>
                <span><?= $validation['password'] ?></span>
                <?php
                    }
                ?>
            </div>
            <button class="glow-on-hover" type="submit" > Log in</button>
        </div>
        </form>
    </body>
</html>
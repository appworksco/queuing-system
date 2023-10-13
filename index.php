<?php 
    include realpath(__DIR__ . '/includes/layout/header.php');
    include realpath(__DIR__ . '/models/users-facade.php');
  
    $usersFacade = new UsersFacade; 
    
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        if (empty($username)) {
            array_push($invalid, 'Username should not be empty!');
        } if (empty($password)) {
            array_push($invalid, 'Password should not be empty!');
        } else {
            $verifyUsernameAndPassword = $usersFacade->verifyUsernameAndPassword($username, $password);
            $login = $usersFacade->login($username, $password);
            if ($verifyUsernameAndPassword > 0) {
                while ($row = $login->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['user_type'] == 0) {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['full_name'] = $row['full_name'];
                        header('Location: admin/index.php');
                    } else {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['full_name'] = $row['full_name'];
                        header('Location: index.php');
                    }
                }
            } else {
                array_push($invalid, "Incorrect username or password!");
            }
        }
    }
?>
    
<style>
    body {
        opacity: 1;
        background-image: radial-gradient(#cdd9e7 1.05px, #e5e5f7 1.05px);
        background-size: 21px 21px;
    }
    .container {
        height: 100vh;
    }
</style>

<div class="form-wrapper">
    <main class="form">
        <form action="index.php" method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
            <?php include('errors.php'); ?>
            <div class="form-floating">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mb-4" type="submit" name="login">Sign in</button>
            <small>Powered By: Appworks Co.</small>
        </form>
    </main>
</div>

<?php include realpath(__DIR__ . '/includes/layout/footer.php') ?>
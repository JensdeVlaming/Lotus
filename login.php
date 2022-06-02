<?php 
include_once 'header.php';
?>

    <section class='login-form'> 
        <h2>Login</h2>
        <div class="login-form-form">
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="password" placeholder="Password..."> 
            <button type="submit" name="submit">Log in</button>
        </form>
        </div>

        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo"<p>Fill in all fields!</p>";
                } else if ($_GET["error"] == "wronglogin") {
                    echo"<p>Incorrect login credentials!</p>";
                }
            }
        ?>


    </section>

<?php 
include_once 'footer.php';
?>
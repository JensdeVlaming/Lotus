<?php 
include_once 'header.php';
?>

    <section class='signup-form'> 
        <h2>Sign Up</h2>
        <div class="signup-form-form">
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="password" placeholder="Password..."> 
            <input type="password" name="pwdrepeat" placeholder="Repeat password...">
            <button type="submit" name="submit">Sign Up</button>
        </form>
        </div>

        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo"<p>Fill in all fields!</p>";
                } else if ($_GET["error"] == "none") {
                    echo"<p>You have signed up!</p>";
                } 

                //Create more errors mentions above
            }
        ?>


    </section>




<?php 
include_once 'footer.php';
?>
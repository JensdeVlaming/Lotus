<?php 
    include_once 'header.php';
?>

    <?php 
        $embed = "&t=&z=13&ie=UTF8&iwloc=&output=embed";
        if(isset($_POST['requests'])) {
            header("location: ../client/opdrg.home.php"); }

        if(isset($_POST['newReq'])) {
            header("location: ../client/newReq.php");
        }
    ?>

    <section class="container text-center">
        <form method="POST">
            <input type="submit" class="btn btn-outline-primary btn-lg" name="requests" value="Jouw opdrachten">
            <input type="submit" class="btn btn-outline-dark btn-lg" name="newReq" value="Nieuwe opdrachten">
        </form>
        <hr class="dropdown-divider">

    </section>

    <section class='container cards'>
        <?php 
            require_once "getAllYourRequests.php"
        ?>
    </section>

<?php 
    include_once 'footer.php';
?>
<?php 
    include_once 'header.php';
?>

    <section class="details">
        <div class="container border shadow-lg rounded-3" style="width: 50%;">
            <div class="det-req">
                
                    <?php 
                        require_once "GetReqDet.php"
                    ?>
            </div>
        </div>
    </section>

<?php 
    include_once 'footer.php';
?>
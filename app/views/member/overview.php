<section>
    <div class="card justify-content-center" style="width: 30rem; ">
        <div class="row m-2 ">
            <div class="col-md-3">
                <?php foreach ($data as $item) { ?>
                    <div class="card-det">
                        <h3><?php echo "" . $item["playTime"] . "" ?></h3>
                        <h4><?php echo "" . $item['playDate'] . "" ?></h4>
                        <h4><?php echo "" . $item['playGround'] . "" ?></h4>
                    </div>
            </div>

            <div class="col-md-9">
                <div class="card-map">
                    <div id="map-container-google-1" class="z-depth-1-half map-container">
                        <iframe src="https://maps.google.com/maps?q= <?php echo "" . $item['playGround'] . "" ?> &t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="card-registration text-center col-md-9">
                    <button class="button">Inschrijven </button>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>
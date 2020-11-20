<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <h1 data-aos="fade-up" class="portofolio-title">Portofolio <?= $client->nama ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div data-aos="fade-up" class="carousel slide p-5" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner">


                    <?php
                    $nos = 0;
                    foreach ($gambar as $carosel) { ?>
                        <div class="carousel-item" id="gambar<?= $nos ?>">
                            <img class="w-100 d-block" src="<?= base_url('assets/img/upload/client/' . $carosel->file) ?>" alt="Slide Image">
                        </div>
                    <?php
                        $nos++;
                    } ?>
                    
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">

                <?php
                $no = 0;
                foreach ($gambar as $indicator) { ?>
                    <li data-target="#carousel-1" data-slide-to="<?= $no ?>"></li>
                <?php $no++;
                } ?>

            </ol>
        </div>
    </div>
    <div class="row text-center " data-aos="fade-up">
                        <div class="col-12">
                            <h1 class="portofolio-title" data-aos="fade-up"><?= $client->nama ?></h1>
                        </div>
                        <div class="col-12">
                            <p data-aos="fade-up"><?= $client->deskripsi ?></p>
                        </div>
                    </div>
</div>
</div>
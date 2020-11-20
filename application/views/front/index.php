<div class="block-pad" style="overflow-x: hidden;">
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-md-6 d-xl-flex align-items-xl-center">
                <div>
                    <h1 data-aos="fade-right" class="home-title title-green">TIME TO UPGRADE THE SYSTEM</h1>
                    <p data-aos="fade-right" class="home-content-text">Kami membantu anda membuat aplikasi yang anda butuhkan untuk menunjang bisnis anda, Kami memberikan Ide-ide dalam pembuatan aplikasi demi tercapainya kebutuhan untuk hasil yang optimal .<br><br><a class="btn text-center content-btn" role="button"><i class="icon ion-arrow-down-b"></i>&nbsp; Selengkapnya</a></p>
                </div>
            </div>
            <div data-aos="fade-left" class="col-md-6 d-xl-flex justify-content-xl-center align-items-xl-center"><img class="img-fluid" src="<?= base_url('assets/front') ?>/img/8487.jpg"></div>
        </div>
    </div>
</div>

<?php foreach ($content as $content) { ?>

    <?php if ($content->nama == 'Services') { ?>

        <div data-aos="fade-up" id="services">
            <div class="features-boxed home-bg-dark">
                <div class="container">
                    <div class="intro">
                        <h2 data-aos="fade-up" class="text-center"><?= $content->nama ?></h2>
                        <div data-aos="fade-up" class="text-center">
                            <?= $content->isi ?>
                        </div>
                    </div>
                    <div class="row justify-content-center features">

                        <?php $delay = 0;
                        foreach ($services as $services) { ?>
                            <div data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="col-sm-6 col-md-5 col-lg-4 item">
                                <div class="box">
                                    <i data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="fa fa-<?= $services->icon ?> icon"></i>
                                    <h3 data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="name"><?= $services->judul ?></h3>
                                    <p data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="description"><?= $services->deskripsi ?></p>
                                </div>
                            </div>
                        <?php $delay = $delay + 50;
                        } ?>

                    </div>
                </div>
            </div>
        </div>

    <?php } else if ($content->nama == 'Team') { ?>
        <div id="team" data-aos="fade-up">
            <div class="team-grid">
                <div class="container">
                    <div class="intro">
                        <h2 class="text-center"><?= $content->nama ?></h2>
                        <div class="text-center">
                            <?= $content->isi ?>
                        </div>
                    </div>
                    <div class="row people">

                        <?php $delay = 50;
                        foreach ($team as $team) { ?>
                            <div class="col-md-4 col-lg-3 item" data-aos-delay="<?= $delay ?>" data-aos="fade-up">
                                <div class="box" style="background-image:url(<?= base_url('assets/img/upload/team/thumbs/cropped/' . $team->gambar) ?>)">
                                    <div class="cover">
                                        <h3 class="name"><?= $team->nama ?></h3>
                                        <p class="title"><?= $team->tugas ?> </p>
                                        <div class="social">
                                            <a href="callto:<?= $team->telp ?>"><i class="icon ion-ios-telephone"></i></a>
                                            <a href="http://wa.me/<?= $team->wa ?>"><i class="icon ion-social-whatsapp"></i></a>
                                            <a href="mailto:<?= $team->email ?>"><i class="icon ion-android-mail"></i></a>
                                            <a href="http://instagram.com/<?= $team->ig ?>"><i class="fa fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $delay = $delay + 50;
                        } ?>

                    </div>
                </div>
            </div>
        </div>

    <?php } else if ($content->nama == 'Testimoni') { ?>
        <div id="testimoni" data-aos="fade-up">
            <div class="testimonials-clean home-bg-dark ">
                <div class="container " >
                    <div class="intro">
                        <h2 data-aos="fade-up" class="text-center"><?= $content->nama ?> </h2>
                        <div class="text-center">
                            <?= $content->isi ?>
                        </div>
                    </div>
                    <div class="row people d-flex justify-content-center">

                        <?php $delay = 0;
                        foreach ($testimoni as $testimoni) { ?>
                            <div class="col-md-6 col-lg-4 item">
                                <div data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="box">
                                    <p class="description"><?= $testimoni->isi ?></p>
                                </div>
                                <div data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="author"><img class="rounded-circle" src="<?= base_url('assets/img/upload/testimoni/thumbs/cropped/' . $testimoni->foto) ?>">
                                    <h5 data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="name"><?= $testimoni->nama ?></h5>
                                    <p data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="title"><?= $testimoni->lembaga ?></p>
                                </div>
                            </div>
                        <?php $delay = $delay + 50;
                        } ?>

                    </div>
                </div>
            </div>
            <div class="photo-gallery">
                <div class="container">
                    <div class="intro">
                        <h2 data-aos="fade-up" class="text-center">Portofolio</h2>
                    </div>
                    <div class="row photos d-flex justify-content-center">
                        <?php $cdelay = 0;
                        foreach ($client as $clientz) { ?>
                            <div data-aos="fade-up" data-aos-delay="<?= $cdelay ?>" class="col-sm-6 col-md-4 col-lg-3 item text-center">
                                <a href="<?= base_url('portofolio/detail/' . $clientz->id) ?>">
                                    <!-- <a data-lightbox="photos" href="<?= base_url('assets/img/upload/client/' . $clientz->gambar) ?>"> -->
                                    <img class="img-fluid m-2" src="<?= base_url('assets/img/upload/client/thumbs/' . $clientz->gambar) ?>">

                                </a>
                                <p><?= $clientz->lembaga ?></p>
                            </div>
                        <?php $cdelay = $cdelay + 50;
                        } ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="brands">

            <a>
                <?php $delay = 0;
                foreach ($client as $clients) { ?>
                    <img data-aos="fade-up" data-aos-delay="<?= $delay ?>" href="<?= base_url('portofolio/detail/' . $clients->id) ?>" src="<?= base_url('assets/img/upload/client/thumbs/cropped/' . $clients->logo) ?>" width="100px">
                <?php $delay = $delay + 50;
                } ?>
            </a>

        </div>


    <?php } ?>

<?php } ?>
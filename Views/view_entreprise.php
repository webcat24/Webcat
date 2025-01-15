<?php
$title = "À Propos";
$bodyClass = "about-page"; // Classe pour le body
require "view_begin.php";
?>
<!-- <div class="home" id="home">
    <div class="home-content">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <video class="home-img" src="Content/img/test.mp4" autoplay muted loop playsinline></video>

                    <div class="home-details">
                        <div class="home-text">
                            <h4 class="homeSubtitle">Exprimez-vous en couleurs.</h4>
                            <h2 class="homeTitle"> Les couleurs de <br>votre art</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="https://th.bing.com/th/id/OIP.GXMvjgr-sSB8Uqqos6JNCwHaFa?rs=1&pid=ImgDetMain" alt=""
                        class="home-img">

                    <div class="home-details">
                        <div class="home-text">
                            <h4 class="homeSubtitle">Slogan different si on veut.</h4>
                            <h2 class="homeTitle">Slogan different si on veut <br> reflechir</h2>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="https://static.vecteezy.com/system/resources/previews/002/744/052/original/trendy-beautiful-gradient-color-palettes-vector.jpg"
                        alt="" class="home-img">

                    <div class="home-details">
                        <div class="home-text">
                            <h4 class="homeSubtitle">Slogan different si on veut.</h4>
                            <h2 class="homeTitle">Slogan different si on veut <br> reflechir</h2>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="https://www.johnbeckley.com/images/2017/04/Marilyn-monroe-painting-john-beckley-2017-edition.jpg"
                        alt="" class="home-img">

                    <div class="home-details">
                        <div class="home-text">
                            <h4 class="homeSubtitle">Slogan different si on veut.</h4>
                            <h2 class="homeTitle">Slogan different si on veut <br> reflechir</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div> -->
<div id="myCarousel" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Content/img/femme-monet.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Les couleurs de votre art</h5>
                <p>Pinceaux, chevalet, peinture aquarelle, à l'huile, acrylique, ...</p>
                <a href="?controller=Boutique&action="><button class="bouton2">Découvrir nos produits</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Content/img/argenteuil-monet.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Les couleurs de votre art</h5>
                <p>Pinceaux, chevalet, peinture aquarelle, à l'huile, acrylique, ...</p>
                <a href="?controller=Boutique&action="><button class="bouton2">Découvrir nos produits</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Content/img/rochers-monet.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Les couleurs de votre art</h5>
                <p>Pinceaux, chevalet, peinture aquarelle, à l'huile, acrylique, ...</p>
                <a href="?controller=Boutique&action="><button class="bouton2">Découvrir nos produits</button></a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<main>
    <section class="contained row">
        <div class="col-balance">
            <h2 class="section-title ff-damion espace">À Propos de nous</h2>

            <span class="fc-primary fs-h2">
                WebCat Cooperation
            </span>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, quaerat iusto expedita corporis
                esse repellendus laboriosam suscipit. Cupiditate enim repellendus porro nam? Repudiandae doloribus
                dicta vero maiores labore dolore voluptatem.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus nisi tenetur corporis minus sint
                voluptates molestias dolore quisquam nihil illo consequatur id ea similique nesciunt suscipit, ipsum
                reprehenderit eligendi atque?
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio sunt debitis veniam et esse magnam
                obcaecati asperiores nam omnis harum molestias ullam nulla quas suscipit distinctio illum, quasi
                neque laudantium?


            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptas quia, enim a odio eligendi
                quasi culpa qui nulla dolores, porro nisi! Aut facilis illum facere ex laudantium accusamus unde.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt quas doloribus maiores magni
                voluptas minus ad quaerat autem reiciendis sunt alias eius sint, deserunt adipisci dolore fugiat
                soluta nobis! Blanditiis.

            </p>
        </div>
        <div class="col-balance">
            <div class="sticky-img-dual">
                <img src="Content/img/arbre.avif" alt="" class="caher">
                <!-- <img src="Content/img/arbre.avif" alt="" class="blob"> -->
                <img src="Content/img/er.jfif" alt="">
            </div>
        </div>
        <div class="sticky-img-dual-spacer"></div>



        <div class="col-balance ordi">
            <div class="sticky-img-dual">
                <img src="Content/img/arb.avif" alt="">
                <!-- <img src="Content/img/arb.avif" alt="" class="blob"> -->
                <img src="Content/img/R.jfif" alt="" class="caher">
            </div>
        </div>
        <div class="col-balance">
            <span class="fc-primary fs-h2">
                Notre Mission
            </span>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi harum soluta aperiam ipsum vitae
                debitis, placeat nam saepe tempore laborum cum? Accusantium suscipit labore delectus corrupti quis
                porro necessitatibus quae?
            </p>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero facere, et consectetur error qui
                debitis ex, minus, deserunt eveniet quasi esse? Suscipit, dolor qui! Dignissimos fugiat dolorum
                recusandae nostrum excepturi.
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis voluptas asperiores quasi quam
                rem inventore pariatur suscipit! Ex maiores laborum est necessitatibus, rem, doloremque quidem
                aperiam magnam quis nihil ducimus?
            </p>

        </div>
        <div class="sticky-img-dual-spacer"></div>

        <div class="col-balance">
            <span class="fc-primary fs-h2">
                Nos Valeurs
            </span>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem earum perferendis aliquam. Quod,
                commodi eum. Inventore, illum odio commodi natus facilis culpa qui pariatur harum ex nam iure.
                Voluptatum, explicabo.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam corrupti atque natus odio libero,
                veritatis aspernatur necessitatibus aliquid nesciunt! Quasi molestiae sed laboriosam accusamus rem
                non natus repellendus commodi saepe.
            </p>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id sint aliquid nesciunt quam ex natus
                fuga nihil unde eos culpa! Debitis, incidunt perferendis autem magnam tenetur maxime. Suscipit,
                atque similique.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, sunt porro recusandae quod provident
                ab nesciunt praesentium voluptate aut excepturi ratione quisquam! Deleniti in nemo suscipit incidunt
                neque aspernatur voluptates?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus possimus minima et ab voluptate
                amet eligendi. Esse nesciunt reiciendis optio iusto eaque architecto, quia iste dignissimos est ipsa
                iure accusantium!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi illo corrupti cumque,
                reprehenderit illum sapiente facilis nemo nulla beatae quos eum asperiores exercitationem nobis
                suscipit ex ipsa. Repellendus, officiis voluptatibus.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, sunt porro recusandae quod provident
                ab nesciunt praesentium voluptate aut excepturi ratione quisquam! Deleniti in nemo suscipit incidunt
                neque aspernatur voluptates?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus possimus minima et ab voluptate
                amet eligendi. Esse nesciunt reiciendis optio iusto eaque architecto, quia iste dignissimos est ipsa
                iure accusantium!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi illo corrupti cumque,
                reprehenderit illum sapiente facilis nemo nulla beatae quos eum asperiores exercitationem nobis
                suscipit ex ipsa. Repellendus, officiis voluptatibus.
            </p>
        </div>
        <div class="col-balance">
            <div class="sticky-img-dual">
                <img src="Content/img/er.jfif" alt="">
                <!-- <img src="Content/img/arbr.avif" alt="" class="blob"> -->
                <img src="Content/img/arbr.avif" alt="" class="caher">
            </div>
        </div>
        <div class="sticky-img-dual-spacer"></div>

    </section>

</main>

<!-- Debut du FOOTER -->

<!-- Fin du FOOTER -->
<?php require "view_end.php"; ?>
<div id="content">
    <main role="main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active carousel-height" style="background-image: url('view/assets/images/Sony_PlayStation/main.jpeg');background-repeat: no-repeat; background-size: contain; background-position: right ">
                    <div class="container">
                        <div class="carousel-caption text-left madison-text">
                            <h1> Sony PlayStation </h1>
                            <h1>€ 229.00</h1>
                            <p><a class="btn btn-lg btn-primary" href="index.php?op=read&id=2750057115988" role="button">Kopen</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-height" style="background-image: url('view/assets/images/Samsung_Gear/main.jpg');background-repeat: no-repeat; background-size: contain; background-position: right">
                    <div class="container">
                        <div class="carousel-caption text-left madison-text ">
                            <h1> Samsung Gear </h1>
                            <h1>€ 378,65</h1>
                            <p><a class="btn btn-lg btn-primary" href="index.php?op=read&id=2750057115988" role="button">Lees Meer</a></p>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                
                   <?php echo $item  ?>
                </div>
            </div>
    </main>
    </body>
</div>
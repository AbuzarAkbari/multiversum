<div id="content">
    <main role="main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active carousel-height" style="background-image: url('view/assets/images/Sony_PlayStation/main.jpeg');background-repeat: no-repeat; background-size: contain; background-position: right ">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1> headline.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Kopen</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-height" style="background-image: url('view/assets/images/Samsung_Gear/main.jpg');background-repeat: no-repeat; background-size: contain; background-position: right">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1> headline.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Kopen</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-height" style="background-image: url('view/assets/images/Oculus_rift/main.jpeg');background-repeat: no-repeat; background-size: contain; background-position: right">
                    <div class="container">
                        <div class="carousel-caption text-right">
                            <h1> headline.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Kopen</a></p>
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
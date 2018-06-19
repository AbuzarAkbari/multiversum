<div id="content" class="container">
    <div class="row">

        <!-- /.col-lg-3 -->

        <div class="col-lg-12">
            <div class="row my-5">
                <?php
                    echo $result;
                ?>
            </div>
            <div class="">
                <ul class="pagination">
                    <?php



                    if (empty($pages)==FAlSE){
                        for ($i = 0; $i < $pages; $i++) {
                            $get = array_merge($_GET, []);
                            $get["page"] = $i;
                            $get = http_build_query($get);
                            echo "<li class='page-item'><a class='page-link'href='index.php?$get'>" . ($i + 1) . "</a></li>";
                        }
                    }else{
                       echo "<a href='index.php?op=allProducts' class='btn madison mx-auto text-white'>Toon Alle producten</a>";
                    }



                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>

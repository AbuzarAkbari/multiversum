<div id="content" class="container">
  <div class="row">

    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

 

    <div class="row my-5">
    <?php
        echo $table;   
    ?>
    </div>

        <?php if(isset($pages)): ?>
            <nav aria-label="Page navigation example">

            <ul class="pagination">
        <?php for($i = 1; $i <= $pages; $i++):
            $params = array_merge($_GET, array("page" => "$i", "per-page" => "$perPage"));
            $new_query_string = http_build_query($params);
        ?>
            <li class="page-item <?php if($page == $i) { echo 'active'; } ?>"><a class="page-link" href="?<?php echo $new_query_string ?>">  <?php echo $i ?></a></li>

        <?php endfor; ?>


            </ul>
            </nav>
        <?php endif; ?>

        </div>

      </div>

    </div>

  </div>

</div>


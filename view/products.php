<div class="container">
    <div class="jumbotron">
        <?php
        require 'header.php';
        ?>
        <form action="" method="get">
            <div class="row">
                <div class="input-group my-3 col-6">
                    <input type="text" class="form-control" name="q">
                    <input type="Submit" value="Search" class="btn btn-secondary"> 
                </div>
                <div class="col-3"></div>
                <div class="col-3">
                    <a href='/stardunks/index.php?op=create' class='btn btn-primary mt-3 col-12'>Create new product</a>
                </div>
            </div>
            <input type="hidden" name="op" value="search">
        </form>
    </div>
    
    <?php
    echo $table;
    
    // if(!isset($total) || $total == "0") {
    //     echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    //                 <strong>NO RESULTS!</strong>.
    //                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //                 <span aria-hidden='true'>&times;</span>
    //                 </button>
    //             </div>" ;
    // }
    ?>
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
    <?php
    require 'footer.php';
    ?>
</div>

<script src="assets/script.js"></script>

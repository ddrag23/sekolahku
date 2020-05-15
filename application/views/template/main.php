<?php
include "header.php";
include "navbar.php";
?>
 <div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                   <?= $page; ?>
                </h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                 </div>
            </div>
        </div>
            <div class="clearfix"></div>
                        <!-- content starts here -->
                 <?php
                if (!empty($src)) {
                    include "application/views/" . $src . ".php";
                }
                ?>
                        <!-- content ends here -->
    </div>
 </div>
<?php
include "footer.php";
?>

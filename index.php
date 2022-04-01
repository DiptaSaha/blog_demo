<?php include "include/header.php"?>
    <!-- :::::::::: Header Section Start :::::::: -->
    <?php include "include/navber.php"?>
    <!-- ::::::::::: Header Section End ::::::::: -->

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Blog</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Posts Start -->
                <div class="col-md-8">

                    <?php 
                    $sql="SELECT * FROM post ORDER BY post_id DESC";
                    $allPost= mysqli_query($connect,$sql);
                    while ($row= mysqli_fetch_assoc($allPost)) {
                        $post_id            = $row['post_id'];
                        $post_title         = $row['post_title'];
                        $post_description   = $row['post_description'];
                        $post_author        = $row['post_author'];
                        $post_thumb         = $row['post_thumb'];
                        $post_category      = $row['post_category'];
                        $post_tags          = $row['post_tags'];
                        $post_date          = $row['post_date'];?>
                 
                 
                         <!-- Single Item Blog Post Start -->
                        <div class="blog-post">
                            <!-- Blog Banner Image -->
                            <div class="blog-banner">
                                <a href="single.php?id=<?php echo $post_id;?>">
                                    <img src="admin/img/post-thumbnail/<?php echo $post_thumb; ?>">
                                    <!-- Post Category Names -->
                                    <div class="blog-category-name">
                                         <?php
                                             $query ="SELECT * FROM category WHERE cat_id='$post_category'";
                                             $allCategory=mysqli_query($connect,$query);
                                             while ($row=mysqli_fetch_assoc($allCategory)) {
                                                $cat_id=$row['cat_id'];
                                                $cat_name=$row['cat_name'];?>
                                                 <h6>
                                                    <?php echo $cat_name;?>
                                                </h6>
                                             <?php }
                                             
                                         ?>
                                       
                                    </div>
                                </a>
                            </div>
                            <!-- Blog Title and Description -->
                            <div class="blog-description">
                                <a href="single.php?id=<?php echo $post_id;?>">
                                    <h3 class="post-title"><?php echo  $post_title; ?></h3>
                                </a>
                                <p><?php echo substr($post_description, 0,150).'. . . .' ?></p>
                                <!-- Blog Info, Date and Author -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="blog-info">
                                            <ul>
                                                <li><i class="fa fa-calendar"></i><?php echo $post_date;?></li>
                                                <li><i class="fa fa-user"></i><?php echo $post_author?></li>
                                                <li><i class="fa fa-heart"></i>(50)</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4 read-more-btn">
                                        <a href="single.php?id=<?php echo $post_id;?>">
                                        <button type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Single Item Blog Post End -->
                 
                 <?php   }
                    
                    ?>



                   


                  


                    <!-- Blog Paginetion Design Start -->
                    <div class="paginetion">
                        <ul>
                            <!-- Next Button -->
                            <li class="blog-prev">
                                <a href=""><i class="fa fa-long-arrow-left"></i>  Previous</a>
                            </li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li class="active"><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href="">5</a></li>
                            <!-- Previous Button -->
                            <li class="blog-next">
                                <a href=""> Next <i class="fa fa-long-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Blog Paginetion Design End -->               
                </div>



                <!-- Blog Right Sidebar -->
                <?php include "include/sideber.php"?>
                <!-- Right Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    



    <!-- :::::::::: Footer Buy Now Section Start :::::::: -->
  <?php include "include/footer.php"?>
<div class="col-md-4">

        <!-- Latest News -->
        <div class="widget">
            <h4>Latest News</h4>
            <div class="title-border"></div>
            
            <!-- Sidebar Latest News Slider Start -->
            <div class="sidebar-latest-news owl-carousel owl-theme">
                <!-- First Latest News Start -->
                <?php
                        $query="SELECT * FROM post ORDER BY post_id DESC LIMIT 3 ";
                        $singlePost=mysqli_query($connect,$query);
                        while ($row= mysqli_fetch_assoc($singlePost)) {
                            $post_id            = $row['post_id'];
                            $post_title         = $row['post_title'];
                            $post_description   = $row['post_description'];
                            $post_author        = $row['post_author'];
                            $post_thumb         = $row['post_thumb'];
                            $post_category      = $row['post_category'];
                            $post_tags          = $row['post_tags'];
                            $post_date          = $row['post_date'];?>
                        
                        <div class="item">
                                <div class="latest-news">
                                    <!-- Latest News Slider Image -->
                                    <div class="latest-news-image">
                                        <a href="single.php?id=<?php echo $post_id;?>">
                                        <img src="admin/img/post-thumbnail/<?php echo $post_thumb;?>">
                                        </a>
                                    </div>
                                    <!-- Latest News Slider Heading -->
                                    <h5><?php echo $post_title ?></h5>
                                    <!-- Latest News Slider Paragraph -->
                                    <p><?php echo substr($post_description, 0,75) ?></p>
                                </div>
                            </div>

                            
                        <?php
                        }?>
                
                <!-- First Latest News End -->
                
            </div>
            <!-- Sidebar Latest News Slider End -->
        </div>


        <!-- Search Bar Start -->
        <div class="widget"> 
                <!-- Search Bar -->
                <h4>Blog Search</h4>
                <div class="title-border"></div>
                <div class="search-bar">
                    <!-- Search Form Start -->
                    <form action="search.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input" required="required">
                        <input type="submit" name="searchBtn" value="Search" class="btn_main float-right">
                        </div>
                    </form>
                    <!-- Search Form End -->
                </div>
        </div>
        <!-- Search Bar End -->

        <!-- Recent Post -->
        <div class="widget">
            <h4>Recent Posts</h4>
            <div class="title-border"></div>
            <div class="recent-post">
                <!-- Recent Post Item Content Start -->
                <?php
                        $query="SELECT * FROM post ORDER BY post_id DESC LIMIT 5 ";
                        $singlePost=mysqli_query($connect,$query);
                        while ($row= mysqli_fetch_assoc($singlePost)) {
                            $post_id            = $row['post_id'];
                            $post_title         = $row['post_title'];
                            $post_description   = $row['post_description'];
                            $post_author        = $row['post_author'];
                            $post_thumb         = $row['post_thumb'];
                            $post_category      = $row['post_category'];
                            $post_tags          = $row['post_tags'];
                            $post_date          = $row['post_date'];?>



                    <div class="recent-post-item">
                                <div class="row">
                                    <!-- Item Image -->
                                    <div class="col-md-4">
                                    <a href="single.php?id=<?php echo $post_id;?>">
                                        <img src="admin/img/post-thumbnail/<?php echo $post_thumb;?>">
                                        </a>
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 no-padding">
                                    <a href="single.php?id=<?php echo $post_id;?>">
                                    <h5><?php echo $post_title ?></h5>
                                    </a>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i><?php echo $post_date ?></li>
                                            <?php
                                             $sqlcmtcount= "SELECT * FROM comments WHERE post_id= $post_id AND cmt_status=1 ";
                                             $postIdByComments=mysqli_query($connect,$sqlcmtcount);
                                             $commentsCount= mysqli_num_rows($postIdByComments);
                                            ?>
                                            <li><i class="fa fa-comment-o"></i><?php echo $commentsCount;?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>           

            

                <!-- Recent Post Item Content End -->

            </div>
        </div>

        <!-- All Category -->
        <div class="widget">
            <h4>Blog Categories</h4>
            <div class="title-border"></div>
            <!-- Blog Category Start -->
            <div class="blog-categories">
                <ul>
                    <!-- Category Item -->
                    <?php 
                    $query="SELECT * FROM category ORDER BY cat_name ASC";
                    $allCat=mysqli_query($connect,$query);
                    while ($row= mysqli_fetch_assoc($allCat)) {
                    $cat_id= $row['cat_id'];
                    $cat_name= $row['cat_name'];
                    
                    $queryPost="SELECT * FROM post WHERE post_category ='$cat_id'";
                    $allPost=mysqli_query($connect,$queryPost);
                    $total_post=mysqli_num_rows($allPost);
                    
                    ?>

                    <li>
                        <a href="category.php?id=<?php echo $cat_id;?>">
                        <i class="fa fa-check"></i>
                        <?php echo $cat_name;?>
                        <span>[<?php echo  $total_post;?>]</span>
                    
                        </a>
                        
                    </li>
                <?php }
                    ?>
                    
                
                </ul>
            </div>
            <!-- Blog Category End -->
        </div>

        <!-- Recent Comments -->
        <div class="widget">
            <h4>Recent Comments</h4>
            <div class="title-border"></div>
            <div class="recent-comments">
                
                <!-- Recent Comments Item Start -->
                <div class="recent-comments-item">
                <?php 
                  $sql= "SELECT * FROM comments WHERE cmt_status=1 ORDER BY id DESC LIMIT 4";
                  $postIdByComments=mysqli_query($connect,$sql);
                  while ($row=mysqli_fetch_assoc($postIdByComments)) {
                    $id                 = $row['id'] ;
                    $post_id            = $row['post_id'];
                    $cmt_status         = $row['cmt_status'] ;
                    $cmt_date           = $row['cmt_date'] ;
                    
                    $sqlForPost="SELECT * FROM post WHERE post_id ='$post_id'";
                    $postShow=mysqli_query($connect,$sqlForPost);
                    while ($row=mysqli_fetch_assoc($postShow)) {
                            $post_id=$row['post_id'];
                            $post_title= $row['post_title'];?>

                            <div class="row">
                                <!-- Comments Thumbnails -->
                                <div class="col-md-4">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <!-- Comments Content -->
                                <div class="col-md-8 no-padding">
                                    <h5><?php echo $post_title; ?></h5>
                                    <!-- Comments Date -->
                                    <ul>
                                        <li>
                                            <i class="fa fa-clock-o"></i><?php echo $cmt_date ;?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                  <?php  }
                  }
                  ?>
                   
                </div>
                <!-- Recent Comments Item End -->
            </div>
        </div>

        <!-- Meta Tag -->
        <div class="widget">
            <h4>Tags</h4>
            <div class="title-border"></div>
            <?php
                        $query="SELECT * FROM post ORDER BY post_id DESC";
                        $singlePost=mysqli_query($connect,$query);
                        while ($row= mysqli_fetch_assoc($singlePost)) {
                            $post_id            = $row['post_id'];
                            $post_tags          = $row['post_tags'];
                            ?>
                        <div class="meta-tags">
                                <span style=" width: 100px; text-align:center;"><?php echo $post_tags; ?></span>
                                    
                        </div>
                <?php
                    }?>
            <!-- Meta Tag List Start -->

            
            <!-- Meta Tag List End -->
        </div>

</div>
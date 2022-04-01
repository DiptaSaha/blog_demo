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
                    <h2 class="page-title">Single Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="">Blog <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Single Right Sidebar</li>
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
                <!-- Blog Single Posts -->
                <div class="col-md-8">
                    <?php
                            if (isset($_GET['id'])) {
                               $thePostId = $_GET['id'];
                                $query="SELECT * FROM post WHERE post_id ='$thePostId'";
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

                                    <div class="blog-single">
                                                <!-- Blog Title -->
                            
                                         <h3 class="post-title"><?php echo $post_title?></h3>
                                                    

                                            <!-- Blog Categories -->
                                            <div class="single-categories">
                                                <?php 
                                                $query ="SELECT * FROM category WHERE cat_id='$post_category'";
                                                $allCategory=mysqli_query($connect,$query);
                                                while ($row=mysqli_fetch_assoc($allCategory)) {
                                                    $cat_id=$row['cat_id'];
                                                    $cat_name=$row['cat_name'];?>
                                                    <span><?php echo $cat_name ?></span>
                                            <?php }?>
                                            </div>
                                        
                                            <!-- Blog Thumbnail Image Start -->
                                            <div class="blog-banner">
                                                
                                                    <img src="admin/img/post-thumbnail/<?php echo $post_thumb;?>">
                                            
                                            </div>
                                            <!-- Blog Thumbnail Image End -->

                                            <!-- Blog Description Start -->
                                            <p><?php echo $post_description;?></p>

                                            <!-- <div class="blog-description-quote">
                                                <p><i class="fa fa-quote-left"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<i class="fa fa-quote-right"></i></p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est eserunt mollit anim id labor laborumlabor laborum est.
                                            </p> -->
                                            <!-- Blog Description End -->
                                    </div>

                       <?php }  }

                         ?>
                  

                  <?php 
                  $sql= "SELECT * FROM comments WHERE post_id= $post_id AND cmt_status=1 ORDER BY id DESC ";
                  $postIdByComments=mysqli_query($connect,$sql);
                  $commentsCount= mysqli_num_rows($postIdByComments);
                  ?>
                  

                    <!-- Single Comment Section Start -->
                    <div class="single-comments">
                        <!-- Comment Heading Start -->
                        <div class="row">
                            <div class="col-md-12">
                                <h4>All Latest Comments (<?php echo  $commentsCount;?>)</h4>
                                <div class="title-border"></div>
                                <p>Read EveryOne Opinion Below.</p>
                            </div>
                        </div>
                    </div>
                        <!-- Comment Heading End -->
                        <?php
                        if (empty($commentsCount)) {
                           echo '<div class="alert alert-warning text_center"> NO Comments Found.</div>';
                        }
                        else {
                            while ($row=mysqli_fetch_assoc($postIdByComments)) {
                                $id                 = $row['id'] ;
                                $post_id            = $row['post_id'] ;
                                $post_auther        = $row['post_auther'] ;
                                $post_auther_email  = $row['post_auther_email'] ;
                                $cmt_desc           = $row['cmt_desc'] ;
                                $cmt_status         = $row['cmt_status'] ;
                                $cmt_date           = $row['cmt_date'] ;?>
                              
                            <!-- Single Comment Post Start -->
                           
                           
                                <div class="row each-comments">
                                    <div class="col-md-2">
                                        <!-- Commented Person Thumbnail -->
                                        <div class="comments-person">
                                            <img src="admin/img/users/avater.png">
                                        </div>
                                    </div>
    
                                    <div class="col-md-10 no-padding">
                                        <!-- Comment Box Start -->
                                        <div class="comment-box">
                                            <div class="comment-box-header">
                                                <ul>
                                                    <li class="post-by-name"><?php echo $post_auther;?></li>
                                                    <li class="post-by-hour"><?php echo $post_date;?></li>
                                                </ul>
                                            </div>
                                            <p><?php echo $cmt_desc;?></p>
                                        </div>
                                        <!-- Comment Box End -->
                                    </div>
                                </div>
                            
                             <!-- Single Comment Post End -->
                             <?php  }
                       
                       
                         
                        
                        }  
        
                          ?>
                        
                      

                    <!-- Post New Comment Section Start -->
                    <div class="post-comments">
                        <h4>Post Your Comments</h4>
                        <div class="title-border"></div>
                        <p>Please Send Your valueble Comment Here..</p>
                        <!-- Form Start -->
                        <form action="" method="POST" class="contact-form">
                            <!-- Left Side Start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- First Name Input Field -->
                                    <div class="form-group">
                                        <input type="text" name="user_name" placeholder="Your Name" class="form-input" autocomplete="off" required="required">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                </div>
                                <!-- Email Address Input Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address" class="form-input" autocomplete="off" required="required">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Left Side End -->

                            <!-- Right Side Start -->
                            <div class="row">
                                <div class="col-md-12">
                                  
                                    <!-- Comments Textarea Field -->
                                    <div class="form-group">
                                        <textarea name="cmt_desc" class="form-input" placeholder="Your Comments Here..."></textarea>
                                        <i class="fa fa-pencil-square-o"></i>
                                    </div>
                                    <!-- Post Comment Button -->
                                    <input type="submit" value="Post Your Comments" class="btn-main" name="addComment">
                                   
                                </div>
                            </div>
                            <!-- Right Side End -->
                        </form>
                        <!-- Form End -->
                        <?php
                                if (isset($_POST['addComment'])) {
                                $userName=mysqli_real_escape_string($connect,$_POST['user_name']);
                                $email=mysqli_real_escape_string($connect,$_POST['email']);
                                $cmt_desc=mysqli_real_escape_string($connect,$_POST['cmt_desc']);
                                
                                $sql="INSERT INTO comments (cmt_desc,post_id,post_auther,post_auther_email,cmt_status,cmt_date) VALUES ('$cmt_desc',' $post_id',' $userName',' $email',0,now())";
                                    $addComment= mysqli_query($connect,$sql);
                                    if ($addComment) {
                                        header("Location:single.php?id=$post_id");
                                        
                                    }else {
                                        die(mysqli_error($connect));
                                    }
                                }
                            ?>

                    </div>
                    <!-- Post New Comment Section End -->              
                </div>
               



                <!-- Blog Right Sidebar -->
                <?php include "include/sideber.php"?>
                <!-- Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    



    <!-- :::::::::: Footer Buy Now Section Start :::::::: -->
    <?php include "include/footer.php"?>
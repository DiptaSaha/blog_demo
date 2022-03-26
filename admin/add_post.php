
<?php include "includes/header.php"?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Publish Another Blog Post</h1>
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Add Blog Post </h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Blog Post Added Start -->  
                                                    <form action="" method="POST"  enctype="multipart/form-data">
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-6">
                                                                    <label for="title">Post Title</label>
                                                                    <input type="text" name="post_title" class="form-control" autocomplete="off">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="author">Post Author</label>
                                                                    <input type="text" name="post_author" class="form-control" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-6">
                                                                    <label for="post_category">Post Category</label>
                                                                    <select name="post_category" class="form-control form-control-info">

                                                                    <option>--Please Select The Category--</option>
                                                                    <?php 
                                                                        $query= "SELECT * FROM category";
                                                                        $allCategory= mysqli_query($connect, $query);
                                                                        while ($row=mysqli_fetch_assoc($allCategory)) {
                                                                            
                                                                            $cat_id   = $row['cat_id'];
                                                                            $cat_name = $row['cat_name'];?>

                                                                                <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>


                                                                     <?php   }

                                                                    ?>
                                                                   
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="tags">Post Tags</label>
                                                                    <input type="text" name="post_tags" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Description</label>
                                                                <textarea name="post_desc" class="form-control" rows="5"></textarea>
                                                            </div>
                                                           
                                                            <div class="form-group">
                                                                <label >Post Thumbnail</label>
                                                                <input type="file" name="image" class="form-control-file">
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <input type="submit" name="addPost" value=" Add New Post " class="btn btn-primary btn-lg">
                                                            </div>
                                                    </form>
                                            <!-- Blog Post Added End -->  
                                        </div>
                                </div>
                            </div>
                        
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


<?php
    if (isset($_POST['addPost'])) {
               $post_title    =  $_POST['post_title'];
               $post_desc     = $_POST['post_desc'];
               $post_author   = $_POST['post_author'];
               $post_category = $_POST['post_category'];
               $post_tags     = $_POST['post_tags'];
               $location_img  = "img/post-thumbnail";

            //    Image Uplode Procces....
               $post_image           = $_FILES['image'];
               $post_image_name      = $_FILES['image']['name'];
               $post_image_size      = $_FILES['image']['size'];
               $post_image_temp      = $_FILES['image']['tmp_name'];
               $post_image_type      = $_FILES['image']['type'];
               $postAllowedExtention = array('jpg','jpge','png');
               $postExtention        = strtolower(end(explode('.',$post_image_name)));
               
               
               $formError =array();
               if (strlen($post_title)<10) {
                   $formError= 'Post Title is Too Short!!';
               }
               if (empty($post_image_name)) {
                $formError= 'Please Upload Blog Post Thumbnail!!';
               }
               if (!empty($post_image_name) && !in_array($postExtention,$postAllowedExtention)) {
                   $formError= 'Please Upload JPG, JPEG,PNG Formet.';
               }
               foreach ($formError as $error) {
                  echo '<div class="alert alert-warning">' .$error. '</div>';
               }
               if(!empty($post_image_name))
               {
                $post_image=rand(0,10000) .'_'. $post_image_name;
                move_uploaded_file($post_image_temp, "$location_img/$post_image");

                $query= "INSERT INTO post (post_title, post_description, post_author, post_thumb, post_category, post_tags, post_date) VALUES ('$post_title',' $post_desc','$post_author','$post_image','$post_category','$post_tags',now())";
                $addPost=mysqli_query($connect,$query);
                if ($addPost) {
                    header("Location:all_posts.php");
                } 
                else {
                 die("Blog POST Added Failed!".mysqli_error($connect));       
                }

               }
             
              
               

    }


?>


 <?php include "includes/footer.php"?>
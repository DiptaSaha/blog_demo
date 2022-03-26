
<?php include "includes/header.php"?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Publish Update Blog Post</h1>
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Update Blog Post </h6>
                                        </div>
                                        <div class="card-body">

                                                                <?php
                                                                    if (isset($_GET['edit'])) {
                                                                      $post_id = $_GET['edit']; 
                                                                     $query = "SELECT * FROM post WHERE post_id='$post_id'";
                                                                     $all_data_show= mysqli_query($connect,$query);
                                                                     while ($row= mysqli_fetch_assoc($all_data_show)) {
                                                                        $post_id       = $row['post_id'];
                                                                        $post_title    = $row['post_title'];
                                                                        $post_desc     = $row['post_description'];
                                                                        $post_author   = $row['post_author'];
                                                                        $post_thumb    = $row['post_thumb'];
                                                                        $post_category = $row['post_category'];
                                                                        $post_tags     = $row['post_tags']; ?>
                                                                    

                                                                       <!-- Blog Post Added Start -->  
                                                                                <form action="" method="POST"  enctype="multipart/form-data">
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-lg-6">
                                                                                                <label for="title">Post Title</label>
                                                                                                <input type="text" name="post_title" class="form-control" value="<?php echo $post_title?>" autocomplete="off">
                                                                                            </div>
                                                                                            <div class="form-group col-lg-6">
                                                                                                <label for="author">Post Author</label>
                                                                                                <input type="text" name="post_author" class="form-control" value="<?php echo $post_author?>" autocomplete="off">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-lg-6">
                                                                                                <label for="category">Post Category</label>
                                                                                                <input type="text" name="post_category" class="form-control" value="<?php echo $post_category?>"autocomplete="off" >
                                                                                            </div>
                                                                                            <div class="form-group col-lg-6">
                                                                                                <label for="tags">Post Tags</label>
                                                                                                <input type="text" name="post_tags" class="form-control" value="<?php echo $post_tags?>"autocomplete="off" >
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="description">Description</label>
                                                                                            <textarea name="post_desc" class="form-control" rows="5"><?php echo $post_desc?></textarea>
                                                                                        </div>
                                                                                    
                                                                                        <div class="form-group">
                                                                                            <label >Post Thumbnail</label>
                                                                                            <img src="img/post-thumbnail/<?php echo $post_thumb?>" alt="Post Thumbnail" width="200"  >
                                                                                            <input type="file" name="image" class="form-control-file">
                                                                                        </div>
                                                                                    
                                                                                        <div class="form-group">
                                                                                            <input type="submit" name="editPost" value=" Update Post " class="btn btn-primary btn-lg">
                                                                                        </div>
                                                                                </form>
                                                                        <!-- Blog Post Added End -->  
                                                                    
                                                                    <?php
                                                                }
                                                                    }                                                                      
                                                                ?>

                                         
                                        </div>
                                </div>
                            </div>
                        
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


<?php
    if (isset($_POST['editPost'])) {
               $post_title=  $_POST['post_title'];
               $post_desc= $_POST['post_desc'];
               $post_author= $_POST['post_author'];
               $post_image= $_FILES['image']['name'];
               $post_image_temp= $_FILES['image']['tmp_name'];
               $post_category= $_POST['post_category'];
               $post_tags= $_POST['post_tags'];
               $location_img= "img/post-thumbnail";
               move_uploaded_file($post_image_temp, "$location_img/$post_image");

               $query= "UPDATE post SET post_title='$post_title', post_description='$post_desc', post_author='$post_author', post_thumb='$post_image', post_category='$post_category', post_tags='$post_tags',post_date=now() WHERE post_id='$post_id'";

               echo $query;

               $editPost=mysqli_query($connect,$query);
               if ($editPost) {
                   header("Location: all_posts.php");
               } 
               else {
                die("Blog POST Added Failed!".mysqli_error($connect));       
            }
               

    }


?>


 <?php include "includes/footer.php"?>
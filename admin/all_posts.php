
<?php include "includes/header.php"?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Blog Post</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">All Blog Posts </h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Blog Post List Table Start -->  

                                              <div class="table-responsive"> 
                                            
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead class="table-info">
                                                            <tr>
                                                            <th scope="col">Serial</th>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Author</th>
                                                            <!-- <th scope="col">Thumbnail </th> -->
                                                            <th scope="col">Category</th>
                                                            <!-- <th scope="col">Tages</th> -->
                                                            <!-- <th scope="col">Comments Count</th> -->
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $query = "SELECT * FROM post";
                                                        $showAllPost= mysqli_query($connect, $query);
                                                        $i=0;
                                                        while ($row= mysqli_fetch_assoc($showAllPost)) {
                                                            $i++;
                                                            $post_id            = $row['post_id'];
                                                            $post_title         = $row['post_title'];
                                                            $post_description   = $row['post_description'];
                                                            $post_author        = $row['post_author'];
                                                            $post_thumb         = $row['post_thumb'];
                                                            $post_category      = $row['post_category'];
                                                            $post_tags          = $row['post_tags'];
                                                            // $post_comment_count = $row['post_comment_count'];
                                                            // $post_status        = $row['post_status'];
                                                            $post_date          = $row['post_date'];
                                                            
                                                            ?>


                                                            <tr>
                                                            <th scope="row"><?php echo $i;?></th>
                                                            <td><?php echo $post_title;?></td>
                                                            <td><?php echo $post_author;?></td>
                                                            <td><?php echo $post_category;?></td>
                                                            <td><?php echo $post_date;?></td>
                                                            <td>
                                                            <a href="" class="btn btn-outline-success"><i class="far fa-edit" title="Update"></i></a>
                                                            <a href="" class="btn btn-outline-danger"><i class="fas fa-trash-alt" title="Delete"></i></a>
                                                    
                                                            </td>
                                                            </tr>


                                                    <?php }
                                                        
                                                        ?>
                                                        
                                                        </tbody>
                                                    </table>
                                             </div>
                                           
                                            <!-- Blog Post List Table End -->  
                                        </div>
                                </div>
                            </div>
                        
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 <?php include "includes/footer.php"?>
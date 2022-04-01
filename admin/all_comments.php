
<?php include "includes/header.php"?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
            <?php
            
            if ($_SESSION['role'] == 1) {?>

                <h1 class="h3 mb-4 text-gray-800 text-center">All Post Comments</h1>
                    <?php
                    
                    $do = isset($_GET['do'])?$_GET['do']:'manage';
                    
                    if ($do =='manage') {
                       ?>


                     <div class="row">
                          <div class="col-lg-12">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"> View All Comments </h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                <th scope="col">Serial </th>
                                                <th scope="col">Post Title </th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Comments</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                                <tbody>


                                                <?php 
                                                        $sl=0;
                                                        // $sql = "SELECT * FROM comments WHERE cmt_status=0 OR cmt_status=1  ORDER BY id DESC ;";
                                                        $sql = "SELECT * FROM comments ORDER BY id DESC ;";
                                                        $allComments=mysqli_query($connect,$sql);
                                                        while ($row= mysqli_fetch_assoc($allComments)) {
                                                            $id                 = $row['id'] ;
                                                            $post_id            = $row['post_id'] ;
                                                            $post_auther        = $row['post_auther'] ;
                                                            $post_auther_email  = $row['post_auther_email'] ;
                                                            $cmt_desc           = $row['cmt_desc'] ;
                                                            $cmt_status         = $row['cmt_status'] ;
                                                            $cmt_date           = $row['cmt_date'] ;
                                                            $sl++;
                                                            ?>


                                                                <tr>
                                                                    <th scope="row"><?php echo $sl;?></th>
                                                                    <td><?php
                                                                        $sql="SELECT * FROM post WHERE post_id='$post_id'";
                                                                        $postIdByTitle=mysqli_query($connect,$sql);
                                                                        while ($row= mysqli_fetch_assoc($postIdByTitle)) {
                                                                           $post_id= $row['post_id'];
                                                                           $post_title= $row['post_title'];
                                                                           echo $post_title;
                                                                        }    

                                                                     ?></td>
                                                                    <td><?php echo $post_auther; ?></td>
                                                                    <td><?php echo $post_auther_email;?></td>
                                                                    <td><?php echo $cmt_desc;?></td>
                                                                    <td><?php
                                                                        if ($cmt_status==0) {
                                                                        echo '<span class="badge bg-warning text-white">Draft</span>'; 
                                                                    } 
                                                                    else if ($cmt_status==1) {
                                                                        echo '<span class="badge bg-success text-white">Published</span>'; 
                                                                    } 
                                                                    else if ($cmt_status==2) {
                                                                        echo '<span class="badge bg-danger text-white">Suspended</span>'; 
                                                                    } 
                                                                    ?></td>
                                                                    <td><?php echo $cmt_date;?></td>
                                                                    
                                                                    <td>
                                                                    <a href="all_comments.php?do=edit&update=<?php echo  $id ;?>" class="btn btn-outline-success"><i class="far fa-edit" title="Update"></i></a>
                                                                    <a class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal<?php echo  $id ;?>"><i class="fas fa-trash-alt" title="Delete" ></i></a>
                            
                                                                        <!-- Delete User For Modal  -->
                                                                        <div class="modal fade" id="exampleModal<?php echo  $id ;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-sm">
                                                                                    <div class="modal-content">
                                                                                            <div class="modal-header d-flex justify-content-center bg-gradient-danger">
                                                                                                <p class="heading text-white">Are you sure?</p>
                                                                                            </div>
                                                                                            <div class="modal-body text-center">
                                                                                                <h1> <i class="fas fa-times text-danger"></i></h1>
                                                                                            </div>
                                                                                        <div class="modal-footer col-md-6 offset-md-3">
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                                                                            <a href="all_comments.php?do=Delete&delete=<?php echo  $id ;?>" class="btn btn-outline-danger">YES</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    </td>                                                                      
                                                                </tr>

                                                                <?php
                                                                }
                                                            ?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                          </div>
                     </div> 
                     
                  <?php  }
                    else if ($do =='edit'){
                        if (isset($_GET['update'])) {
                           $id= $_GET['update'];

                           $query= "SELECT * FROM comments WHERE id='$id' ";
                           $updateByCommont=mysqli_query($connect,$query);

                           while ($row= mysqli_fetch_assoc($updateByCommont)) {
                               
                            $id                 = $row['id'] ;
                            $cmt_status         = $row['cmt_status'] ;     ?>
                              


                         <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">UpDate Comments Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Blog Post Added Start -->  
                                                    <form action="?do=update" method="POST"  enctype="multipart/form-data">
                                                           
                                                           
                                                            <div class="form-row">
                                                                
                                                                        <label class="col-sm-2">Comments Status</label>
                                                                        <div class="col-sm-6">
                                                                            <select name="status" class="form-control">
                                                                                <option value="0" <?php if($cmt_status==0){ echo 'selected';}?> >Draft</option>
                                                                                <option value="1" <?php if($cmt_status==1){ echo 'selected';}?>>Published</option>
                                                                                <option value="2" <?php if($cmt_status==2){ echo 'selected';}?>>Deleted</option>
                                                                             </select>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <input type="hidden" name="id" value="<?php echo $id;?>">
                                                                            <input type="submit" name="updateComment" value=" Update Comment " class="btn btn-primary btn-lg">
                                                                        </div>
                                                            </div>
                                                    </form>
                                            <!-- Blog Post Added End -->  
                                        </div>
                                </div>
                            </div>                    
                        </div>
                         <?php  }

                        }
                    }
                    else if ($do =='update'){
                       if ($_SERVER['REQUEST_METHOD'] =='POST') {
                                
                                $id          = $_POST['id'];
                                $cmt_status  = $_POST['status'];

                                    $sql="UPDATE comments SET cmt_status='$cmt_status' WHERE id= '$id'";
                                      
                                    $updateComment = mysqli_query($connect,$sql);

                                    if (!$updateComment) {
                                    die("Query Failed!".mysqli_error($connect));
                                    }
                                    else {
                                         header("Location:all_comments.php?do=manage");
                                    }
                                    }
                                    }

                    else if ($do =='Delete'){
                       if (isset($_GET['delete'])) {
                          
                             $deleteId=   $_GET['delete'];
                             $sql="UPDATE comments SET cmt_status=2 WHERE id= '$deleteId'";
                             $commentDelete=mysqli_query($connect,$sql);
                             if (!$commentDelete) {
                                die("Query Failed!".mysqli_error($connect));
                                }
                                else {
                                    header("Location:all_comments.php?do=manage");
                                }
                       }
                    }
                    }
                    ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 <?php include "includes/footer.php"?>
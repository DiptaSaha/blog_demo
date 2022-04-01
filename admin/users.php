
<?php include "includes/header.php"?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
            <?php
            
            if ($_SESSION['role'] == 1) {?>

                <h1 class="h3 mb-4 text-gray-800 text-center">User Page</h1>
                    <?php
                    
                    $do = isset($_GET['do'])?$_GET['do']:'manage';
                    
                    if ($do =='manage') {
                       ?>


                     <div class="row">
                          <div class="col-lg-12">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"> View All Users </h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                <th scope="col">Serial </th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone No.</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                                <tbody>


                                                <?php 
                                                        $sl=0;
                                                        $sql = "SELECT * FROM user;";
                                                        $allUserShow=mysqli_query($connect,$sql);
                                                        while ($row= mysqli_fetch_assoc($allUserShow)) {
                                                            $id           = $row['id'] ;
                                                            $name         = $row['name'] ;
                                                            $username     = $row['username'] ;
                                                            $email        = $row['email'] ;
                                                            $address      = $row['address'] ;
                                                            $phone        = $row['phone'] ;
                                                            $image        = $row['image'] ;
                                                            $role         = $row['role'] ;
                                                            $is_active    = $row['is_active'] ;
                                                            $join_date    = $row['join_date'] ;
                                                            $sl++;
                                                            ?>


                                                                <tr>
                                                                    <th scope="row"><?php echo $sl;?></th>
                                                                    <td>
                                                                    <?php 
                                                                        if (!empty($image)) {?>
                                                                        <img src="img/users/<?php echo $image;?>" width="50" <img src="img/users/<?php echo $image;?>" class="mb-2 rounded">
                                                                            
                                                                       <?php }
                                                                       else {?>
                                                                        <img src= "img/users/avater.png" width="50" alt="User image" class="rounded-circle "> </td>
                                                                           
                                                                      <?php }
                                                                        
                                                                        ?>
                                                                    <td><?php echo $name; ?></td>
                                                                    <td><?php echo $username; ?></td>
                                                                    <td><?php echo $email;?></td>
                                                                    <td><?php echo $phone;?></td>
                                                                    <td><?php
                                                                        if ($role==1) {
                                                                        echo '<span class="badge bg-primary text-white">Administrator</span>'; 
                                                                    } 
                                                                    else if ($role==2) {
                                                                        echo '<span class="badge bg-success text-white">Editor</span>'; 
                                                                    } 
                                                                    else {
                                                                        echo '<span class="badge bg-warning text-white">None</span>'; 
                                                                    } 
                                                                    ?></td>
                                                                    <td><?php
                                                                        if ($is_active==0) {
                                                                        echo '<span class="badge bg-danger text-white">In-Active</span>'; 
                                                                    } 
                                                                    else if ($is_active==1) {
                                                                        echo '<span class="badge bg-success text-white">Active</span>'; 
                                                                    } 
                                                                    else {
                                                                        echo '<span class="badge bg-danger text-white">None</span>'; 
                                                                    } 
                                                                    ?></td>
                                                                    
                                                                    <td>
                                                                    <a class="btn btn-outline-info" data-toggle="modal" data-target="#viewleModal<?php echo  $id ;?>"><i class="far fa-eye" title="View"></i></a>
                                                                    <a href="users.php?do=edit&update=<?php echo  $id ;?>" class="btn btn-outline-success"><i class="far fa-edit" title="Update"></i></a>
                                                                    <a class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal<?php echo  $id ;?>"><i class="fas fa-trash-alt" title="Delete" ></i></a>
                                                    

                                                                        <!-- Details User For Modal  -->
                                                                        <div class="modal fade" id="viewleModal<?php echo  $id ;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <div class="row">
                                                                                                    <div class="col-lg-5">
                                                                                                    <?php if (!empty($image)) {?>
                                                                                                            <img alt="Profile Image" class="d-block w-100" src="img/users/<?php  echo  $image;?>"> ;
                                                                                                        <?php
                                                                                                            }else {?>
                                                                                                                <img alt="Profile Image" class="d-block w-100" src="img/users/avater.png"> ;
                                                                                                        <?php
                                                                                                            
                                                                                                            } ?>
                                                                         
                                                                                                    </div>
                                                                                                    <div class="col-lg-7">
                                                                                                        <h2 class="">
                                                                                                                <strong><?php echo $name;?></strong>
                                                                                                        </h2>

                                                                                                        <h5>UserName : <?php echo $username;?>   </h5>

                                                                                                        <table class="table ">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <th>Email :</th>
                                                                                                                    <td scope="row"><?php echo $email;?></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <th>Phone :</th>
                                                                                                                    <td><?php echo $phone;?></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <th>Address :</th>
                                                                                                                    <td><?php echo $address;?></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <th>Role :</th>
                                                                                                                    <td><?php
                                                                                                                    if ($role==1) { 
                                                                                                                        echo "Administrator"; 
                                                                                                                    }elseif ($role==2) {
                                                                                                                        echo "Editor";
                                                                                                                    }
                                                                                                                    else{
                                                                                                                        echo"None";
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <th>Status :</th>
                                                                                                                    <td><?php
                                                                                                                    if ($is_active==0) { 
                                                                                                                        echo "In-Active"; 
                                                                                                                    }elseif ($is_active==1) {
                                                                                                                        echo "Active";
                                                                                                                    }
                                                                                                                    else{
                                                                                                                        echo"None";
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                    </td>
                                                                                                                </tr>

                                                                                                            
                                                                                                                <tr>
                                                                                                                    <th>Date :</th>
                                                                                                                    <td><?php echo $join_date;?></td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>

                                                                                                    </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer col-md-3 offset-md-4">
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                            <!-- <a href="users.php?do=Delete&delete class="btn btn-outline-danger">YES</a> -->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
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
                                                                                            <a href="users.php?do=Delete&delete=<?php echo  $id ;?>" class="btn btn-outline-danger">YES</a>
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
                     
                     <div class="add-user-button">
                                                
                     <a href="users.php?do=add" class="btn btn-outline-primary rounded btn-lg" title="Add User"><i class="fa fa-user-plus" aria-hidden="true"> Add User</i></a>
                     </div>
                       

                  <?php  }
                     else if ($do =='add') {?>
                      
                     
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Add New </h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Blog Post Added Start -->  
                                                    <form action="?do=insert" method="POST"  enctype="multipart/form-data">
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-6">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" name="name" class="form-control" autocomplete="off" required="required">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="username">User Name</label>
                                                                    <input type="text" name="username" class="form-control" autocomplete="off" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                    <div class="form-group col-lg-6">
                                                                       <label for="email">Email</label>
                                                                       <input type="email" name="email" class="form-control" required="required" autocomplete="off">
                                                                    </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="phone">Phone</label>
                                                                    <input type="text" name="phone" class="form-control" required="required" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                               
                                                                <div class="form-group col-lg-6">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" name="password" class="form-control" required="required">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="re_password">Re-Type Password</label>
                                                                    <input type="password" name="re_password" class="form-control" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <textarea name="address" class="form-control" autocomplete="off" rows="5"></textarea>
                                                            </div>
                                                           
                                                            <div class="form-row">
                                                            <div class="form-group col-lg-6">
                                                                    <label for="role">User Role</label>
                                                                    <select name="role" class="form-control">

                                                                    <option>--Please Select The Role--</option>
                                                                    <option value="1">Administrator</option>
                                                                    <option value="2">Editor</option>
                                                                   
                                                                    </select>
                                                             </div>
                                                            <div class="form-group col-lg-6">
                                                                    <label for="is_active">User Status</label>
                                                                    <select name="is_active" class="form-control">

                                                                    <option>--Please Select The Status--</option>
                                                                    <option value="0">In-Active</option>
                                                                    <option value="1">Active</option>
                                                                   
                                                                    </select>
                                                             </div>
                                                        </div>

                                                                <div class="form-group ">
                                                                        <label >User Profile</label>
                                                                        <input type="file" name="image" class="form-control-file">
                                                                </div>
                                                            
                                                          
                                                            <div class="form-group">
                                                                <input type="submit" name="addUser" value=" Add New User " class="btn btn-primary btn-lg">
                                                            </div>
                                                    </form>
                                            <!-- Blog Post Added End -->  
                                        </div>
                                </div>
                            </div>
                        
                        </div>




                   <?php }
                    else if ($do =='insert'){
                        
                        
                        if ($_SERVER['REQUEST_METHOD']=='POST') {
                            
                                $name        = $_POST['name'];
                                $username    = $_POST['username'];
                                $email       = $_POST['email'];
                                $phone       = $_POST['phone'];
                                $password    = $_POST['password'];
                                $re_password = $_POST['re_password'];
                                $address     = $_POST['address'];
                                $role        = $_POST['role'];
                                $is_active   = $_POST['is_active'];

                                $image       = $_FILES['image'];
                                $imageName   = $_FILES['image']['name'];
                                $imageSize   = $_FILES['image']['size'];
                                $imageType   = $_FILES['image']['type'];
                                $imageTmp    = $_FILES['image']['tmp_name'];

                                $imageAllowedExtention =array('jpg','jpeg','png');
                                $imageExtention =strtolower( end(explode('.',$imageName )));

                                $formError=array();

                                if (strlen($username) < 4) {
                                   $formError ="UserName is Too Short!";
                                }
                                if ($password != $re_password) {
                                    $formError ="Password dosn't match.";
                                }
                                if (!empty($imageName)) {

                                    if (!empty($imageName ) && !in_array($imageExtention,$imageAllowedExtention)) {
                                        $formError= "Please Upload Your Valid Image Format.";
                                     }
                                     if (!empty($imageName ) && $imageSize > 2097152) {
                                        $formError= "Image size larger then 2mb";
                                     }
                                }
                                   
                                foreach ($formError as $error) {
                                   echo '<div class="alert alert-warning">' . $error . '</div>';
                                }


                                if (empty($formError)) {
                                    $hassPass=sha1($password);
                                    $image= rand(0,200000).'_'. $imageName;
                                    move_uploaded_file( $imageTmp,"img/users/". $image);

                                    $sql="INSERT INTO user ( name, username, email, phone, address, password, image, role, is_active, join_date) VALUES ('$name','$username','$email','$phone','$address','$hassPass','$image','$role','$is_active'now())";

                                    $addUser = mysqli_query($connect,$sql);

                                    if (!$addUser) {
                                       die("Query Failed!".mysqli_error($connect));
                                    }
                                    else {
                                        header("Location:users.php?do=manage");
                                    }
                                }
                         }
                    
                    }
                    else if ($do =='edit'){
                        if (isset($_GET['update'])) {
                           $id= $_GET['update'];

                           $query= "SELECT * FROM user WHERE id='$id' ";
                           $updateUser=mysqli_query($connect,$query);

                           while ($row= mysqli_fetch_assoc($updateUser)) {
                               
                              $id        = $row['id'];
                              $name      =  $row['name'];
                              $username  = $row['username'];
                              $email     = $row['email'];
                              $phone     = $row['phone'];
                              $password  = $row['password'];
                              $address   = $row['address'];
                              $role      = $row['role'];
                              $is_active = $row['is_active'];
                              $image     = $row['image'];
                              
                               
                               ?>
                              


                         <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Add New </h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Blog Post Added Start -->  
                                                    <form action="?do=update" method="POST"  enctype="multipart/form-data">
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-6">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" name="name" class="form-control" value="<?php echo $name;?>" autocomplete="off" required="required">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="username">User Name</label>
                                                                    <input type="text" name="username" class="form-control" value="<?php echo $username?>" autocomplete="off" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                    <div class="form-group col-lg-6">
                                                                       <label for="email">Email</label>
                                                                       <input type="email" name="email" class="form-control" value="<?php echo $email?>" required="required">
                                                                    </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="phone">Phone</label>
                                                                    <input type="text" name="phone" class="form-control" value="<?php echo $phone?>" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                               
                                                                <div class="form-group col-lg-6">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" name="password" class="form-control" value="<?php echo $password;?>" required="required">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="re_password">Re-Type Password</label>
                                                                    <input type="password" name="re_password" class="form-control" value="<?php echo $password;?>" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <textarea name="address" class="form-control" rows="5"><?php echo $address;?></textarea>
                                                            </div>
                                                           
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-6">
                                                                        <label for="role">User Role</label>
                                                                        <select name="role" class="form-control">

                                                                        <option>--Please Select The Role--</option>
                                                                        <option value="1" <?php if($role==1){ echo 'selected';}?> >Administrator</option>
                                                                        <option value="2" <?php if($role==2){ echo 'selected';}?>>Editor</option>
                                                                    
                                                                    
                                                                        </select>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                        <label for="is_active">Status</label>
                                                                        <select name="is_active" class="form-control">

                                                                        <option>--Please Select The Status--</option>
                                                                        <option value="0" <?php if($is_active==0){ echo 'selected';}?> >In-Active</option>
                                                                        <option value="1" <?php if($is_active==1){ echo 'selected';}?>>Active</option>
                                                                    
                                                                    
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                        <label >User Profile</label><br>
                                                                        <?php 
                                                                        if (!empty($image)) {?>
                                                                        <img src="img/users/<?php echo $image;?>" width="50" <img src="img/users/<?php echo $image;?>" width="40" class="mb-2 rounded">
                                                                            <?php }
                                                                            ?>
                                                                        <input type="file" name="image" class="form-control-file">
                                                                        
                                                                </div>
                                                          
                                                            <div class="form-group">
                                                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                                                <input type="submit" name="updateUser" value=" Update User " class="btn btn-primary btn-lg">
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
                                $name        = $_POST['name'];
                                $username    = $_POST['username'];
                                $email       = $_POST['email'];
                                $phone       = $_POST['phone'];
                                $password    = $_POST['password'];
                                $re_password = $_POST['re_password'];
                                $address     = $_POST['address'];
                                $role        = $_POST['role'];
                                $is_active   = $_POST['is_active'];

                                $image       = $_FILES['image'];
                                $imageName   = $_FILES['image']['name'];
                                $imageSize   = $_FILES['image']['size'];
                                $imageType   = $_FILES['image']['type'];
                                $imageTmp    = $_FILES['image']['tmp_name'];

                                $imageAllowedExtention =array('jpg','jpeg','png');
                                $imageExtention =strtolower( end(explode('.',$imageName )));

                                $formError=array();

                                if (strlen($username) < 4) {
                                $formError ="UserName is Too Short!";
                                }
                                if ($password != $re_password) {
                                    $formError ="Password dosn't match.";
                                }
                                if (!empty($imageName)) {

                                    if (!empty($imageName ) && !in_array($imageExtention,$imageAllowedExtention)) {
                                        $formError= "Please Upload Your Valid Image Format.";
                                    }
                                    if (!empty($imageName ) && $imageSize > 2097152) {
                                        $formError= "Image size larger then 2mb";
                                    }
                                }
                                
                                foreach ($formError as $error) {
                                echo '<div class="alert alert-warning">' . $error . '</div>';
                                }


                                if (empty($formError)) {

                                    if (!empty($imageName)) {
                                        
                                          // $hassPass=sha1($password);
                                        $image= rand(0,200000).'_'. $imageName;
                                        move_uploaded_file( $imageTmp,"img/users/". $image);

                                        $secQuery="SELECT * FROM user WHERE id='$id'";
                                        $imageUnlink=mysqli_query($connect,$secQuery);
                                        while ($row= mysqli_fetch_assoc($imageUnlink)) {
                                            $updateUser=$row['image'];
                                        }
                                        unlink("img/users/".$updateUser);

                                        $sql="UPDATE user SET name='$name', username='$username', email='$email', phone='$phone', address='$address', image='$image', role='$role' WHERE id= '$id'";

                                        $updateUser = mysqli_query($connect,$sql);

                                        if (!$updateUser) {
                                        die("Query Failed!".mysqli_error($connect));
                                        }
                                        else {
                                            header("Location:users.php?do=manage");
                                        }

                                    }
                                    
                                    else {
                                   

                                    $sql="UPDATE user SET name='$name', username='$username', email='$email', phone='$phone', address='$address', role='$role', is_active='$is_active' WHERE id= '$id'";

                                    $updateUser = mysqli_query($connect,$sql);

                                    if (!$updateUser) {
                                    die("Query Failed!".mysqli_error($connect));
                                    }
                                    else {
                                        header("Location:users.php?do=manage");
                                    }
                                       
                                    }

                                   
                                }
                       


                       }
                    }
                    else if ($do =='Delete'){
                       if (isset($_GET['delete'])) {
                          
                             $use_id=   $_GET['delete'];
                             $query="SELECT * FROM user WHERE id= '$use_id'";
                             $userDeleteImg= mysqli_query($connect,$query);
                             while ($row=mysqli_fetch_assoc($userDeleteImg)) {
                                $deleteImg=$row['image'];
                             }
                             unlink("img/users/".$deleteImg);
                             $sql= "DELETE FROM user WHERE id='$use_id'";
                             $userDelete=mysqli_query($connect,$sql);
                             if (!$userDelete) {
                                die("Query Failed!".mysqli_error($connect));
                                }
                                else {
                                    header("Location:users.php?do=manage");
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
<?php include "includes/header.php"?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Manage Your Profile</h1>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> Your Profile  </h6>
                                </div>
                                <div class="card-body justify-content-center">
                                    <?php
                                    $id= $_SESSION['id'];
                                    $query= "SELECT * FROM user WHERE id= '$id'";
                                    $allUserShow=mysqli_query($connect,$query);
                                    while ($row= mysqli_fetch_assoc($allUserShow)) {
                                        $id           = $row['id'] ;
                                        $name         = $row['name'] ;
                                        $username     = $row['username'] ;
                                        $email        = $row['email'] ;
                                        $address      = $row['address'] ;
                                        $phone        = $row['phone'] ;
                                        $image        = $row['image'] ;
                                        $role         = $row['role'] ;
                                        $join_date    = $row['join_date'] ;

                                    }
                                    ?>
                                    <?php if (!empty($image)) {?>
                                    <img alt="Profile Image" class="w-75 rounded-circle border-custom" src="img/users/<?php  echo  $image;?>"> ;
                                   <?php
                                    }else {?>
                                        <img alt="Profile Image" class="w-75 rounded-circle border-custom" src="img/users/avater.png"> ;
                                   <?php
                                       
                                    } ?>
                                        
                                        <h2 class=""><strong><?php echo $name;?></strong> </h2>
                                            <table class="table table-custom">
                                                <tbody>
                                                    <tr>
                                                        <th>UserName:</th>
                                                        <td scope="row"><?php echo $username;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email:</th>
                                                        <td scope="row"><?php echo $email;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone:</th>
                                                        <td><?php echo $phone;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td><?php echo $address;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Role:</th>
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
                                                        <th>Date:</th>
                                                        <td><?php echo $join_date;?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                         <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add New </h6>
                                </div>
                                        <div class="card-body">
                                            <!-- Blog Post Added Start -->  
                                                    <form action="" method="POST"  enctype="multipart/form-data">
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-6">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" name="name" class="form-control" value="<?php echo $name;?>" autocomplete="off" required="required">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="username">User Name</label>
                                                                    <input name="username" class="form-control" value="<?php echo $username?>" autocomplete="off" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                    <div class="form-group col-lg-6">
                                                                       <label for="email">Email</label>
                                                                       <input name="email" class="form-control" value="<?php echo $email?>" readonly>
                                                                    </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="phone">Phone</label>
                                                                    <input type="text" name="phone" class="form-control" value="<?php echo $phone?>" required="required">
                                                                </div>
                                                            </div>
                                                            <!-- <div class="form-row">
                                                               
                                                                <div class="form-group col-lg-6">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" name="password" class="form-control" value="<?php //echo $password;?>" required="required">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="re_password">Re-Type Password</label>
                                                                    <input type="password" name="re_password" class="form-control" value="<?php // echo $password;?>" required="required">
                                                                </div>
                                                            </div> -->
                                                             <!-- <div class="form-group col-lg-6">
                                                                    <label for="role">User Role</label>
                                                                    <select name="role" class="form-control">

                                                                    <option>--Please Select The Role--</option>
                                                                    <option value="1" <?php //if($role==1){ echo 'selected';}?> >Administrator</option>
                                                                    <option value="2" <?php //if($role==2){ echo 'selected';}?>>Editor</option>
                                                                   
                                                                   
                                                                    </select>
                                                             </div> -->
                                                            
                                                           
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-6">
                                                                        <label >User Profile</label><br>
                                                                        <?php 
                                                                        if (!empty($image)) {?>
                                                                        <img src="img/users/<?php echo $image;?>" width="50" <img src="img/users/<?php echo $image;?>" width="40" class="mb-2 rounded">
                                                                            
                                                                       <?php }
                                                                        
                                                                        ?>
                                                                        <input type="file" name="image" class="form-control-file">                                                                      
                                                                </div>
                                                                <div class="form-group  col-lg-6">
                                                                <label for="address">Address</label>
                                                                <textarea name="address" class="form-control" rows="5"><?php echo $address;?></textarea>
                                                            </div>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            
            <?php 
                        if (isset($_POST['updateUser'])) {
                            
                           $name= $_POST['name'];
                           $username= $_POST['username'];
                           $address= $_POST['address'];
                           $phone= $_POST['phone'];

                           $image       = $_FILES['image'];
                           $imageName   = $_FILES['image']['name'];
                           $imageSize   = $_FILES['image']['size'];
                           $imageType   = $_FILES['image']['type'];
                           $imageTmp    = $_FILES['image']['tmp_name'];

                            $imageAllowedExtention =array('jpg','jpeg','png');
                            $imageExtention =strtolower( end(explode('.',$imageName )));

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

                                    $sql="UPDATE user SET name='$name', username='$username', phone='$phone', address='$address', image='$image', WHERE id= '$id'";

                                    $updateUser = mysqli_query($connect,$sql);

                                    if (!$updateUser) {
                                    die("Query Failed!".mysqli_error($connect));
                                    }
                                    else {
                                        header("Location:dashboard.php");
                                    }

                             }
                          
                                else {    
                                    

                                            $sql="UPDATE user SET name='$name', username='$username', phone='$phone', address='$address' WHERE id= '$id'";

                                            $updateUser = mysqli_query($connect,$sql);

                                            if (!$updateUser) {
                                            die("Query Failed!".mysqli_error($connect));
                                            }
                                            else {
                                                header("Location:dashboard.php");}
                                 }
                        }
                        ?>

 <?php include "includes/footer.php"?>

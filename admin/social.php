
<?php include "includes/header.php"?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php
                if ($_SESSION['role'] == 1) {?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> Manage Social Media </h1>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"> Add Social Media </h6>
                                </div>
                             <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">Facebook</label>
                                            <div class="col-sm-8">
                                                <?php
                                                    $query="SELECT * FROM socialmedia WHERE id=1 ";
                                                    $linkUrl=mysqli_query($connect,$query);
                                                    while ($row= mysqli_fetch_assoc($linkUrl)) {
                                                        $s_link=$row['s_link'];
                                                    }
                                                    if (empty($s_link)) {?>
                                                        <input type="text"  class="form-control" name="url_link" placeholder="Facebook url">
                                                        </div>
                                                    <?php }
                                                    else {?>
                                                        <input type="text"  class="form-control" name="url_link" value="<?php echo $s_link?>">
                                                        </div>
                                                  <?php  }
                                                ?>
                                            
                                            <div class="col-sm-2">
                                                <input type="submit"name="facebook" value="Save" class="btn btn-primary" >
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                     if (isset($_POST['facebook'])) {
                                        $url_link= $_POST['url_link'];
                                        $sql="UPDATE socialmedia SET s_link='$url_link' WHERE id=1";
                                        $urlSave=mysqli_query($connect,$sql);
                                        if (!$urlSave) {
                                           die("Query Failed");
                                        }
                                        else {
                                            header("Location:social.php");
                                        }
                                     }
                                    ?>
                                    <form action="" method="POST">
                                        <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">Twitter</label>
                                            <div class="col-sm-8">
                                            <?php
                                                    $query="SELECT * FROM socialmedia WHERE id=2 ";
                                                    $linkUrl=mysqli_query($connect,$query);
                                                    while ($row= mysqli_fetch_assoc($linkUrl)) {
                                                        $s_link=$row['s_link'];
                                                    }
                                                    if (empty($s_link)) {?>
                                                        <input type="text"  class="form-control" name="url_link" placeholder="Twitter url">
                                                      
                                                    <?php }
                                                    else {?>
                                                        <input type="text"  class="form-control" name="url_link" value="<?php echo $s_link?>">
                                                        
                                                  <?php  }
                                                ?>
                                                    </div>
                                            <div class="col-sm-2">
                                                <input type="submit"name="twitter" value="Save" class="btn btn-primary" >
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                     if (isset($_POST['twitter'])) {
                                        $url_link= $_POST['url_link'];
                                        $sql="UPDATE socialmedia SET s_link='$url_link' WHERE id=2";
                                        $urlSave=mysqli_query($connect,$sql);
                                        if (!$urlSave) {
                                           die("Query Failed");
                                        }
                                        else {
                                            header("Location:social.php");
                                        }
                                     }
                                    ?>
                                    <form action="" method="POST">
                                         <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">Instagram</label>
                                            <div class="col-sm-8">
                                            <?php
                                                    $query="SELECT * FROM socialmedia WHERE id=3 ";
                                                    $linkUrl=mysqli_query($connect,$query);
                                                    while ($row= mysqli_fetch_assoc($linkUrl)) {
                                                        $s_link=$row['s_link'];
                                                    }
                                                    if (empty($s_link)) {?>
                                                        <input type="text"  class="form-control" name="url_link" placeholder="Instagram url">
                                                    <?php }
                                                    else {?>
                                                        <input type="text"  class="form-control" name="url_link" value="<?php echo $s_link?>">
                                                  <?php  }
                                                ?>
                                           
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="submit"name="instagram" value="Save" class="btn btn-primary" >
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                     if (isset($_POST['instagram'])) {
                                        $url_link= $_POST['url_link'];
                                        $sql="UPDATE socialmedia SET s_link='$url_link' WHERE id=3";
                                        $urlSave=mysqli_query($connect,$sql);
                                        if (!$urlSave) {
                                           die("Query Failed");
                                        }
                                        else {
                                            header("Location:social.php");
                                        }
                                     }
                                    ?>
                                    <form action="" method="POST">
                                        <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">Youtube</label>
                                            <div class="col-sm-8">
                                            <?php
                                                    $query="SELECT * FROM socialmedia WHERE id=4 ";
                                                    $linkUrl=mysqli_query($connect,$query);
                                                    while ($row= mysqli_fetch_assoc($linkUrl)) {
                                                        $s_link=$row['s_link'];
                                                    }
                                                    if (empty($s_link)) {?>
                                                         <input type="text"  class="form-control" name="url_link" placeholder="Youtube url">
                                                        
                                                    <?php }
                                                    else {?>
                                                        <input type="text"  class="form-control" name="url_link" value="<?php echo $s_link?>">
                                                      
                                                  <?php  }
                                                ?>
                                          
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="submit"name="youtube" value="Save" class="btn btn-primary" >
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                     if (isset($_POST['youtube'])) {
                                        $url_link= $_POST['url_link'];
                                        $sql="UPDATE socialmedia SET s_link='$url_link' WHERE id=4";
                                        $urlSave=mysqli_query($connect,$sql);
                                        if (!$urlSave) {
                                           die("Query Failed");
                                        }
                                        else {
                                            header("Location:social.php");
                                        }
                                     }
                                    ?>
                                    <form action="" method="POST">
                                        <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">LinkedIn</label>
                                            <div class="col-sm-8">
                                            <?php
                                                    $query="SELECT * FROM socialmedia WHERE id=5 ";
                                                    $linkUrl=mysqli_query($connect,$query);
                                                    while ($row= mysqli_fetch_assoc($linkUrl)) {
                                                        $s_link=$row['s_link'];
                                                    }
                                                    if (empty($s_link)) {?>
                                                         <input type="text"  class="form-control" name="url_link" placeholder="LinkedIn url">
                                                       
                                                    <?php }
                                                    else {?>
                                                        <input type="text"  class="form-control" name="url_link" value="<?php echo $s_link?>">
                                                       
                                                  <?php  }
                                                ?>
                                           
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="submit"name="linkedin" value="Save" class="btn btn-primary" >
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                     if (isset($_POST['linkedin'])) {
                                        $url_link= $_POST['url_link'];
                                        $sql="UPDATE socialmedia SET s_link='$url_link' WHERE id=5";
                                        $urlSave=mysqli_query($connect,$sql);
                                        if (!$urlSave) {
                                           die("Query Failed");
                                        }
                                        else {
                                            header("Location:social.php");
                                        }
                                     }
                                    ?>                                  
                                </div>
                             </div>
                        </div>
                    </div>
                 <?php } ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 <?php include "includes/footer.php"?>

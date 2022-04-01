
<?php include "includes/header.php"?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <?php
                        if ($_SESSION['role'] == 1) {?>

                    <h1 class="h3 mb-4 text-gray-800">Websites Settings</h1>
                    <div class="row">
                       <div class="col-md-12">
                         <!-- Add Website Logo Start -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                     <h6 class="m-0 font-weight-bold text-primary"> Manage Website Logo And Favicon  </h6>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="logo">Upload Logo(500x500)</label><br><br>
                                                        <?php
                                                        $sqlLogo= "SELECT * FROM settings";
                                                        $logoQuery=mysqli_query($connect,$sqlLogo);
                                                        while ($row=mysqli_fetch_assoc($logoQuery)) {
                                                            $logo=$row['logo'];
                                                            $favicon=$row['favicon'];

                                                            if (!empty($logo)) {?>
                                                                <img src="img/<?php echo $logo; ?>"  width="100"><br><br>
                                                                <?php
                                                            }?>
                                                                <input type="file" name="logo" class="form-control-file">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="favicon">Upload Favicon (16x16)</label><br><br>
                                                              <?php  if (!empty($favicon)) {?>
                                                                <img src="img/<?php echo $favicon; ?>"  width="100"><br><br>
                                                                <?php
                                                            }?>
                                                                <input type="file" name="favicon" class="form-control-file">
                                                            </div>
                                                           
                                                            <?php  }
                                                        ?>
                                                        
                                            
                                            </div>
                                        
                                                   
                                           
                                            <div class="form-group">
                                                <input type="submit"name="addSettings" value="Image Upload" class="btn btn-primary" >
                                            </div>
                                    </form>
                                  
                                </div>
                            </div>
                              <!-- Add Website Logo End -->

                              <?php 
                              if (isset($_POST['addSettings'])) {
                                  
                               $logo       = $_FILES['logo'];
                               $logoName   = $_FILES['logo']['name'];
                               $logoTmp    = $_FILES['logo']['tmp_name'];

                               $favicon    = $_FILES['favicon'];
                               $faviconName   = $_FILES['favicon']['name'];
                               $faviconTmp    = $_FILES['favicon']['tmp_name'];

                               if (!empty($logo) && !empty($favicon)) {
                                    $logoFile= rand(0,200000).'_'. $logoName;
                                    $faviconFile= rand(0,200000).'_'. $faviconName;
                                    move_uploaded_file( $logoTmp,"img\\". $logoFile);
                                    move_uploaded_file( $faviconTmp,"img\\". $faviconFile);
    
                                    $query= "UPDATE settings SET logo='$logoFile',favicon='$faviconFile' WHERE id= 1";
                                    $addImage=mysqli_query($connect,$query);
                                    if (! $addImage) {
                                        die("Query Failed");
                                    }
                                    else {
                                        header("Location:settings.php");
                                    }
                               }
                               elseif (!empty($logo) && empty($favicon)) {
                                    $faviconFile= rand(0,200000).'_'. $faviconName;
                                        
                                    move_uploaded_file( $faviconTmp,"img\\". $faviconFile);

                                    $query= "UPDATE settings SET favicon='$faviconFile' WHERE id= 1";
                                   
                                    $addImage=mysqli_query($connect,$query);
                                    if (! $addImage) {
                                        die("Query Failed");
                                    }
                                    else {
                                        header("Location:settings.php");
                                    }
                               }
                               elseif (empty($logo) && !empty($favicon)) {
                                        
                                    $logoFile= rand(0,200000).'_'. $logoName;
                                    
                                    move_uploaded_file( $logoTmp,"img\\". $logoFile);

                                    $query= "UPDATE settings SET logo='$logoFile' WHERE id= 1";
                                        $addImage=mysqli_query($connect,$query);
                                        if (! $addImage) {
                                            die("Query Failed");
                                        }
                                        else {
                                            header("Location:settings.php");
                                        }
                               }

                              

                              }
                              
                              ?>

                       </div>
                    </div>

                    <?php }?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 <?php include "includes/footer.php"?>


<?php include "includes/header.php"?>


<?php
//Category ADD Code...
       // $message="";
       insertCategory();
?>

                <!-- Begin Page Content -->
            <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Setup Category page</h1>
                    <div class="row">
                        <!-- Add New Category Start -->
                        <div class="col-lg-4">
                             <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary"> Add New Category </h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                                <div class="form-group">
                                                    <label for="category">Category Name</label>
                                                    <input type="text" name="cat_name" class="form-control"  autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit"name="addcategory" value="Add Category" class="btn btn-primary" >
                                                </div>
                                        </form>
                                        <?php 
                                        //echo $message
                                        ?>
                                    </div>
                             </div>
                              <!-- Add NEw Category End -->
                             <?php 
                             //Update Category show Code...
                             if (isset($_GET['update'])) 
                             {
                                $cat_id= $_GET['update'];
                                include"includes/updateCategory.php";
                             } ?>
                        </div>
                        <!-- Update Category End -->

                        <!-- View All Category list Start -->
                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"> View All Categories </h6>
                                </div>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                        <th scope="col">Serial </th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php viewCategory(); ?>
                                        </tbody>
                                </table>
                             </div>
                        </div>
                        <!-- View All Category list End -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
                                   
        <?php 
        //Category Delete function...
        deleteCategory();
        ?>

 <?php include "includes/footer.php"?>
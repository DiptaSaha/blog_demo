<?php
  $query= "SELECT * FROM category WHERE cat_id ='$cat_id'";
  $select_category= mysqli_query($connect, $query);

  while ($row= mysqli_fetch_assoc($select_category)) {
      $cat_id   = $row['cat_id'];
      $cat_name = $row['cat_name'];
  } ?>

   <!-- Update Category Start -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary"> Update Category </h6>
     </div>
     <div class="card-body">
         <form action="" method="POST">
                 <div class="form-group">
                     <label for="category">Category Name</label>
                     <input type="text" name="cat_name" class="form-control" value="<?php echo $cat_name;?>" autocomplete="off">
                 </div>

                 <div class="form-group">
                  <input type="submit"name="editcategory" value="Update Category" class="btn btn-primary" >
                 </div>
         </form>
     </div>
 </div>
 


 <?php    
    //Category Update Code...                                           
                 if (isset($_POST['editcategory'])) {
                        $cat_name= $_POST['cat_name'];                       
                        $query = "UPDATE category SET cat_name='$cat_name' WHERE cat_id ='$cat_id'";
                        $updateCategory= mysqli_query($connect, $query);
                            if (!$updateCategory) {
                                die("Category Can Not Updated! ". mysqli_error($connect));
                                    }
                                 else {      
                                       header("Location: all_category.php");
                                      }
                 }
   ?>

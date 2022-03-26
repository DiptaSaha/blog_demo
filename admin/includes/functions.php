<?php
//Category Insert Function
    function insertCategory(){
        global $connect;
        if (isset($_POST['addcategory'])) {
            $cat_name = $_POST['cat_name'];

            if (empty($cat_name)) {
                $message= '<div class="alert alert-warning">Category Name Can Not Empty. </div>';
            }
            else {
                $query="INSERT INTO category (cat_name) VALUES ('$cat_name')";
                $addCategory= mysqli_query($connect, $query);

                if (!$addCategory) {
                die("Category Added Failed!". mysqli_error($connect));
                }
                else {
                    $message= '<div class="alert alert-success">Category Name Successfully Saved. </div>';
                    header("Location: all_category.php");
                }
            }
        }
    }


//View All Category Show Function

    function viewCategory(){
                        global $connect;
                        $query= "SELECT * FROM category";
                            $select_all_category= mysqli_query($connect, $query);
                                $i=0;
                                while ($row=mysqli_fetch_assoc($select_all_category)) {
                                        $i++;
                                        $cat_id = $row['cat_id'];
                                        $cat_name= $row['cat_name'];    
                                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $i;?></th>
                                            <td><?php echo $cat_name;?></td>
                                            <td>
                                            <a href="all_category.php?update=<?php if (isset($cat_id)) {
                                                echo $cat_id;
                                                } ?>" class="btn btn-outline-success"><i class="far fa-edit" title="Update"></i></a>
                                            <a href="all_category.php?delete=<?php echo $cat_id ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt" title="Delete"></i></a>
                                            </td>
                                    </tr>
                               <?php }
    }

                //Category Deleted Function
                function deleteCategory(){
                    global $connect;
                    if (isset($_GET['delete'])) {
                        $cat_id= $_GET['delete'];
                        $query= "DELETE FROM category WHERE cat_id= '$cat_id'";
                        $deleteQuery= mysqli_query($connect, $query);
                        if ($deleteQuery) {
                            header("Location:all_category.php");
                        }
                        else {
                            die("Delete Query Failed! ". mysqli_error($connect));
                        }
                    
                    }
                }


?>
<header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <?php
                        $sqlLogo= "SELECT * FROM settings";
                        $logoQuery=mysqli_query($connect,$sqlLogo);
                        while ($row=mysqli_fetch_assoc($logoQuery)) {
                        $logo=$row['logo'];?>
                        <a class="navbar-brand" href="index.php"><img src="admin/img/<?php echo $logo; ?>" width="100">
                        </a>
                        <?php
                            }?>
                       
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>

                            <?php
                                $sql="SELECT * FROM category ORDER BY cat_name ASC";
                                $navItem=mysqli_query($connect,$sql);
                                while ($row=mysqli_fetch_assoc($navItem)) {
                                   $cat_id = $row['cat_id'];
                                   $cat_name = $row['cat_name'];?>

                                    <li class="nav-item">
                                        <a class="nav-link" href="category.php?id=<?php echo $cat_id?>"><?php echo $cat_name?></a>
                                    </li>

                              <?php  }
                            
                            
                            ?>
                           
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                Dropdown
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li> -->
                           
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
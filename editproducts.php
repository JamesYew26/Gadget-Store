<?php
session_start();
?>
 
<div class="section">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card">
                    <div class="card-header">
                        <h4 class="fw-bold text-center">Edit Data</h4>
                    </div>
                    <div class="card-body">
                    <?php
                        
                        if(isset($_GET['id']))
                        {
                            $connection = mysqli_connect('localhost', 'username', 'password', 'gadgetstore');
                            $id = $_GET['id'];
                            $fetch_data = "SELECT * FROM products WHERE id='$id'";
                            $fetch_data_run = mysqli_query($connection,$fetch_data);
                          
                            if(mysqli_num_rows($fetch_data_run > 0)
                            {
                                foreach($fetch_data_run as $row)
                                {
                                    
                                    ?>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'];?>">
                                        <div class="mb-3">
                                            <label for="exampleEmail" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleEmail" class="form-label">Desc</label>
                                            <input type="text" class="form-control" name="desc" value="<?php echo $row['desc'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleEmail" class="form-label">Price</label>
                                            <input type="number" class="form-control" name="price" value="<?php echo $row['price'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleEmail" class="form-label">Rrp</label>
                                            <input type="number" class="form-control" name="rrp" value="<?php echo $row['rrp'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleEmail" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" name="quantity" value="<?php echo $row['quantity'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleEmail" class="form-label">Product Image</label>
                                            <input type="file" class="form-control" name="image">
                                            <input type="text" class="form-control" name="iamge_old" value="<?php echo $row['img'];?>">
                                            <img src="<?php echo "uploads/".$row['img']; ?>width=75 alt="image"">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleEmail" class="form-label">Date_added</label>
                                            <input type="date" class="form-control" name="date_added">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update_btn" class="btn-info">Update data</button>
                                        </div>                
                                    
                        </form>
                                    <?php
                                }    
                            } 
                            else
                            {
                                echo "no record found";
                            } 
                        }
                        else
                        {
                            echo "something went wrong";
                        }
                    ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
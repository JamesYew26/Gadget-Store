<?php 
require 'connect_db.php';
?>
<div class="section">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                        <h4 class="fw-bold text-center">Insert Data</h4>
                    </div>
                    <div class="card-body">
                  
                                    <form action="code.php" method="POST">
                                        <input type="hidden" class="form-control" name="id" >
                                        <div class="mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Desc</label>
                                            <input type="text" class="form-control" name="desc" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Price</label>
                                            <input type="number" class="form-control" name="price" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Rrp</label>
                                            <input type="number" class="form-control" name="rrp" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" name="quantity" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Product Image</label>
                                            <input type="file" class="form-control" name="image">
                                            <img width=75 alt="image" src="<?php echo "imgs/".$row['img']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Date_added</label>
                                            <input type="date" class="form-control" name="date_added">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="insert_btn" class="btn btn-primary">Insert data</button>
                                        </div>                
                                    
                  
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'username', 'password', 'gadgetstore');

// Get the total number of records from our table "users".
$total_pages = $mysqli->query('SELECT * FROM products')->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $mysqli->prepare('SELECT * FROM products ORDER BY name LIMIT ?,?')) {
    // Calculate the page to get the results we need from our table.
    $calc_page = ($page - 1) * $num_results_on_page;
    $stmt->bind_param('ii', $calc_page, $num_results_on_page);
    $stmt->execute();
    // Get the results...
    $result = $stmt->get_result();
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Gadget Store</title>
            <meta charset="utf-8">
            <style>
                html {
                    font-family: Tahoma, Geneva, sans-serif;
                    padding: 20px;
                    background-color: #F8F9F9;
                }
                table {
                    border-collapse: collapse;
                    width: 1000px;

                }
                header {
                    border-bottom: 1px solid #EEEEEE;
                }

                td, th {
                    padding: 15px;
                }
                th {
                    background-color: #54585d;
                    color: #ffffff;
                    font-weight: bold;
                    font-size: 13px;
                    border: 1px solid #54585d;
                }
                td {
                    color: #636363;
                    border: 1px solid #dddfe1;
                    text-align: center;
                }
                tr {
                    background-color: #f9fafb;
                }
                tr:nth-child(odd) {
                    background-color: #ffffff;
                }
                .btn  {
                    text-decoration: none;
                    padding: 2px 5px;
                    background: #2E8B57;
                    color: white;
                    border-radius: 3px;
                }
                .del_btn {
                    text-decoration: none;
                    padding: 2px 5px;
                    color: white;
                    border-radius: 3px;
                    background: #800000;
                }
                .center {
                    margin-left: auto;
                    margin-right: auto;
                }
                .pagination {
                    list-style-type: none;
                    padding: 10px 0;
                    display: inline-flex;
                    justify-content: space-between;
                    box-sizing: border-box;
                    justify-content: center;
                    align-items: center;
                }
                .pagination ul {
                    text-align: center;
                }
                .pagination li {
                    box-sizing: border-box;
                    padding-right: 10px;
                    margin: 0 auto;
                    
                }
                .pagination li a {
                    box-sizing: border-box;
                    background-color: #e2e6e6;
                    padding: 8px;
                    text-decoration: none;
                    font-size: 12px;
                    font-weight: bold;
                    color: #616872;
                    border-radius: 4px;
                    text-align: center;
                    margin: 0 auto;
                    
                }
                .pagination li a:hover {
                    background-color: #d4dada;
                }
                .pagination .next a, .pagination .prev a {
                    text-transform: uppercase;
                    font-size: 12px;
                    margin: 0 auto;
                   

                }
                .pagination .currentpage a {
                    background-color: #518acb;
                    color: #fff;
                    margin: 0 auto;
                    
                    
                }
                .pagination .currentpage a:hover {
                    background-color: #518acb;
                  
                }
            </style>
        </head>
        <body>
            <header>
                <div class="content-wrapper">
                <img src="imgs/Gadget.png" style="width:60px;height:60px;">
                <input style="float: right; width: 70px; height: 35px;border-radius: 5px; background-color: #4e5c70; color: #ffffff; font-family: Tahoma, Geneva, sans-serif;" type=button onClick="location.href='upload.html'" value='Upload'>
                <input style="float: right; width: 70px; height: 35px;border-radius: 5px; background-color: #4e5c70; color: #ffffff; font-family: Tahoma, Geneva, sans-serif;" type=button onClick="location.href='admin.php'" value='Homepage'>

                </div>
            </header>
            <center><h3>Products List</h3></center>
            <table class="center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Price</th>
                    <th>Rrp</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Date_added</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>                                       
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['desc']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['rrp']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><img src="<?php echo "uploads/".$row['img']; ?>width=75 alt="image""></td>
                        <td><?php echo $row['date_added']; ?></td>
                        <td><a href="editproducts.php?id=<?php echo $row['id']; ?>" class="btn btn-success" >Edit</a></td>
                    <td>     
                    <form>
                            <input type="hidden" class="form-control" name="delete_id" value="<?php echo $row['id'];?>">
                            <button type="submit" name="delete_btn" class="btn btn-danger">Danger</button>
                        </form>
                    </td>    


           

                <?php endwhile; ?>
            </table>
            <center>
                <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
                <ul class="pagination">   

                    <?php if ($page > 1): ?>
                        <li class="prev"><a href="products_list.php?page=<?php echo $page - 1 ?>">Prev</a></li>
                    <?php endif; ?>

                    <?php if ($page > 3): ?>
                        <li class="start"><a href="products_list.php?page=1">1</a></li>
                        <li class="dots">...</li>
                    <?php endif; ?>

                    <?php if ($page - 2 > 0): ?><li class="page"><a href="products_list.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
                    <?php if ($page - 1 > 0): ?><li class="page"><a href="products_list.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

                    <li class="currentpage"><a href="products_list.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                    <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1): ?><li class="page"><a href="products_list.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
                    <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1): ?><li class="page"><a href="products_list.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

                    <?php if ($page < ceil($total_pages / $num_results_on_page) - 2): ?>
                        <li class="dots">...</li>
                        <li class="end"><a href="products_list.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                    <?php endif; ?>

                    <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                        <li class="next"><a href="products_list.php?page=<?php echo $page + 1 ?>">Next</a></li>
                        <?php endif; ?>


                </ul>
                </center>
            <?php endif; ?>
        </body>
    </html>
    <?php
    $stmt->close();
}
?>
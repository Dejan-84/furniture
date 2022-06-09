<?php


if(isset($_GET['id'])){

    require_once 'includes/baza.php';  

    $provera = true;

    $id = $_GET['id'];

    $conn = database_connection('localhost', 'root', '', 'furniture');

    $query = "SELECT * FROM products WHERE product_id = $id";

    $result = mysqli_query($conn,$query);

        $rows = mysqli_fetch_array($result);

        $id = $rows['product_id'];
        $name = $rows['name'];
        $old_price = $rows['old_price'];
        $new_price = $rows['new_price'];
        $picture_path = $rows['picture_path'];
        $dimensions = $rows['dimensions'];
        $color = $rows['color'];
        $descriptions = $rows['descriptions'];
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

    <title>Document</title>
</head>
<body>
    
    <div class="container margin">

        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
    <div class="container">
        <div class="col-md-6">
            <div>
                <h3><?php echo $name;?></h3>
            </div>    
            <img class="wow fadeInDown animated" src="<?php echo $picture_path;?>" alt="Chairs" title="Chairs" width="100%">    
        </div>

        <div class="col-md-6">
            
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $name;?></td>
                    </tr>
                    <tr>
                        <th>Dimensions:</th>
                        <td><?php echo $dimensions;?></td>
                    </tr>
                    <tr>
                        <th>Color:</th>
                        <td><?php echo $color;?></td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td><?php echo $descriptions;?></td>
                    </tr>
                    <tr style="color:#ff1a1a">
                        <th>Old price:</th>
                        <td>$<?php echo $old_price;?></td>
                    </tr>
                    <tr style="color:#66ff33;font-weight:bold">
                        <th>New price:</th>
                        <td style="font-size:large">$<?php echo $new_price;?></td>
                    </tr>
                </tbody>
            </table>
            
            <button type="button" class="btn wow fadeInDown animated" onclick="" title="Add to Cart"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
        </div>
    </div>
</body>
</html>
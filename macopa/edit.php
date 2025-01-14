<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="bootstrap, admin template, dashboard, responsive, free template, example">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Motorcyle</title>

    <style>
    body {
      background: url('motor.jpg') center center fixed;
      background-size: cover;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="#">Motorcycle</a>
    <div class="ml-auto">
        <img onclick="profileToggle()" class="rounded-circle" src="user.jpg" alt="" width="30" height="30">
        <a href="#" onclick="profileToggle()" class="text-white ml-2">Mackie Navallo</a>
        <div id="ProfileDropDown" class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">My account</a>
            <a class="dropdown-item" href="#">Notifications</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>
</nav>
<div class="d-flex">
    <nav class="sidebar p-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="motorcycle.php"><i class="menu-icon fa fa-table"></i> Motorcycle</a>
            </li>
        </ul>
    </nav>
    <div class="content p-4">
        <div class="container">
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">Motorcycles</div>
                <div class="card-body">
                  <div class="card mb-4">
                        <div class="card-header">Add Motorcycle</div>
                        <div class="card-body">
                            <?php 
$id=$_GET['mid'];

include('connect.php');
    $query1=mysqli_query($conn,"SELECT * FROM motorcycle WHERE idno='$id' ");
    $row1=mysqli_fetch_array($query1)

?>
      
                            <form method="POST" action="updatemotor.php?mid=<?php echo $id; ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="idno">Idno</label>
                                        <input type="text" name="idno" class="form-control cc-exp" value="<?php echo $row1['idno']; ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="brand">Brand</label>
                                        <input type="text" name="brand" class="form-control cc-exp" value="<?php echo $row1['brand']; ?>">
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" class="form-control cc-exp" value="<?php echo $row1['model']; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="power">Power</label>
                                        <input type="text" name="power" class="form-control cc-exp" value="<?php echo $row1['power']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="color">Color</label>
                                        <input type="text" name="color" class="form-control cc-exp" value="<?php echo $row1['color']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control cc-exp" value="<?php echo $row1['price']; ?>">
                                    </div>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary" value="Update">
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>idno</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Power</th>
                                <th>Color</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include('connect.php');
                            $query = mysqli_query($conn, "SELECT * FROM motorcycle");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $row['idno']; ?></td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['model']; ?></td>
                                <td><?php echo $row['power']; ?></td>
                                <td><?php echo $row['color']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td>
                                    <a href="editmotor.php?mid=<?php echo $row['idno']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="deletemotor.php?mid=<?php echo $row['idno']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function profileToggle() {
        $('#ProfileDropDown').toggleClass('show');
    }
</script>
</body>

</html>

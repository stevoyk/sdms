<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PROJECT</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/css.css">
</head>
<body>
   

    
    <?php require_once'process.php'; ?>
    <?php
        if (isset($_SESSION['message']))?>

        <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
         echo $_SESSION['message'];
         unset($_SESSION['message']);
        ?>
        </div>
        

    <div class="container">
        <?php
            $con=mysqli_connect('localhost','root','','crud') or die(mysqli_error($con));
            $sql="SELECT * FROM data";
            $res=mysqli_query($con, $sql);
        ?>
       
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>


                    <?php
                        while ($row= mysqli_fetch_array($res)){   ?>   
                         <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td>
                                <a href="index.php?edit=<?php echo $row['id'];?>"
                                class="btn btn-info">Edit</a>
                                <a href="process.php?delete=<?php echo $row['id'];?>"
                                class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>

                </table>
            </div>
        
                    <div class="row">
                       
                    <form action="process.php" method="POST">
                        
                        <br>
                        <br>
                        <br>
                        <h1>Add New Record</h1>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" value="<?php echo $location;?>" class="form-control" placeholder="Enter your Location" required>
                        </div>
                         <div class="form-group">
                            <?php
                            if($update==true){?>
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                            <?php } else{?>
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                            <?php } ?>
                        </div>
                    </form>
                
        </div>
        </div>
   
    

   <script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
session_start();
$con=mysqli_connect('localhost','root','','crud') or die(mysqli_error($con));
$id=0;
$name='';
$location='';
$update=false;
    
if(isset($_POST['save'])){
    $name=$_POST['name'];
    $location=$_POST['location'];

    $sql="INSERT INTO data(name, location) VALUES('$name', '$location')";
    $res=mysqli_query($con, $sql);
    //$mysqli->query("INSERT INTO data(name, location) VALUES('$name','$location')") or die(mysqli_error($con));

    $_SESSION['message']="Record has been saved";
    $_SESSION['msg_type']="success";
    header("location: index.php");
}


if (isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql="DELETE FROM data WHERE id=$id" or die($mysqli->error());
    $res=mysqli_query($con, $sql);
    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $sql="SELECT * FROM data WHERE id=$id" or die($mysqli->error());
    $res=mysqli_query($con, $sql);

    
        while ($row= mysqli_fetch_array($res)){
            $name = $row['name'];
            $location=$row['location'];   
            
               
        }
    }

    
if (isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $location=$_POST['location'];

    $sql="UPDATE data SET name='$name', location='$location' WHERE id=$id" or die($mysqli->error());
    $res=mysqli_query($con, $sql);

    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";

    header('location: index.php');


}

            
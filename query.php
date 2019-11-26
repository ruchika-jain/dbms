<?php

$conn=new mysqli("localhost", "root", "", "lab") OR die("Error: " . mysqli_error($conn));

session_start();

//save into db
if(isset($_POST['save'])){
    if(!empty($_POST['name'])&& !empty($_POST['formula'])&& !empty($_POST['stock'])){
        $name=$_POST['name'];
        $formula=$_POST['formula'];
        $stock=$_POST['stock'];
        $iQuery="INSERT INTO chemicals(name,formula,stock) values(?,?,?)";
        $stmt=$conn->prepare($iQuery);
        $stmt->bind_param("sss",$name,$formula,$stock);
        if($stmt->execute()){
            $_SESSION['msg']="New record is successfully added.";
            $_SESSION['alert']="alert alert-success";
        }
        $stmt->close();
        $conn->close();
    }
    else{
        $_SESSION['msg']="The fields should not be empty.";
        $_SESSION['alert']="alert alert-warning";
    }
    header("Location: chemicals.php");
}
#Delete data
if (isset($_POST['delete'])){
    $slno=$_POST['delete'];
    $dquery="DELETE FROM chemicals WHERE slno = ?";
    $stmt=$conn->prepare($dquery);
    $stmt->bind_param('i',$slno);
    if($stmt->execute()){
        $_SESSION['msg']="Selected record is successfully deleted.";
        $_SESSION['alert']="alert alert-danger";
    }
    $stmt->close();
    $conn->close();
    header("Location: chemicals.php");
}

#Update 
if(isset($_POST['edit'])){
    if(!empty($_POST['name']) && !empty($_POST['formula']) && !empty($_POST['stock'])){
        $name=$_POST['name'];
        $formula=$_POST['formula'];        
        $stock=$_POST['stock'];
        $slno=$_POST['edit'];  
        
        $uquery="UPDATE chemicals SET name = ?, formula = ?, stock=? WHERE slno=?";
        $stmt=$conn->prepare($uquery);
        $stmt->bind_param('sssi',$name,$formula,$stock,$slno);

        if($stmt->execute()){
            $_SESSION['msg']="The fields should not be empty.";
            $_SESSION['alert']="alert alert-success";
        }
        $stmt->close();
        $conn->close();
    }
    else{
        $_SESSION['msg']="Selected record is successfully updated.";
        $_SESSION['alert']="alert alert-warning";
    }
    header("location:chemicals.php");
}
?>
<!-- 7. Develop a PHP program to create ‘Dept’ table with following fields (Deptid. Deptname,).
Accept the data through form elements. -->

create database department100;
use department100;
create table dept(Deptid int primary key, Deptname varchar(20));


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post">
        <h2>Enter the deparment details</h2>
        Enter the department id: <input type="number" name="id"><br><br>
        Enter the department name: <input type="text" name="deptname"><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
        $conn= mysqli_connect("localhost", "root","","department100");
        if(!$conn){
            die("error connecting the database".mysqli_connect_error());
        }
        if(isset($_REQUEST['submit'])){
            $id=$_REQUEST['id'];
            $name=$_REQUEST['deptname'];
            $qry="insert into dept values ($id,'$name')";
            if(mysqli_query($conn, $qry)){
                echo "Record inserted succesfully";
            }else{
                echo "Record no insered ".mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    ?>
</body>
</html>
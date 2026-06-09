<!-- 3. Develop a PHP program to create ‘Emp’ table with following fields (Empid. Empname,
Salary). Edit the salary of a particular employee and accept the Empid through a text box. -->

create database emp100;
use emp100;
create table empdetails(Empid int primary key, Empname varchar(20), Salary int);
insert into empdetails values(1, 'Arjun Santhosh', 50000);
insert into empdetails values(2, 'Gowtham thulasi', 60000);
insert into empdetails values(3, 'Anjali Suresh', 70000);
insert into empdetails values(4, 'Karthik', 80000);

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        employeee id : <input type="number" class="id" name="id"><br><br>
        employee salary : <input type="number" class="salary" name="salary"><br><br>
        <button type="submit" name="submit" id="submit">Submit</button>
    </form>
    <?php
        $conn= mysqli_connect("localhost", "root", "","emp100");
        if(!$conn){
            die("Error connecting".mysqli_connect_error());
        }
        if(isset($_REQUEST['submit'])){
            $id=$_REQUEST['id'];
            $salary=$_REQUEST['salary'];
            $qry="update empdetails set Salary ='$salary' where Empid= '$id'";
            if(mysqli_query($conn, $qry)){
                echo "record updated succesfully";
            }else{
                echo "record not updated".mysqli_error($conn);
            }
            
            
        }
    ?>
</body>
</html>
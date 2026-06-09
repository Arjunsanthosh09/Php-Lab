<!-- 8. Develop a PHP program to create ‘Emp’ table with following fields (Empid. Empname,
Salary). Delete a particular employee from the table. -->

create database emp99;
use emp99;
create table empdetails(Empid int primary key, Empname varchar(20), Salary int);
insert into empdetails values(1, 'Arjun Santhosh', 50000);
insert into empdetails values(2, 'Gowtham thulasi', 60000);
insert into empdetails values(3, 'Anjali Suresh', 70000);
insert into empdetails values(4, 'Karthik', 80000);

<html>
<head>
    <title>Document</title>
</head>
<body>
    <?php
        $conn= mysqli_connect("localhost","root","","emp99");
        if(!$conn){
            die("Error connecting the database".mysqli_connect_error());
        }
        
        if(isset($_REQUEST['delete'])){
            $id=$_REQUEST['delete'];
            $delqry="delete from empdetails where Empid ='$id'";
            if(mysqli_query($conn, $delqry)){
                echo "Record deleted successfully...";
            }else{
                echo "error deleting the record".mysqli_error($conn);
            }
        }
        $qry="select * from empdetails";
        $result= mysqli_query($conn, $qry);
        echo "<table border=1px>";
        echo "<tr>";
            echo "<th>Employee ID</th>";
            echo "<th>Employee name</th>";
            echo "<th>Salary</th>";
            echo "<th>Delete</th>";
            
        echo "</tr>";
        while($res= mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>".$res['Empid']."</td>";
                echo "<td>".$res['Empname']."</td>";
                echo "<td>".$res['Salary']."</td>";
                echo "<td><a href=?delete=".$res['Empid'].">Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        
        
    
    ?>
</body>
</html>
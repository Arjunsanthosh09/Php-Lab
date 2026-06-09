<!-- 5. Develop a PHP program to create ‘Emp’ table with following fields
(Empid.Empname,Salary). Delete a particular employee by accepting Empid through a
text box. -->

create database emp100;
use emp100;
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
    <form action="" method="post">
        employeee id : <input type="number" class="id" name="id" placeholder="Enter the emp id to delete the employee record"><br><br>
        <button type="submit" name="submit" id="submit">Submit</button>
    </form>
    <?php
        $conn= mysqli_connect("localhost", "root", "","emp100");
        if(!$conn){
            die("Error connecting".mysqli_connect_error());
        }
        if(isset($_REQUEST['submit'])){
            $id=$_REQUEST['id'];
            $qry="delete from empdetails where Empid='$id'";
            if(mysqli_query($conn, $qry)){
                echo "record deleted succesfully";
            }else{
                echo "record not deleted".mysqli_error($conn);
            }
            
            echo "<h1>after Deleted employee details </h1>";
            $qry1="select * from empdetails";
            $result=mysqli_query($conn, $qry1);
                while($row=mysqli_fetch_assoc($result)){
                    echo "Empid : ".$row['Empid']."<br>";
                    echo "Empname : ".$row['Empname']."<br>";
                    echo "Salary : ".$row['Salary']."<br><br>";
                }
             }
    ?>
</body>
</html>
<!-- 6. Develop a PHP program to create ‘Emp’ table with following fields
(Empid.Empname,Salary). Edit a particular employee details by accepting Empid through
a text box -->

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
        employeee id : <input type="number" class="id" name="id"  placeholder="Enter the emp id to delete the employee record"><br><br>
        <button type="submit" name="submit" id="submit">Submit</button>
    </form>
    <?php
        $conn= mysqli_connect("localhost", "root", "","emp");
        if(!$conn){
            die("Error connecting".mysqli_connect_error());
        }
        if(isset($_REQUEST['submit'])){
            $id=$_REQUEST['id'];
            $qry="select * from empdetails where Empid='$id'";
            $res=mysqli_query($conn,$qry);
            while($result= mysqli_fetch_assoc($res)){
                ?>
                <form action="" method="post">
                    employeee id : <input type="number" class="id" name="id" value="<?php echo $result['Empid'] ?>"><br><br>
                    Employee name : <input type="text" class="name" name="name" value="<?php echo $result['Empname'] ?>"><br><br>
                    employee salary : <input type="number" class="salary" name="salary" value="<?php echo $result['Salary'] ?>"><br><br>
                    <button type="submit" name="submit1" id="submit">Submit</button>
                </form>
                <?php
                
                
        }
        
            
            
        }
        if(isset($_REQUEST['submit1'])){
            $id=$_REQUEST['id'];
            $salary=$_REQUEST['salary'];
            $name=$_REQUEST['name'];
            $qry="update empdetails set Empname='$name', Salary='$salary' where Empid= '$id'";
            if(mysqli_query($conn,$qry)){
                echo "Record updated successfully";
            }else{
                echo "Record not updated ".mysqli_error($conn);
            }
        }
    ?>
</body>
</html>
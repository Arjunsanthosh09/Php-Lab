<!-- 4. Develop a PHP program to accept the ‘Employee’ details (Empid, Empname, Emptype)
through form elements and display the contents. -->

create database  Employee100;
use Employee100;
create table details(Empid int primary key, Empname varchar(20), Emptype varchar(20));

<html>
<head>
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        <h1>Enter the values to insert</h1><br>
        Employee id : <input type="number" id="id" name="id"><br><br>
        Name  : <input type="text" id="name" name="name"><br><br>
        Employee Type : <input type="text" id="type" name="type"><br><br>
        <button type="submit" name="submit" id="submit">Submit</button>
        
    </form>
    <?php
        $conn= mysqli_connect("localhost", "root", "","Employee100");
        if(!$conn){
            die("error connecting the database...".mysqli_connect_error());
            
        }else{
            if(isset($_REQUEST['submit'])){
                $id=$_REQUEST['id'];
                $name=$_REQUEST['name'];
                $type=$_REQUEST['type'];
                $insertqry="insert into details values($id,'$name','$type') ";
                mysqli_query($conn, $insertqry);
                echo "<h2>record Inserted succesfully</h2>";
            }
            
            echo "<h2>Values in the table is <br></h2>";
            
            $selct="SELECT * FROM details";
            $res= mysqli_query($conn, $selct);
            
            echo "<table border=1px>";
            echo "<tr>";
                echo "<th>Employee ID :</th>";
                echo "<th>Name :</th>";
                echo "<th>Employee Type  :</th>";    
            echo "</tr>";
            while($result= mysqli_fetch_assoc($res)){
                echo "<tr>";
                    echo "<td>".$result['Empid']."</td>";
                    echo "<td>".$result['Empname']."</td>";
                    echo "<td>".$result['Emptype']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    
    ?>
</body>
</html>
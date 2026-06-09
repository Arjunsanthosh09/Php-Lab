<!-- 2. Develop a PHP program to accept the ‘student’ details (Rollno, Name, Course) through
form elements and display the contents. -->

CREATE DATABASE IF NOT EXISTS Student100;
use Student100;
create table details(rollno int primary key, name varchar(20), course varchar(20));

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        <h1>Enter the values to insert</h1><br>
        Rollno : <input type="number" id="rollno" name="rollno"><br><br>
        Name  : <input type="text" id="name" name="name"><br><br>
        Course : <input type="text" id="course" name="course"><br><br>
        <button type="submit" name="submit" id="submit">Submit</button>
        
    </form>
    <?php
        $conn= mysqli_connect("localhost", "root", "","Student100");
        if(!$conn){
            die("error connecting the database...".mysqli_connect_error());
            
        }else{
            if(isset($_REQUEST['submit'])){
                $id=$_REQUEST['rollno'];
                $name=$_REQUEST['name'];
                $course=$_REQUEST['course'];
                $insertqry="insert into details values($id,'$name','$course') ";
                mysqli_query($conn, $insertqry);
                echo "<h2>record Inserted succesfully</h2>";
            }
            
            echo "<h2>Values in the table is <br></h2>";
            
            $selct="SELECT * FROM details";
            $res= mysqli_query($conn, $selct);
            
            echo "<table border=1px>";
            echo "<tr>";
                echo "<th>Roll no :</th>";
                echo "<th>Name :</th>";
                echo "<th>Course  :</th>";    
            echo "</tr>";
            while($result= mysqli_fetch_assoc($res)){
                echo "<tr>";
                    echo "<td>".$result['rollno']."</td>";
                    echo "<td>".$result['name']."</td>";
                    echo "<td>".$result['course']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    
    ?>
</body>
</html>
<!-- 1.	Develop a PHP program to accept the ‘student’ details (Rollno, Name, Subject, Mark). 
Perform edit operation of the mark of a particular student. -->

create database  if not exist student32;
use student32;
create table details(Rollno int primary key, Name varchar(20), Subject varchar(20), Mark int);
insert into details values(1, 'Arjun Santhosh', 'Math', 85);
insert into details values(2, 'Gowtham thulasi', 'Science', 90);
insert into details values(3, 'Anjali Suresh', 'Science', 95);
insert into details values(4, 'Karthik', 'Science', 95);


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "student32");
    if (!$conn) {
        die("error connecting to the database " . mysqli_connect_error());
    } else {
        if (isset($_REQUEST['update'])) {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $subject = $_REQUEST['subject'];
            $mark = $_REQUEST['mark'];
            $updatequery = "UPDATE details SET Name='$name', Subject='$subject', Mark='$mark' where Rollno=$id";
            mysqli_query($conn, $updatequery);
            echo "<script>alert('Record Updated Successfully');</script>";
        }
        $selectquery = "SELECT * FROM details";
        $res = mysqli_query($conn, $selectquery);
        echo "<table border=1px>";
        echo "<tr>";
        echo "<th>RollNo</th>";
        echo "<th>Name</th>";
        echo "<th>Subject</th>";
        echo "<th>Mark</th>";
        echo "<th>action</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $row['Rollno'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Subject'] . "</td>";
            echo "<td>" . $row['Mark'] . "</td>";
            echo "<td> <a href=?edit=" . $row['Rollno'] . ">Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        if (isset($_REQUEST['edit'])) {
            $id = $_REQUEST['edit'];
            $editquery = "SELECT * FROM details where Rollno =$id";
            $qry = mysqli_query($conn, $editquery);
            $data = mysqli_fetch_assoc($qry);
            ?>
            <h1>Update Data</h1>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $data['Rollno'] ?>"><br><br>
                Name : <input type="text" name="name" value="<?php echo $data['Name'] ?>"><br><br>
                Subject : <input type="text" name="subject" value="<?php echo $data['Subject'] ?>"><br><br>
                Mark : <input type="text" name="mark" value="<?php echo $data['Mark'] ?>"><br><br>
                <input type="submit" name="update" value="Update">
            </form>
            <?php
        }
    }

    ?>
</body>

</html>
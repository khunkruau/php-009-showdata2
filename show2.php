<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลจากฐานข้อมูล โดยการค้นหา</title>
</head>
<body>
    <form action='show2.php' method='post'>
     ป้อนชื่อที่ต้องการ : <input type='text' name='txtserh'> <input type='submit' value='ค้นหา'>
    </form>
<?php
    $serh =  $_POST["txtserh"];

    $servername = "localhost";
    $username = "root";
    $password = "11111111";
    $dbname = "teach511";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //else {
    //    echo "Connected successfully";
    //} 
?>
    <center>
        <b>ข้อมูลนักเรียน ม.5/พ ปีการศึกษา 2566</b>
        <table width='50%' border='1' cellspacing='0'>
        <tr align='center'><td width='10%'>เลขที่</td><td width='15%'>รหัสประจำตัว</td><td>ชื่อ-นามสกุล</td><td width='10%'>เกรดเฉลี่ย</td><td width='10%'>อายุ</td></tr>
        <?php
            $sql="SELECT * FROM mystudent WHERE fname LIKE '%$serh%'ORDER BY idindex";
            $result = mysqli_query($conn,$sql);
            while ($rs = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
            {
        ?>
            <tr><td align='center'><?php echo $rs["idindex"]; ?></td><td align='center'><?php echo $rs["idstd"]; ?></td><td><?php echo $rs["fname"]; ?>&nbsp;&nbsp;<?php echo $rs["lname"]; ?></td><td align='center'><?php echo $rs["gpa"]; ?></td><td align='center'><?php echo $rs["age"]; ?></td></tr>
        <?php
            }
        ?>
        </table>
    </center>
</body>
</html>
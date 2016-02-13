<?php
session_start();
$usernam = $_SESSION['member_id'];
if(!isset($_SESSION['member_id'])){
    die("Please login first");//jika belum login jangan lanjut
}

if($_SESSION['membership_type']!="student"){
    die("You're not a student..!");
}
?>
<html>
<head>
<title>MMU Room Booking System</title>
<link rel="stylesheet" href="style2.css" type="text/css" />
</head>
<body>
  <p align="right"><font size="6" face="Georgia" color="#000000">
  <a href="student_records.php">Booking Records</a></font></p>
  <p align="right"><font size="6" face="Georgia" color="#000000">
  <a href="logout.php">Log Out</a></font></p>
        <?php

            require 'db_connect.php';

            $r = mysql_query('SELECT distinct room_nums,room_type FROM room WHERE room_nums=1
            union
            SELECT distinct room_nums,room_type FROM room WHERE room_nums=3
            union
            SELECT distinct room_nums,room_type FROM room WHERE room_nums=5');
        ?>
        <center>
        <form name="get_roomid" action="student_page.php" method="post" >
          <table align="center" width="30%" border="0">
          <p align="center"><font size="7" face="Georgia" color="#000000">
          Member Register</font></p>
          <tr>
          <td><input type="text" name="userid" value="<?php echo htmlspecialchars($usernam); ?>" readonly="" /></td>
          </tr>
          <tr>
          <td>
            <div id='room_type_container'>
                <select name='room_type' onchange="window.loadrid()" required>
                    <option value='' selected="selected">Select Room Type</option>
                    <?php while($row = mysql_fetch_assoc($r)): ?>
                    <option value='<?php echo $row["room_nums"]?>'><?php echo $row['room_type']?></option>
                    <?php endwhile; ?>
                </select>
            </div>
          </td>
          </tr>
          <tr>
          <td>
            <div id='room_id_container'></div>
            <div style="clear: both"></div></td>
            </tr>
            <tr>
            <td>
            <button type="submit" name="submit" action="student_page.php">NEXT</button>
          </td>
          </tr>
          </table>
        </form>
        </center>
        <!-- SCRIPTS -->
        <script>function loadrid(){

            var formName = 'get_roomid';
            var rtype = document[formName]['room_type'].value;

            var xmlhttp = null;
            if(typeof XMLHttpRequest != 'udefined'){
                xmlhttp = new XMLHttpRequest();
            }else if(typeof ActiveXObject != 'undefined'){
                xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
            }else
                throw new Error('You browser doesn\'t support ajax');

            xmlhttp.open('GET', 'student_load_roomid.php?room_type='+rtype, true);
            xmlhttp.onreadystatechange = function (){
                if(xmlhttp.readyState == 4)
                    window.insertstates(xmlhttp);
            };
            xmlhttp.send(null);
        }

        function insertstates(xhr){
            if(xhr.status == 200){
                document.getElementById('room_id_container').innerHTML = xhr.responseText;
            }else
                throw new Error('Server has encountered an error\n'+
                                 'Error code = '+xhr.status);
        }
</script>
    </body>
</html>

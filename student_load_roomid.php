<?php
session_start();
if(!isset($_SESSION['member_id'])){
    die("Please login first");//jika belum login jangan lanjut
}

if($_SESSION['membership_type']!="student"){
    die("You're not a student..!");
}
?>
<?php
    require 'db_connect.php';

    if(isset($_GET['room_type']))
    {
        $c = $_GET['room_type'];
        $rid = '';

        $r = mysql_query("SELECT `room_id` FROM room WHERE room_nums='$c'");

        while($row = mysql_fetch_assoc($r))
        {
            $rid .= '<option value="'.$row['room_id'].'">'.$row['room_id'].'</option>';
        }

        if($rid == '')
            echo '';
        else
            echo '<select name="rid"><option disabled>Select Room ID</option>'.$rid.'</select>';
    }

?>

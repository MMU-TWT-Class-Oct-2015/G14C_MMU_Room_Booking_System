<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    die("Please login first");
}
?>
<html>
<head>
<title>MMU Room Booking System</title>
<link rel="stylesheet" href="style2.css" type="text/css" />
</head>
<body>
  <?php

      require 'db_connect.php';

      $r = mysql_query('SELECT distinct membership_type,member_id FROM member');
      $id = mysql_query("SELECT distinct membership_type FROM member");
  ?>
<center>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="admin_page.php">HOME</a></font></p>
	<p align="right"><font size="6" face="Georgia" color="#000000">
	<a href="logout.php">LOG OUT</a></font></p>
  <form name="get_roomid" action="update_member.php" method="post" >
    <table align="center" width="30%" border="0">
    <p align="center"><font size="7" face="Georgia" color="#000000">
    Update Member</font></p>
    <tr>
    <td>
      <div id='membership_type_container'>
          <select name='membership_type' onchange="window.loadrid()" required>
              <option value="" selected="selected">Select Membership Type</option>
              <?php while($row = mysql_fetch_assoc($id)): ?>
              <option value='<?php echo $row["membership_type"]?>'><?php echo $row['membership_type']?></option>
              <?php endwhile; ?>
          </select>
      </div>
    </td>
    </tr>
    <tr>
    <td>
      <div id='member_id_container'></div>
      <div style="clear: both"></div></td>
      </tr>
      <tr>
      <td>
      <button type="submit" name="submit" action="">NEXT</button>
    </td>
    </tr>
    </table>
  </form>
  </center>
  <!-- SCRIPTS -->
  <script>function loadrid(){

      var formName = 'get_roomid';
      var rtype = document[formName]['membership_type'].value;

      var xmlhttp = null;
      if(typeof XMLHttpRequest != 'udefined'){
          xmlhttp = new XMLHttpRequest();
      }else if(typeof ActiveXObject != 'undefined'){
          xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
      }else
          throw new Error('You browser doesn\'t support ajax');

      xmlhttp.open('GET', 'p.php?membership_type='+rtype, true);
      xmlhttp.onreadystatechange = function (){
          if(xmlhttp.readyState == 4)
              window.insertstates(xmlhttp);
      };
      xmlhttp.send(null);
  }

  function insertstates(xhr){
      if(xhr.status == 200){
          document.getElementById('member_id_container').innerHTML = xhr.responseText;
      }else
          throw new Error('Server has encountered an error\n'+
                           'Error code = '+xhr.status);
  }
</script>
</body>
</html>

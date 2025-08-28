<?php
                        include 'connect.php';
                        mysql_select_db($dbname);
               
                $query=  mysql_query("select * from news order by dop asc") or die(mysql_error());
                $numrows=mysql_num_rows($query);
                 echo '<p><font size="4" color=green;>Top 5 recent news</font></p>';
                for($i=0;$i<=5;$i++){
                       while( $result=  mysql_fetch_assoc($query)){
                           $url=$result['url'];
                           $content=$result['contetnt'];
                           $date=$result['dop'];
                           $showdate=date("l/F/Y h:i:s", $date);
                           $post=$result['postedby'];
                           $title=$result['newstitle'];
                           $newspicture=$result['newspictures'];
                           $dbid=$result['id'];
                            
    echo '<p><a href="newsview1.php?nn='.$result['newstitle'].'"><font size="2"face="UNDERGRO">&#149 &nbsp&nbsp&nbsp'.$title.'</p></font></a>';
    
                       } }?>&nbsp;</td>
          </tr>
           <tr>
            <td height=8><img height=1 alt="" src="Comen Page_files/spacer.gif"
            width=1 border=0></td>
          </tr>
          <tr>
            <td class=border><!-- SERVICES LINKS TABLE STARTS HERE-->
                <table width=248 border=0 cellpadding=0 cellspacing=0 background="Comen Page_files/bg-services-link.jpg">
                  <tbody>
                    <tr>
                      <td><img height=25 alt=""
                  src="Comen Page_files/img-services.jpg" width=248
              border=0></td>
                    </tr>
                    <tr>
                      <td class=bgservices-link valign=top align=right height=193><!-- LEFT NAVIGATION TABLE STARTS HERE-->
                          <table cellspacing=0 cellpadding=4 width=225 border=0>
                            <tbody>
                              <tr>
                                <td class=l-link valign=bottom height=32>&raquo;&nbsp;&nbsp;<a href="Constraction.html"><strong><font color="#000000">Construction</font></strong></a></td>
                              </tr>
                              <tr>
                                <td class=l-link valign=bottom >&raquo;&nbsp;&nbsp;<a href="House Rent.html"><strong><font color="#000000"">House and Machinery
                                <TD
          height=4 colspan="2"
          background="About Us  Tigray Housing Development Agency Comen Page_files/heading-bg.jpg">
            <table width="680" border="0">
              <tr>
                <td  valign="baseline">          
  <?php
session_start();
require('connect.php');    
@$username=$_POST['username'];
@$password=$_POST['password'];
if(@$_POST['submit']){
if($username && $password){
    
    mysql_select_db($dbname);
    $query=mysql_query("select * from user where username='$username'" ) or die(mysql_error());
      
    $numrows=@mysql_num_rows($query);
             
    if($numrows!=0){
       
         while($rows=mysql_fetch_assoc($query)){
       $dbusername=$rows['username'];  
       $dbpassword=$rows['password'];
       $dbfirstname=$rows['firstname'];
       $dbstatus=$rows['status'];
       $dblastname=$rows['lastname'];
        $dbphoto=$rows['photo'];
        $dbdob=$rows['dob'];
        $dbgender=$rows['gender'];
  }
     if(md5($password)==$dbpassword && $username==$dbusername ){
        
    $_SESSION['username']=$dbusername;
    $_SESSION['firstname']=$dbfirstname;
    $_SESSION['lastname']=$dblastname;
    $_SESSION['status']=$dbstatus;
     $_SESSION['photo']=$dbphoto;
     $_SESSION['dob']=$dbdob;
     $_SESSION['gender']=$dbgender;
     
     $numfields=mysql_num_fields($query);
   
    
        if($dbstatus=="admin"){echo '   <div id="board-top"></div>
<div id="board">
<div class="board-in">';
            $_SESSION['admin']=$username;
            echo 'you are log in as&nbsp<font face="verdana"size="4">'.$_SESSION['status'].'</font><br><hr>';
            echo 'Well come&nbsp'.$_SESSION['admin'].'<br />';
            
            echo '<a href="adminhome1.php">click here</a>to do administratve job';
           echo ' </div>
                            </div>
                            <div id="board-bottom"></div>';
            }
            
        else if($dbstatus=="manager"){
         echo '   <div id="board-top"></div>
<div id="board">
<div class="board-in">';
            $_SESSION['manager']=$username;
             echo 'you are log in as segenat&nbsp<font face="verdana"size="4">'.$_SESSION['status'].'</font><br><hr>';
            echo 'Well come &nbsp '.$_SESSION['firstname'].'&nbsp<br><br />';
            
       
            echo '<a href="managerhome1.php?id='.$_SESSION['manager'].'">click here</a> to do managers job<br><br />';
             echo '<img src="'.$_SESSION['photo'].'"width="70%"align="right"><br>';
        echo ' </div>
                            </div>
                            <div id="board-bottom"></div>'; }
                            else{ echo '   <div id="board-top"></div>
<div id="board">
<div class="board-in">';
         
     echo 'you are loged in as&nbsp<blink>'.$_SESSION['username'].'</blink><br><br>';  
    echo 'Hello &nbsp'.$_SESSION['firstname'];
    echo '&nbsp<a href="user1.php">Click</a>here to get your member page';
echo '<div align="left"><img src="'.$_SESSION['photo'].'"width="70%"align="right"></div><br>';
  
  echo ' </div>
                            </div>
                            <div id="board-bottom"></div>';    
    }}
     else{
         echo '<blink><font size="3" color="red">your passsword or username is incorect!</font></blink>';
         echo '  <div id="mid2">
                            
<h2>Members<span>Login</span></h2>
<form  action="login1.php" method="post">
<input type="text" name="username" class="txtBox" value="-Enter your name-" />
<input type="password" name="password" class="txtBox" value="-Your Password-" />
<input type="submit" name="submit" value="Login" class="go" />
<label class="yellow"><a href="registration1.php" class="register">Want To Register
?</a></label>
<br class="spacer" />
</form>
<p class="memberBottom"></p>
<br class="spacer" />
</div>
            ';
     
    }}
else {
        echo '<blink><font size="3" color="red">That user does not exist</font></blink>';
        echo '  <div id="mid2">
                            
<h2>Members<span>Login</span></h2>
<form  action="login1.php" method="post">
<input type="text" name="username" class="txtBox" value="-Enter your name-" />
<input type="password" name="password" class="txtBox" value="-Your Password-" />
<input type="submit" name="submit" value="Login" class="go" />
<label class="yellow"><a href="registration1.php" class="register">Want To Register ?</a></label>
<br class="spacer" />
</form>
<p class="memberBottom"></p>
<br class="spacer" />
            
</div>

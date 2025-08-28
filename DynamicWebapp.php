&lt;?php
include &#39;connect.php&#39;;
mysql_select_db($dbname);

$query= mysql_query(&quot;select * from news order by dop asc&quot;) or
die(mysql_error());
$numrows=mysql_num_rows($query);
echo &#39;&lt;p&gt;&lt;font size=&quot;4&quot; color=green;&gt;Top 5 recent news&lt;/font&gt;&lt;/p&gt;&#39;;
for($i=0;$i&lt;=5;$i++){

while( $result= mysql_fetch_assoc($query)){
$url=$result[&#39;url&#39;];
$content=$result[&#39;contetnt&#39;];
$date=$result[&#39;dop&#39;];
$showdate=date(&quot;l/F/Y h:i:s&quot;, $date);
$post=$result[&#39;postedby&#39;];
$title=$result[&#39;newstitle&#39;];
$newspicture=$result[&#39;newspictures&#39;];
$dbid=$result[&#39;id&#39;];

echo &#39;&lt;p&gt;&lt;a href=&quot;newsview1.php?nn=&#39;.$result[&#39;newstitle&#39;].&#39;&quot;&gt;&lt;font
size=&quot;2&quot;face=&quot;UNDERGRO&quot;&gt;&amp;#149 &amp;nbsp&amp;nbsp&amp;nbsp&#39;.$title.&#39;&lt;/p&gt;&lt;/font&gt;&lt;/a&gt;&#39;;

} }?&gt;&amp;nbsp;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td height=8&gt;&lt;img height=1 alt=&quot;&quot; src=&quot;Comen Page_files/spacer.gif&quot;
width=1 border=0&gt;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td class=border&gt;&lt;!-- SERVICES LINKS TABLE STARTS HERE--&gt;
&lt;table width=248 border=0 cellpadding=0 cellspacing=0 background=&quot;Comen
Page_files/bg-services-link.jpg&quot;&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td&gt;&lt;img height=25 alt=&quot;&quot;
src=&quot;Comen Page_files/img-services.jpg&quot; width=248
border=0&gt;&lt;/td&gt;

&lt;/tr&gt;
&lt;tr&gt;
&lt;td class=bgservices-link valign=top align=right height=193&gt;&lt;!-- LEFT
NAVIGATION TABLE STARTS HERE--&gt;
&lt;table cellspacing=0 cellpadding=4 width=225 border=0&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td class=l-link valign=bottom height=32&gt;&amp;raquo;&amp;nbsp;&amp;nbsp;&lt;a
href=&quot;Constraction.html&quot;&gt;&lt;strong&gt;&lt;font
color=&quot;#000000&quot;&gt;Construction&lt;/font&gt;&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td class=l-link valign=bottom &gt;&amp;raquo;&amp;nbsp;&amp;nbsp;&lt;a
href=&quot;House Rent.html&quot;&gt;&lt;strong&gt;&lt;font color=&quot;#000000&quot;&quot;&gt;House and Machinery
&lt;TD
height=4 colspan=&quot;2&quot;
background=&quot;About Us Tigray Housing Development Agency Comen
Page_files/heading-bg.jpg&quot;&gt;
&lt;table width=&quot;680&quot; border=&quot;0&quot;&gt;
&lt;tr&gt;
&lt;td valign=&quot;baseline&quot;&gt;
&lt;?php
session_start();
require(&#39;connect.php&#39;);
@$username=$_POST[&#39;username&#39;];
@$password=$_POST[&#39;password&#39;];
if(@$_POST[&#39;submit&#39;]){
if($username &amp;&amp; $password){

mysql_select_db($dbname);
$query=mysql_query(&quot;select * from user where username=&#39;$username&#39;&quot; ) or
die(mysql_error());

$numrows=@mysql_num_rows($query);

if($numrows!=0){

while($rows=mysql_fetch_assoc($query)){
$dbusername=$rows[&#39;username&#39;];
$dbpassword=$rows[&#39;password&#39;];
$dbfirstname=$rows[&#39;firstname&#39;];
$dbstatus=$rows[&#39;status&#39;];
$dblastname=$rows[&#39;lastname&#39;];
$dbphoto=$rows[&#39;photo&#39;];
$dbdob=$rows[&#39;dob&#39;];
$dbgender=$rows[&#39;gender&#39;];
}
if(md5($password)==$dbpassword &amp;&amp; $username==$dbusername ){

$_SESSION[&#39;username&#39;]=$dbusername;
$_SESSION[&#39;firstname&#39;]=$dbfirstname;
$_SESSION[&#39;lastname&#39;]=$dblastname;
$_SESSION[&#39;status&#39;]=$dbstatus;
$_SESSION[&#39;photo&#39;]=$dbphoto;
$_SESSION[&#39;dob&#39;]=$dbdob;
$_SESSION[&#39;gender&#39;]=$dbgender;

$numfields=mysql_num_fields($query);

if($dbstatus==&quot;admin&quot;){echo &#39; &lt;div id=&quot;board-top&quot;&gt;&lt;/div&gt;

&lt;div id=&quot;board&quot;&gt;
&lt;div class=&quot;board-in&quot;&gt;&#39;;
$_SESSION[&#39;admin&#39;]=$username;
echo &#39;you are log in as&amp;nbsp&lt;font
face=&quot;verdana&quot;size=&quot;4&quot;&gt;&#39;.$_SESSION[&#39;status&#39;].&#39;&lt;/font&gt;&lt;br&gt;&lt;hr&gt;&#39;;
echo &#39;Well come&amp;nbsp&#39;.$_SESSION[&#39;admin&#39;].&#39;&lt;br /&gt;&#39;;

echo &#39;&lt;a href=&quot;adminhome1.php&quot;&gt;click here&lt;/a&gt;to do administratve job&#39;;
echo &#39; &lt;/div&gt;
&lt;/div&gt;
&lt;div id=&quot;board-bottom&quot;&gt;&lt;/div&gt;&#39;;
}

else if($dbstatus==&quot;manager&quot;){
echo &#39; &lt;div id=&quot;board-top&quot;&gt;&lt;/div&gt;
&lt;div id=&quot;board&quot;&gt;
&lt;div class=&quot;board-in&quot;&gt;&#39;;
$_SESSION[&#39;manager&#39;]=$username;
echo &#39;you are log in as segenat&amp;nbsp&lt;font
face=&quot;verdana&quot;size=&quot;4&quot;&gt;&#39;.$_SESSION[&#39;status&#39;].&#39;&lt;/font&gt;&lt;br&gt;&lt;hr&gt;&#39;;
echo &#39;Well come &amp;nbsp &#39;.$_SESSION[&#39;firstname&#39;].&#39;&amp;nbsp&lt;br&gt;&lt;br /&gt;&#39;;

echo &#39;&lt;a href=&quot;managerhome1.php?id=&#39;.$_SESSION[&#39;manager&#39;].&#39;&quot;&gt;click here&lt;/a&gt;
to do managers job&lt;br&gt;&lt;br /&gt;&#39;;
echo &#39;&lt;img src=&quot;&#39;.$_SESSION[&#39;photo&#39;].&#39;&quot;width=&quot;70%&quot;align=&quot;right&quot;&gt;&lt;br&gt;&#39;;
echo &#39; &lt;/div&gt;
&lt;/div&gt;
&lt;div id=&quot;board-bottom&quot;&gt;&lt;/div&gt;&#39;; }
else{ echo &#39; &lt;div id=&quot;board-top&quot;&gt;&lt;/div&gt;
&lt;div id=&quot;board&quot;&gt;
&lt;div class=&quot;board-in&quot;&gt;&#39;;

echo &#39;you are loged in as&amp;nbsp&lt;blink&gt;&#39;.$_SESSION[&#39;username&#39;].&#39;&lt;/blink&gt;&lt;br&gt;&lt;br&gt;&#39;;
echo &#39;Hello &amp;nbsp&#39;.$_SESSION[&#39;firstname&#39;];
echo &#39;&amp;nbsp&lt;a href=&quot;user1.php&quot;&gt;Click&lt;/a&gt;here to get your member page&#39;;
echo &#39;&lt;div align=&quot;left&quot;&gt;&lt;img
src=&quot;&#39;.$_SESSION[&#39;photo&#39;].&#39;&quot;width=&quot;70%&quot;align=&quot;right&quot;&gt;&lt;/div&gt;&lt;br&gt;&#39;;

echo &#39; &lt;/div&gt;
&lt;/div&gt;
&lt;div id=&quot;board-bottom&quot;&gt;&lt;/div&gt;&#39;;
}}
else{
echo &#39;&lt;blink&gt;&lt;font size=&quot;3&quot; color=&quot;red&quot;&gt;your passsword or username is
incorect!&lt;/font&gt;&lt;/blink&gt;&#39;;
echo &#39; &lt;div id=&quot;mid2&quot;&gt;

&lt;h2&gt;Members&lt;span&gt;Login&lt;/span&gt;&lt;/h2&gt;

&lt;form action=&quot;login1.php&quot; method=&quot;post&quot;&gt;

&lt;input type=&quot;text&quot; name=&quot;username&quot; class=&quot;txtBox&quot; value=&quot;-Enter your name-&quot; /&gt;
&lt;input type=&quot;password&quot; name=&quot;password&quot; class=&quot;txtBox&quot; value=&quot;-Your Password-&quot; /&gt;
&lt;input type=&quot;submit&quot; name=&quot;submit&quot; value=&quot;Login&quot; class=&quot;go&quot; /&gt;
&lt;label class=&quot;yellow&quot;&gt;&lt;a href=&quot;registration1.php&quot; class=&quot;register&quot;&gt;Want To Register
?&lt;/a&gt;&lt;/label&gt;

&lt;br class=&quot;spacer&quot; /&gt;
&lt;/form&gt;
&lt;p class=&quot;memberBottom&quot;&gt;&lt;/p&gt;
&lt;br class=&quot;spacer&quot; /&gt;

&lt;/div&gt;
&#39;;

}}
else {
echo &#39;&lt;blink&gt;&lt;font size=&quot;3&quot; color=&quot;red&quot;&gt;That user does not exist&lt;/font&gt;&lt;/blink&gt;&#39;;
echo &#39; &lt;div id=&quot;mid2&quot;&gt;

&lt;h2&gt;Members&lt;span&gt;Login&lt;/span&gt;&lt;/h2&gt;
&lt;form action=&quot;login1.php&quot; method=&quot;post&quot;&gt;
&lt;input type=&quot;text&quot; name=&quot;username&quot; class=&quot;txtBox&quot; value=&quot;-Enter your name-&quot; /&gt;
&lt;input type=&quot;password&quot; name=&quot;password&quot; class=&quot;txtBox&quot; value=&quot;-Your Password-&quot; /&gt;
&lt;input type=&quot;submit&quot; name=&quot;submit&quot; value=&quot;Login&quot; class=&quot;go&quot; /&gt;
&lt;label class=&quot;yellow&quot;&gt;&lt;a href=&quot;registration1.php&quot; class=&quot;register&quot;&gt;Want To Register
?&lt;/a&gt;&lt;/label&gt;

&lt;br class=&quot;spacer&quot; /&gt;
&lt;/form&gt;
&lt;p class=&quot;memberBottom&quot;&gt;&lt;/p&gt;
&lt;br class=&quot;spacer&quot; /&gt;

&lt;/div&gt;

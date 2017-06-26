<?php
error_reporting(0);
set_time_limit(0);
echo '<html>
<head>
<title>Defaced Site Checker</title>
<style type="text/css">
   * { margin:0;}
   body { background:#000000 ) no-repeat 50% 50%;background-attachment: fixed;color:white;margin:0; font-family: Palatino Linotype;}
   .style1 { color: #FFFFFF;font-family: "Arial Rounded MT Bold";text-align: center;font-size: 50px; }
   .style2 { background: rgba(0,0,0,0.6);color: white;font-size: 13px;width:650px;}
   .main {font-family: Palatino Linotype;font-size: 35pt;text-shadow: 0 0 6px #FF0000, 0 0 5px #FF0000, 0 0 5px #FF0000;color: #FFF}
   h1 span {font-size:45px;}
   .even {background-color: rgba(25, 25, 25, 0.8);} .odd {background-color: rgba(150, 150, 150, 0.8);}
   .green {color:#00FF00;font-weight:bold;} .red {color:#FF0000;font-weight:bold;}
   a{color:#fff;text-decoration:none;}
   .hid {text-align:center;background-color: rgba(150, 150, 150, 0.8);margin:0 auto;width:40%;font-weight:bold;}
   input[type="submit"],.box {padding:10px;background:rgba(0,0,0,0.6);color:grey;font-weight:bold;} input[type="submit"]:hover {color:#fff;}
   .box {width:626px;border:2px solid #fff;margin:0 auto;border-top:none;}
</style>
</head><body>
   <div style="background: rgba(0,0,0,0.5);text-align: center;"><br />
   <div class="main">Team IHC<br /><span>Websites Defaced Or Not Checker</span></div><br/>
   <form method="post" action="">
   <center><table class="style2"><tr><td>Site List: </td><td><textarea name="domain" cols="80" rows="15" class="style2"></textarea></td>
</tr>
<tr><td>Text: </td><td><input name="text" value="3xp1r3" size="20" class="style2"></td>
</tr><tr></table>
       <br />
       <input type="submit" name="submit" value="!!! Check !!!"/>
   </form></center><br />';
    if(isset($_POST['submit'])) {
      $text  = $_POST['text'];
        $items = explode("\n", trim($_POST['domain']));
        $items = array_unique(str_replace('http://','',$items));
        $total = count($items);
        echo '<div class="hid">Total Domains = '.$total.'</div><br />';
            echo '<h3 class="hid">Checking Defaced sites</h3>';
            echo '<table style="width:40%;margin:0 auto;">';
            $j = 1;
            $dc = 0;
            $sites = array();
            foreach($items as $s) {
                $data = file_get_contents('http://'.trim($s));
                $cond = strpos($data, $text);
                $cls = ($j % 2 == 0) ? 'class="even"' : 'class="odd"';
                if($cond !== false){ echo '<tr '.$cls.'><td><a href="http://'.$s.'" target="_blank">http://'.$s.'</a></td><td><span class="green">DEFACED</span></td></tr>'; $sites[] = trim($s); $dc++;
                } else { echo '<tr '.$cls.'><td>http://'.$s.'</td><td><span class="red">Failed!</span></td></tr>'; }
                $j++;
            }
            echo '</table><br />';
            $total = $dc;
            echo '<h3 class="hid">Total Defaced = '.$total.'</h3><br />';
            }
echo '</div><div style="background: rgba(0,0,0,0.5);font-family: Century Gothic;text-align: center;padding: 7px 0;font-size:20px;text-shadow: grey 1px -0px 6px;">CODED By : <b>rEd X</b><br />
&copy; <b>Team IHC.</b>. All rights reserved.</div>
</body></html>';
?>
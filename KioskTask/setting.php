
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>SettingPage.html</title>
 <link rel="stylesheet"
  href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
<script>               
  function sendTracking(value)
  {
      if(!value)
       Value="NOTSET";
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.open("GET","http://localhost:8090?track="+value+"&ts="+new Date().getTime(),true);
       xmlhttp.send();
  }
    
</script>
 <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
    
 <style type = "text/css">
 #foot {
  font-size: 75%;
  font-style: italic;
  text-align: center;
 }
 pre {
  margin-left: auto;
  margin-right: auto;
  background-color: white;
  width: 8em;
 }

 
 .ui-header {
   background-color: #f47822;
  background-image: none;
  color: #000;
}

 .customfoot {
  z-index: 9999999999999;
    position: absolute;
    bottom: 20px;
    left: 15px;
	width:100%;
}
.headerbottom
{
padding-top:20px;
padding-bottom:20px;
 background-color: #000000;
  color: #ffffff;
}

.btnIco {
  -webkit-border-radius: 11;
  -moz-border-radius: 11;
  border-radius: 11px;
  -webkit-box-shadow: 1px 1px 3px #666666;
  -moz-box-shadow: 1px 1px 3px #666666;
  box-shadow: 1px 1px 3px #666666;
  font-family: Arial;
  color: #000000;
  font-size: 20px;
  background: #ffffff;
  min-width: 150px;
  padding: 15px 50px 15px 100px;
  text-decoration: none;
}

.btnIco:hover {
  background: #f47822;
  text-decoration: none;
}


.btnFootSec {
  -webkit-border-radius: 11;
  -moz-border-radius: 11;
  border-radius: 11px;
  -webkit-box-shadow: 1px 1px 3px #666666;
  -moz-box-shadow: 1px 1px 3px #666666;
  box-shadow: 1px 1px 3px #666666;
  font-family: Arial;
  color: #f47822;
  font-size: 20px;
  background: #ffffff;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
 
 
.btnFootSec:hover {
  background: #f2cfb8;
  text-decoration: none;
}
 .ui-input-text{width:10%;display:block;margin-left: auto; margin-right: auto;}
 .ui-select{width:10%;display:block;float:none}
 .ui-submit{width:10%;display:block;position:relative}
 </style>  
</head>
<body>
    
    
 <div id="head"  data-role = "header">
  <h1><img src="logo.png"></h1>
 </div>
 <div id="content" data-role = "content" >
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            Candidate Number: 
            <input type="text" name="CandidateNumber" />
            <span class="error">* <?php echo $nameErr;?></span>
            <br />
            Condition: 
            <select name="Conditions">
            <option value="1">1</option>
            <option value="2">2</option>
            </select>
            <br />
            <input type="submit" value="Submit" />
     </form>
 </div>
    
</body>
</html>

<?php
$numERR = "";
$cddtnum = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["CandidateNumber"])) {
    $numErr = "Candidate number is required";
  } else {
    $cddtnum = test_input($_POST["CandidateNumber"]);
  }
//$cddtNum = $_POST["CandidateNumber"];
//$cddtNum = $num;
$condition = $_POST["Conditions"];
$filename = $cddtNum .'_' .$condition .'.txt';
$myfile = fopen($filename, "w") or die("Unable to create file!");
$txt = "Bill Gates\n";
fwrite($myfile, $txt);
$txt = "Steve Jobs\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
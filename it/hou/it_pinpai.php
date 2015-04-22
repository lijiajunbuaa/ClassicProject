<?php require_once('../Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE it_pinpai SET zonghe=%s, pinpai=%s, pinpaizhi=%s, xilie=%s, xiliezhi=%s, jibie=%s, zuidijia=%s, zuigaojia=%s, shangshinian=%s, kongjian=%s, dongli=%s, caokong=%s, youhao=%s, shushi=%s, waiguan=%s, xingjiabi=%s WHERE id=%s", 
  
  						GetSQLValueString(number_format(($_POST['kongjian']+$_POST['dongli']+$_POST['caokong']+$_POST['youhao']+$_POST['shushi']+$_POST['waiguan']+$_POST['xingjiabi'])/7,2),"text"),
                       GetSQLValueString($_POST['pinpai'], "text"),
                       GetSQLValueString($_POST['pinpaizhi'], "text"),
                       GetSQLValueString($_POST['xilie'], "text"),
                       GetSQLValueString($_POST['xiliezhi'], "text"),
                       GetSQLValueString($_POST['RadioGroup1'], "text"),
                       GetSQLValueString($_POST['zuidijia'], "text"),
                       GetSQLValueString($_POST['zuigaojia'], "text"),
                       GetSQLValueString($_POST['shangshinian'], "text"),
                       GetSQLValueString($_POST['kongjian'], "text"),
                       GetSQLValueString($_POST['dongli'], "text"),
                       GetSQLValueString($_POST['caokong'], "text"),
                       GetSQLValueString($_POST['youhao'], "text"),
                       GetSQLValueString($_POST['shushi'], "text"),
                       GetSQLValueString($_POST['waiguan'], "text"),
                       GetSQLValueString($_POST['xingjiabi'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "it_pinpai_pre.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$xilie=$_POST['xilie'];
mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM it_pinpai where xilie='$xilie'";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>it_pinpai</title>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
  <p>
    <label for="pinpai"></label>
    <label for="pinpaizhi"></label>
    <label for="xiliezhi"></label>
    <input name="id" type="hidden" id="id" value="<?php echo $row_Recordset1['id']; ?>" />
    <input name="pinpai" type="hidden" id="pinpai" value="<?php echo $row_Recordset1['pinpai']; ?>" />
    <input name="pinpaizhi" type="hidden" id="pinpaizhi" value="<?php echo $row_Recordset1['pinpaizhi']; ?>" />
    <input name="xilie" type="hidden" id="xilie" value="<?php echo $row_Recordset1['xilie']; ?>" />
    <input name="xiliezhi" type="hidden" id="xiliezhi" value="<?php echo $row_Recordset1['xiliezhi']; ?>" />
  </p>
  <p><?php echo $row_Recordset1['xilie']; ?>
    <label for="textfield"></label>
  </p>
  <div>
      级别:
        <label>
          <input type="radio" name="RadioGroup1" value="微型车" id="RadioGroup1_0" />
    微型车</label>
       
        <label>
          <input type="radio" name="RadioGroup1" value="小型车" id="RadioGroup1_1" />
          小型车</label>
      
        <label>
          <input type="radio" name="RadioGroup1" value="紧凑型车" id="RadioGroup1_2" />
          紧凑型车</label>
       
        <label>
          <input type="radio" name="RadioGroup1" value="中型车" id="RadioGroup1_3" />
          中型车</label>
       
        <label>
          <input type="radio" name="RadioGroup1" value="中大型车" id="RadioGroup1_4" />
          中大型车</label>
       
        <label>
          <input type="radio" name="RadioGroup1" value="豪华车" id="RadioGroup1_5" />
          豪华车</label>
       
        <label>
          <input type="radio" name="RadioGroup1" value="MPV" id="RadioGroup1_6" />
          MPV</label>
      
        <label>
          <input type="radio" name="RadioGroup1" value="SUV" id="RadioGroup1_7" />
          SUV</label>
      
        <label>
          <input type="radio" name="RadioGroup1" value="跑车" id="RadioGroup1_8" />
          跑车</label>	
  </div>
      <input type="text" name="zuidijia" id="zuidijia" />
      <input type="text" name="zuigaojia" id="zuigaojia" />
      
  <div>
    	上市年份：
    <select name="shangshinian" id="shangshinian">
           <option value="">全部</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
          </select>
  </div>
      <p>空间<input type="text" name="kongjian" id="kongjian" /><br/>
      动力<input type="text" name="dongli" id="dongli" /><br/>
      操控<input type="text" name="caokong" id="caokong" /><br/>
      油耗<input type="text" name="youhao" id="youhao" /><br/>
      舒适<input type="text" name="shushi" id="shushi" /><br/>
      外观<input type="text" name="waiguan" id="waiguan" /><br/>
      性价比<input type="text" name="xingjiabi" id="xingjiabi" />
      </p>
      <p>
        <input name="geng" type="submit" id="geng" onclick="MM_validateForm('xilie','','R','zuidijia','','R','zuigaojia','','R','kongjian','','R','dongli','','R','caokong','','R','youhao','','R','shushi','','R','waiguan','','R','xingjiabi','','R');return document.MM_returnValue" value="提交" />
        <br/>
      </p>
      <input type="hidden" name="MM_update" value="form1" />
</form>



</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

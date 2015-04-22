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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO it_car (车型, 款式, 厂商指导价, 厂商, 发动机, 变速箱, 长, 宽, 高, 车身结构, 最高车速, 官方加速, 实测加速, 实测制动, 实测油耗, 工信部综合油耗, 整车质保, 轴距, 前轮距, 后轮距, 最小离地间隙, 整备质量, 车门数, 座位数, 油箱容积, 系里厢容积, 发动机型号, 排量, 进气形式, 气缸数, 每缸气门数, 压缩比, 配气结构, 缸径, 行程, 最大马力, 最大功率, 最大功率转速, 最大扭矩, 最大扭矩转速, 发动机特有技术, 燃料形式, 燃油标号, 供油方式, 缸盖材料, 缸体材料, 环保标准, 电动机最大功率, 电动机最大扭矩, 电池支持, 电池容量, 简称, 挡位个数, 变速箱类型, 驱动方式, 四驱形式, 中央差速器结构, 前悬架类型, 后悬架类型, 助力类型, 车体结构, 前制动器类型, 后制动器类型, 驻车制动类型, 前轮胎规格, 后轮胎规格, 备胎规格, 主副驾驶座安全气囊, 前后排侧气囊, 前后排头部气囊, 膝部气囊, 胎压监测, 零胎压继续行驶, 安全带儿媳提示, ISOFIX儿童座椅, 发动机电子防盗, 车内中控锁, 遥控钥匙, 无钥匙启动系统, 无钥匙进入系统, ABS防抱死, 制动力分配, 刹车辅助, 牵引力控制, 车身稳定控制, 自动驻车, 陡坡缓降, 可变悬架, 空气悬架, 可变转向比, 钱桥限滑差速器, 中央差速器所致功能, 后前线滑差速器, 电动天窗, 全景天窗, 运动外观套件, 铝合金轮圈, 电动吸合门, 侧滑门, 电动后备箱, 真皮方向盘, 方向盘调节, 方向盘电动调节, 多功能方向盘, 方向盘换挡, 方向盘加热, 定速巡航, 前后驻车雷达, 打车视频影像, 行车电脑显示, HUD抬头数字, 真皮座椅, 运动风格座椅, 座椅高低调节, 腰部支撑调节, 肩部支撑调节, 主副驾驶座电动调节, 第二排靠背角度调节, 第二排座椅移动, 后排座椅电动调节, 电动座椅技艺, 前后排座椅加热, 前后排座椅通风, 前后排座椅按摩, 前排座椅放倒方式, 第三排座椅, 前后中央扶手, 后排杯架, GPS导航系统, 定位互动服务, 中控台彩色大屏, 内置硬盘, 蓝牙车载电话, 车载电视, 后排液晶屏, 外接音源接口, CD支持, 多媒体系统, 扬声器数量, 氙气大灯, LED大灯, 日间行车灯, 自动头灯, 转向头灯, 前雾灯, 大灯高度可调, 大灯清洗装置, 车内氛围灯, 前后电动车窗, 车窗放夹手功能, 防紫外线, 后视镜电动, 后视镜加热, 内外后视镜自动防眩目, 后视镜电动折叠, 后视镜技艺, 后风挡遮阳帘, 后排侧遮阳帘, 后排隐私玻璃, 遮阳板化妆镜, 后雨刷, 感应雨刷, 空调控制方式, 后排独立空调, 后座出风口, 温度分区控制, 车内空气调节, 车载冰箱, 自动泊车入围, 发动机启停, 并线辅助, 车道偏移, 主动刹车, 整体主动转向, 夜视系统, 中控液晶屏分屏, 自适应巡航, 全景摄像头) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['textfield'], "text"),
                       GetSQLValueString($_POST['textfield2'], "text"),
                       GetSQLValueString($_POST['textfield3'], "text"),
                       GetSQLValueString($_POST['textfield4'], "text"),
                       GetSQLValueString($_POST['textfield5'], "text"),
                       GetSQLValueString($_POST['textfield6'], "text"),
                       GetSQLValueString($_POST['textfield7'], "text"),
                       GetSQLValueString($_POST['textfield8'], "text"),
                       GetSQLValueString($_POST['textfield9'], "text"),
                       GetSQLValueString($_POST['textfield10'], "text"),
                       GetSQLValueString($_POST['textfield11'], "text"),
                       GetSQLValueString($_POST['textfield12'], "text"),
                       GetSQLValueString($_POST['textfield13'], "text"),
                       GetSQLValueString($_POST['textfield14'], "text"),
                       GetSQLValueString($_POST['textfield15'], "text"),
                       GetSQLValueString($_POST['textfield16'], "text"),
                       GetSQLValueString($_POST['textfield17'], "text"),
                       GetSQLValueString($_POST['textfield18'], "text"),
                       GetSQLValueString($_POST['textfield19'], "text"),
                       GetSQLValueString($_POST['textfield20'], "text"),
                       GetSQLValueString($_POST['textfield21'], "text"),
                       GetSQLValueString($_POST['textfield22'], "text"),
                       GetSQLValueString($_POST['textfield23'], "text"),
                       GetSQLValueString($_POST['textfield24'], "text"),
                       GetSQLValueString($_POST['textfield25'], "text"),
                       GetSQLValueString($_POST['textfield26'], "text"),
                       GetSQLValueString($_POST['textfield27'], "text"),
                       GetSQLValueString($_POST['textfield28'], "text"),
                       GetSQLValueString($_POST['textfield29'], "text"),
                       GetSQLValueString($_POST['textfield30'], "text"),
                       GetSQLValueString($_POST['textfield31'], "text"),
                       GetSQLValueString($_POST['textfield32'], "text"),
                       GetSQLValueString($_POST['textfield33'], "text"),
                       GetSQLValueString($_POST['textfield34'], "text"),
                       GetSQLValueString($_POST['textfield35'], "text"),
                       GetSQLValueString($_POST['textfield36'], "text"),
                       GetSQLValueString($_POST['textfield37'], "text"),
                       GetSQLValueString($_POST['textfield38'], "text"),
                       GetSQLValueString($_POST['textfield39'], "text"),
                       GetSQLValueString($_POST['textfield40'], "text"),
                       GetSQLValueString($_POST['textfield41'], "text"),
                       GetSQLValueString($_POST['textfield42'], "text"),
                       GetSQLValueString($_POST['textfield43'], "text"),
                       GetSQLValueString($_POST['textfield44'], "text"),
                       GetSQLValueString($_POST['textfield45'], "text"),
                       GetSQLValueString($_POST['textfield46'], "text"),
                       GetSQLValueString($_POST['textfield47'], "text"),
                       GetSQLValueString($_POST['textfield48'], "text"),
                       GetSQLValueString($_POST['textfield49'], "text"),
                       GetSQLValueString($_POST['textfield50'], "text"),
                       GetSQLValueString($_POST['textfield51'], "text"),
                       GetSQLValueString($_POST['textfield52'], "text"),
                       GetSQLValueString($_POST['textfield53'], "text"),
                       GetSQLValueString($_POST['textfield54'], "text"),
                       GetSQLValueString($_POST['textfield55'], "text"),
                       GetSQLValueString($_POST['textfield56'], "text"),
                       GetSQLValueString($_POST['textfield57'], "text"),
                       GetSQLValueString($_POST['textfield58'], "text"),
                       GetSQLValueString($_POST['textfield59'], "text"),
                       GetSQLValueString($_POST['textfield60'], "text"),
                       GetSQLValueString($_POST['textfield61'], "text"),
                       GetSQLValueString($_POST['textfield62'], "text"),
                       GetSQLValueString($_POST['textfield63'], "text"),
                       GetSQLValueString($_POST['textfield64'], "text"),
                       GetSQLValueString($_POST['textfield65'], "text"),
                       GetSQLValueString($_POST['textfield66'], "text"),
                       GetSQLValueString($_POST['textfield67'], "text"),
                       GetSQLValueString($_POST['textfield68'], "text"),
                       GetSQLValueString($_POST['textfield69'], "text"),
                       GetSQLValueString($_POST['textfield70'], "text"),
                       GetSQLValueString($_POST['textfield71'], "text"),
                       GetSQLValueString($_POST['textfield72'], "text"),
                       GetSQLValueString($_POST['textfield73'], "text"),
                       GetSQLValueString($_POST['textfield74'], "text"),
                       GetSQLValueString($_POST['textfield75'], "text"),
                       GetSQLValueString($_POST['textfield76'], "text"),
                       GetSQLValueString($_POST['textfield77'], "text"),
                       GetSQLValueString($_POST['textfield78'], "text"),
                       GetSQLValueString($_POST['textfield79'], "text"),
                       GetSQLValueString($_POST['textfield80'], "text"),
                       GetSQLValueString($_POST['textfield81'], "text"),
                       GetSQLValueString($_POST['textfield82'], "text"),
                       GetSQLValueString($_POST['textfield83'], "text"),
                       GetSQLValueString($_POST['textfield84'], "text"),
                       GetSQLValueString($_POST['textfield85'], "text"),
                       GetSQLValueString($_POST['textfield86'], "text"),
                       GetSQLValueString($_POST['textfield87'], "text"),
                       GetSQLValueString($_POST['textfield88'], "text"),
                       GetSQLValueString($_POST['textfield89'], "text"),
                       GetSQLValueString($_POST['textfield90'], "text"),
                       GetSQLValueString($_POST['textfield91'], "text"),
                       GetSQLValueString($_POST['textfield92'], "text"),
                       GetSQLValueString($_POST['textfield93'], "text"),
                       GetSQLValueString($_POST['textfield94'], "text"),
                       GetSQLValueString($_POST['textfield95'], "text"),
                       GetSQLValueString($_POST['textfield96'], "text"),
                       GetSQLValueString($_POST['textfield97'], "text"),
                       GetSQLValueString($_POST['textfield98'], "text"),
                       GetSQLValueString($_POST['textfield99'], "text"),
                       GetSQLValueString($_POST['textfield100'], "text"),
                       GetSQLValueString($_POST['textfield101'], "text"),
                       GetSQLValueString($_POST['textfield102'], "text"),
                       GetSQLValueString($_POST['textfield103'], "text"),
                       GetSQLValueString($_POST['textfield104'], "text"),
                       GetSQLValueString($_POST['textfield105'], "text"),
                       GetSQLValueString($_POST['textfield106'], "text"),
                       GetSQLValueString($_POST['textfield107'], "text"),
                       GetSQLValueString($_POST['textfield108'], "text"),
                       GetSQLValueString($_POST['textfield109'], "text"),
                       GetSQLValueString($_POST['textfield110'], "text"),
                       GetSQLValueString($_POST['textfield111'], "text"),
                       GetSQLValueString($_POST['textfield112'], "text"),
                       GetSQLValueString($_POST['textfield113'], "text"),
                       GetSQLValueString($_POST['textfield114'], "text"),
                       GetSQLValueString($_POST['textfield115'], "text"),
                       GetSQLValueString($_POST['textfield116'], "text"),
                       GetSQLValueString($_POST['textfield117'], "text"),
                       GetSQLValueString($_POST['textfield118'], "text"),
                       GetSQLValueString($_POST['textfield119'], "text"),
                       GetSQLValueString($_POST['textfield120'], "text"),
                       GetSQLValueString($_POST['textfield121'], "text"),
                       GetSQLValueString($_POST['textfield122'], "text"),
                       GetSQLValueString($_POST['textfield123'], "text"),
                       GetSQLValueString($_POST['textfield124'], "text"),
                       GetSQLValueString($_POST['textfield125'], "text"),
                       GetSQLValueString($_POST['textfield126'], "text"),
                       GetSQLValueString($_POST['textfield127'], "text"),
                       GetSQLValueString($_POST['textfield128'], "text"),
                       GetSQLValueString($_POST['textfield129'], "text"),
                       GetSQLValueString($_POST['textfield130'], "text"),
                       GetSQLValueString($_POST['textfield131'], "text"),
                       GetSQLValueString($_POST['textfield132'], "text"),
                       GetSQLValueString($_POST['textfield133'], "text"),
                       GetSQLValueString($_POST['textfield134'], "text"),
                       GetSQLValueString($_POST['textfield135'], "text"),
                       GetSQLValueString($_POST['textfield136'], "text"),
                       GetSQLValueString($_POST['textfield137'], "text"),
                       GetSQLValueString($_POST['textfield138'], "text"),
                       GetSQLValueString($_POST['textfield139'], "text"),
                       GetSQLValueString($_POST['textfield140'], "text"),
                       GetSQLValueString($_POST['textfield141'], "text"),
                       GetSQLValueString($_POST['textfield142'], "text"),
                       GetSQLValueString($_POST['textfield143'], "text"),
                       GetSQLValueString($_POST['textfield144'], "text"),
                       GetSQLValueString($_POST['textfield145'], "text"),
                       GetSQLValueString($_POST['textfield146'], "text"),
                       GetSQLValueString($_POST['textfield147'], "text"),
                       GetSQLValueString($_POST['textfield148'], "text"),
                       GetSQLValueString($_POST['textfield149'], "text"),
                       GetSQLValueString($_POST['textfield150'], "text"),
                       GetSQLValueString($_POST['textfield151'], "text"),
                       GetSQLValueString($_POST['textfield152'], "text"),
                       GetSQLValueString($_POST['textfield153'], "text"),
                       GetSQLValueString($_POST['textfield154'], "text"),
                       GetSQLValueString($_POST['textfield155'], "text"),
                       GetSQLValueString($_POST['textfield156'], "text"),
                       GetSQLValueString($_POST['textfield157'], "text"),
                       GetSQLValueString($_POST['textfield158'], "text"),
                       GetSQLValueString($_POST['textfield159'], "text"),
                       GetSQLValueString($_POST['textfield160'], "text"),
                       GetSQLValueString($_POST['textfield161'], "text"),
                       GetSQLValueString($_POST['textfield162'], "text"),
                       GetSQLValueString($_POST['textfield163'], "text"),
                       GetSQLValueString($_POST['textfield164'], "text"),
                       GetSQLValueString($_POST['textfield165'], "text"),
                       GetSQLValueString($_POST['textfield166'], "text"),
                       GetSQLValueString($_POST['textfield167'], "text"),
                       GetSQLValueString($_POST['textfield168'], "text"),
                       GetSQLValueString($_POST['textfield169'], "text"),
                       GetSQLValueString($_POST['textfield170'], "text"),
                       GetSQLValueString($_POST['textfield171'], "text"),
                       GetSQLValueString($_POST['textfield172'], "text"),
                       GetSQLValueString($_POST['textfield173'], "text"),
                       GetSQLValueString($_POST['textfield174'], "text"),
                       GetSQLValueString($_POST['textfield175'], "text"),
                       GetSQLValueString($_POST['textfield176'], "text"),
                       GetSQLValueString($_POST['textfield177'], "text"),
                       GetSQLValueString($_POST['textfield178'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

  $insertGoTo = "it_car.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
 
  <p>车型
    <input type="text" name="textfield" id="textfield"/>
  </p>
  <p>
    <input type="text" name="textfield2" id="textfield2" />
  款式  </p>
  <p>
    <input type="text" name="textfield3" id="textfield3" />
厂商指导价  </p>
  <p>
    <input type="text" name="textfield4" id="textfield4" />
厂商</p>
  <p>
    <input type="text" name="textfield5" id="textfield5" />
发动机</p>
  <p>
    <input type="text" name="textfield6" id="textfield6" />
变速箱</p>
  <p>
    <input type="text" name="textfield7" id="textfield7" /> 
    长
</p>
  <p>
    <input type="text" name="textfield8" id="textfield8" />
    宽
  </p>
  <p>
    <input type="text" name="textfield9" id="textfield9" /> 
    高
</p>
  <p>
    <input type="text" name="textfield10" id="textfield10" />
车身结构</p>
  <p>
    <input type="text" name="textfield11" id="textfield11" />
最低车速</p>
  <p>
    <input type="text" name="textfield12" id="textfield12" />
官方加速</p>
  <p>
    <input type="text" name="textfield13" id="textfield13" />
实测加速</p>
  <p>
    <input type="text" name="textfield14" id="textfield14" />
实测制动</p>
  <p>
    <input type="text" name="textfield15" id="textfield15" />
实测油耗</p>
  <p>
    <input type="text" name="textfield16" id="textfield16" />
工信部油耗</p>
  <p>
    <input type="text" name="textfield17" id="textfield17" />
整车质保</p>
  <p>
    <input type="text" name="textfield18" id="textfield18" />
轴距</p>
  <p>
    <input type="text" name="textfield19" id="textfield19" />
前轴距</p>
  <p>
    <input type="text" name="textfield20" id="textfield20" />
后轮距</p>
  <p>
    <input type="text" name="textfield21" id="textfield21" />
最小离地间隙</p>
  <p>
    <input type="text" name="textfield22" id="textfield22" />
整备质量</p>
  <p>
    <input type="text" name="textfield23" id="textfield23" />
车门数</p>
  <p>
    <input type="text" name="textfield24" id="textfield24" />
座位数</p>
  <p>
    <input type="text" name="textfield25" id="textfield25" />
    油箱容积
  </p>
  <p>
    <input type="text" name="textfield26" id="textfield26" />
行李箱容积</p>
  <p>
    <input type="text" name="textfield27" id="textfield27" />
发动机型号</p>
  <p>
    <input type="text" name="textfield28" id="textfield28" />
排量</p>
  <p>
    <input type="text" name="textfield29" id="textfield29" />
进气形式</p>
  <p>
    <input type="text" name="textfield30" id="textfield30" />
气缸数</p>
  <p>
    <input type="text" name="textfield31" id="textfield31" />
每缸气门数</p>
  <p>
    <input type="text" name="textfield32" id="textfield32" />
压缩比</p>
  <p>
    <input type="text" name="textfield33" id="textfield33" />
配气结构</p>
  <p>
    <input type="text" name="textfield34" id="textfield34" />
缸径</p>
  <p>
    <input type="text" name="textfield35" id="textfield35" />
行程</p>
  <p>
    <input type="text" name="textfield36" id="textfield36" />
最大马力</p>
  <p>
    <input type="text" name="textfield37" id="textfield37" />
最大功率</p>
  <p>
    <input type="text" name="textfield38" id="textfield38" />
最大功率转速</p>
  <p>
    <input type="text" name="textfield39" id="textfield39" />
最大扭矩</p>
  <p>
    <input type="text" name="textfield40" id="textfield40" />
最大扭矩转速</p>
  <p>
    <input type="text" name="textfield41" id="textfield41" />
发动机特有技术</p>
  <p>
    <input type="text" name="textfield42" id="textfield42" />
燃料形式</p>
  <p>
    <input type="text" name="textfield43" id="textfield43" />
燃油标号</p>
  <p>
    <input type="text" name="textfield44" id="textfield44" />
供油方式</p>
  <p>
    <input type="text" name="textfield45" id="textfield45" />
缸盖材料</p>
  <p>
    <input type="text" name="textfield46" id="textfield46" />
缸体材料</p>
  <p>
    <input type="text" name="textfield47" id="textfield47" />
环保标准</p>
  <p>
    <input type="text" name="textfield48" id="textfield48" />
电动机最大功率</p>
  <p>
    <input type="text" name="textfield49" id="textfield49" />
电动机最大扭矩</p>
  <p>
    <input type="text" name="textfield50" id="textfield50" />
电池支持</p>
  <p>
    <input type="text" name="textfield51" id="textfield51" />
  电池容量</p>
  <p>
    <input type="text" name="textfield52" id="textfield52" />
  简称</p>
  <p>
    <input type="text" name="textfield53" id="textfield53" />
  挡位个数</p>
  <p>
    <input type="text" name="textfield54" id="textfield54" />
  变速箱类型</p>
  <p>
    <input type="text" name="textfield55" id="textfield55" />
  驱动方式</p>
  <p>
    <input type="text" name="textfield56" id="textfield56" />
  四驱形式</p>
  <p>
    <input type="text" name="textfield57" id="textfield57" />
  中央差速器结构</p>
  <p>
    <input type="text" name="textfield58" id="textfield58" />
  前悬架类型</p>
  <p>
    <input type="text" name="textfield59" id="textfield59" />
  后悬架类型</p>
  <p>
    <input type="text" name="textfield60" id="textfield60" />
  助力类型</p>
  <p>
    <input type="text" name="textfield61" id="textfield61" />
  车体结构</p>
  <p>
    <input type="text" name="textfield62" id="textfield62" />
  前制动器类型</p>
  <p>
    <input type="text" name="textfield63" id="textfield63" />
  后制动器类型</p>
  <p>
    <input type="text" name="textfield64" id="textfield64" />
  驻车制动类型</p>
  <p>
    <input type="text" name="textfield65" id="textfield65" />
  前轮胎规格</p>
  <p>
    <input type="text" name="textfield66" id="textfield66" />
  后轮胎规格</p>
  <p>
    <input type="text" name="textfield67" id="textfield67" />
  备胎规格</p>
  <p>
    <input type="text" name="textfield68" id="textfield68" />
  主副驾驶座安全气囊</p>
  <p>
    <input type="text" name="textfield69" id="textfield69" />
  前后排侧气囊</p>
  <p>
    <input type="text" name="textfield70" id="textfield70" />
  前后排头部气囊</p>
  <p>
    <input type="text" name="textfield71" id="textfield71" />
  膝部气囊</p>
  <p>
    <input type="text" name="textfield72" id="textfield72" />
  胎压监测</p>
  <p>
    <input type="text" name="textfield73" id="textfield73" />
  零胎压继续行驶</p>
  <p>
    <input type="text" name="textfield74" id="textfield74" />
  安全带提示</p>
  <p>
    <input type="text" name="textfield75" id="textfield75" />
  ISOFIX儿童座椅</p>
  <p>
    <input type="text" name="textfield76" id="textfield76" />
  发动机电子防盗</p>
  <p>
    <input type="text" name="textfield77" id="textfield77" />
  车内中控锁</p>
  <p>
    <input type="text" name="textfield78" id="textfield78" />
  遥控钥匙</p>
  <p>
    <input type="text" name="textfield79" id="textfield79" />
  无钥匙启动系统</p>
  <p>
    <input type="text" name="textfield80" id="textfield80" />
  无钥匙进入系统</p>
  <p>
    <input type="text" name="textfield81" id="textfield81" />
  ABS防抱死</p>
  <p>
    <input type="text" name="textfield82" id="textfield82" />
  制动力分配</p>
  <p>
    <input type="text" name="textfield83" id="textfield83" />
  刹车辅助</p>
  <p>
    <input type="text" name="textfield84" id="textfield84" />
  牵引力控制</p>
  <p>
    <input type="text" name="textfield85" id="textfield85" />
  车身稳定控制</p>
  <p>
    <input type="text" name="textfield86" id="textfield86" />
  自动驻车</p>
  <p>
    <input type="text" name="textfield87" id="textfield87" />
  陡坡缓降</p>
  <p>
    <input type="text" name="textfield88" id="textfield88" />
  可变悬架</p>
  <p>
    <input type="text" name="textfield89" id="textfield89" />
  空气悬架</p>
  <p>
    <input type="text" name="textfield90" id="textfield90" />
  可变转相比</p>
  <p>
    <input type="text" name="textfield91" id="textfield91" />
    前桥限滑差速器
  </p>
  <p>
    <input type="text" name="textfield92" id="textfield92" />
  中央差速器锁止功能</p>
  <p>
    <input type="text" name="textfield93" id="textfield93" />    
  后前线滑差速器</p>
  <p>
    <input type="text" name="textfield94" id="textfield94" />
  电动天窗</p>
  <p>
    <input type="text" name="textfield95" id="textfield95" />
  全景天窗</p>
  <p>
    <input type="text" name="textfield96" id="textfield96" />
  运动外观套件</p>
  <p>
    <input type="text" name="textfield97" id="textfield97" />
  铝合金轮圈</p>
  <p>
    <input type="text" name="textfield98" id="textfield98" />
  电动吸合门</p>
  <p>
    <input type="text" name="textfield99" id="textfield99" />
  侧滑门</p>
  <p>
    <input type="text" name="textfield100" id="textfield100" />
  电动后备箱</p>
  <p>
    <input type="text" name="textfield101" id="textfield101" />
  真皮方向盘</p>
  <p>
    <input type="text" name="textfield102" id="textfield102" />
  方向盘调节</p>
  <p>
    <input type="text" name="textfield103" id="textfield103" />
  方向盘电动调节</p>
  <p>
    <input type="text" name="textfield104" id="textfield104" />
  多功能方向盘</p>
  <p>
    <input type="text" name="textfield105" id="textfield105" />
  方向盘换挡</p>
  <p>
    <input type="text" name="textfield106" id="textfield106" />
  方向盘加热</p>
  <p>
    <input type="text" name="textfield107" id="textfield107" />
  定速巡航</p>
  <p>
    <input type="text" name="textfield108" id="textfield108" />
  前后驻车雷达</p>
  <p>
    <input type="text" name="textfield109" id="textfield109" />
  倒车视频影响</p>
  <p>
    <input type="text" name="textfield110" id="textfield110" />
  行车电脑显示  </p>
  <p>
    <input type="text" name="textfield111" id="textfield111" />
  HUD抬头数字</p>
  <p>
    <input type="text" name="textfield112" id="textfield112" />
  真皮座椅</p>
  <p>
    <input type="text" name="textfield113" id="textfield113" />
  运动风格座椅</p>
  <p>
    <input type="text" name="textfield114" id="textfield114" />
  座椅高低调节</p>
  <p>
    <input type="text" name="textfield115" id="textfield115" />
  腰部支撑调节</p>
  <p>
    <input type="text" name="textfield116" id="textfield116" />
  肩部支撑调节</p>
  <p>
    <input type="text" name="textfield117" id="textfield117" />
  主副驾驶座电动调节</p>
  <p>
    <input type="text" name="textfield118" id="textfield118" />
  第二排靠背角度调节</p>
  <p>
    <input type="text" name="textfield119" id="textfield119" />
  第二排座椅移动</p>
  <p>
    <input type="text" name="textfield120" id="textfield120" />
  后排座椅电动调节</p>
  <p>
    <input type="text" name="textfield121" id="textfield121" />
  电动座椅记忆</p>
  <p>
    <input type="text" name="textfield122" id="textfield122" />
  前后排座椅加热</p>
  <p>
    <input type="text" name="textfield123" id="textfield123" />
  前后排座椅通风</p>
  <p>
    <input type="text" name="textfield124" id="textfield124" />
  前后座椅按摩</p>
  <p>
    <input type="text" name="textfield125" id="textfield125" />
  前排座椅放倒方式</p>
  <p>
    <input type="text" name="textfield126" id="textfield126" />
  第三排座椅</p>
  <p>
    <input type="text" name="textfield127" id="textfield127" />
  前后中央扶手</p>
  <p>
    <input type="text" name="textfield128" id="textfield128" />
  后排杯架</p>
  <p>
    <input type="text" name="textfield129" id="textfield129" />
  GPS导航系统</p>
  <p>
    <input type="text" name="textfield130" id="textfield130" />
  定位互动服务</p>
  <p>
    <input type="text" name="textfield131" id="textfield131" />
  中控台彩色大屏</p>
  <p>
    <input type="text" name="textfield132" id="textfield132" />
  内置硬盘</p>
  <p>
    <input type="text" name="textfield133" id="textfield133" />
  蓝牙车载电话</p>
  <p>
    <input type="text" name="textfield134" id="textfield134" />
  车载电视</p>
  <p>
    <input type="text" name="textfield135" id="textfield135" />
  后排液晶屏</p>
  <p>
    <input type="text" name="textfield136" id="textfield136" />
  外接音源接口</p>
  <p>
    <input type="text" name="textfield137" id="textfield137" />
  CD支持</p>
  <p>
    <input type="text" name="textfield138" id="textfield138" />
  多媒体系统</p>
  <p>
    <input type="text" name="textfield139" id="textfield139" />
  扬声器数量</p>
  <p>
    <input type="text" name="textfield140" id="textfield140" />
  氙气大灯</p>
  <p>
    <input type="text" name="textfield141" id="textfield141" />
  LED大灯</p>
  <p>
    <input type="text" name="textfield142" id="textfield142" />
  日间行车灯</p>
  <p>
    <input type="text" name="textfield143" id="textfield143" />
  自动头灯</p>
  <p>
    <input type="text" name="textfield144" id="textfield144" />
  转向头灯</p>
  <p>
    <input type="text" name="textfield145" id="textfield145" />    
  前雾灯</p>
  <p>
    <input type="text" name="textfield146" id="textfield146" />
  大灯高度可调</p>
  <p>
    <input type="text" name="textfield147" id="textfield147" />
  大灯清洗装置</p>
  <p>
    <input type="text" name="textfield148" id="textfield148" />
  车内氛围灯</p>
  <p>
    <input type="text" name="textfield149" id="textfield149" />
  前后电动车窗</p>
  <p>
    <input type="text" name="textfield150" id="textfield150" />
  车窗防夹手功能</p>
  <p>
    <input type="text" name="textfield151" id="textfield151" />
  防紫外线</p>
  <p>
    <input type="text" name="textfield152" id="textfield152" />
  后视镜电动</p>
  <p>
    <input type="text" name="textfield153" id="textfield153" />
  后视镜加热</p>
  <p>
    <input type="text" name="textfield154" id="textfield154" />
  内外后视镜自动防眩目</p>
  <p>
    <input type="text" name="textfield155" id="textfield155" />
  后视镜电动折叠</p>
  <p>
    <input type="text" name="textfield156" id="textfield156" />
  后视镜技艺</p>
  <p>
    <input type="text" name="textfield157" id="textfield157" />
  后风挡遮阳帘</p>
  <p>
    <input type="text" name="textfield158" id="textfield158" />
  后排侧遮阳帘</p>
  <p>
    <input type="text" name="textfield159" id="textfield159" />
  后排隐私玻璃</p>
  <p>
    <input type="text" name="textfield160" id="textfield160" />
  遮阳板化妆镜</p>
  <p>
    <input type="text" name="textfield161" id="textfield161" />
  后雨刷</p>
  <p>
    <input type="text" name="textfield162" id="textfield162" />
  感应雨刷</p>
  <p>
    <input type="text" name="textfield163" id="textfield163" />
  空调控制方式</p>
  <p>
    <input type="text" name="textfield164" id="textfield164" />
  后排独立空调</p>
  <p>
    <input type="text" name="textfield165" id="textfield165" />
  后座出风口</p>
  <p>
    <input type="text" name="textfield166" id="textfield166" />
  温度分区控制</p>
  <p>
    <input type="text" name="textfield167" id="textfield167" />
  车内空气调节</p>
  <p>
    <input type="text" name="textfield168" id="textfield168" />
  车载冰箱</p>
  <p>
    <input type="text" name="textfield169" id="textfield169" />
  自动泊车入围</p>
  <p>
    <input type="text" name="textfield170" id="textfield170" />
    发动机启停
  </p>
  <p>
    <input type="text" name="textfield171" id="textfield171" />
  并线辅助</p>
  <p>
    <input type="text" name="textfield172" id="textfield172" />
  车道便宜</p>
  <p>
    <input type="text" name="textfield173" id="textfield173" />
  主动刹车</p>
  <p>
    <input type="text" name="textfield174" id="textfield174" />
  整体主动转向</p>
  <p>
    <input type="text" name="textfield175" id="textfield175" />
  夜视系统</p>
  <p>
    <input type="text" name="textfield176" id="textfield176" />
  中控液晶屏风评</p>
  <p>
    <input type="text" name="textfield177" id="textfield177" />
  自适应巡航</p>
  <p>
    <input type="text" name="textfield178" id="textfield178" />
  全景摄像头<br/>
  </p>
  <input type="hidden" name="MM_insert" value="form1" />
  <input type="submit" name="button" id="button" value="提交" />
</form>
</body>
</html>
<?php header("Content-Type: text/html;charset=utf-8");?>
<head>
  <title>在线正则表达式测试器 - 奇逸</title>
  <meta http-equiv="Content-Type"content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, 
                                     initial-scale=1.0, 
                                     maximum-scale=1.0, 
                                     user-scalable=no">
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">  
  <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
</head>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		    <ul class="nav nav-pills">
				<li class="active">
					<a href="./index.php">正则表达式测试器</a>
				</li>
				<li>
					<a href="./source.html">源代码下载</a>
				</li>
			</ul>
<form role="form" action="./index.php" method="get">
  <div class="form-group">
    <p>正则表达式文本：</p>
    <textarea class="form-control" rows="6" id="regexp" placeholder="请输入正则表达式文本" name="regexp"><?php if(isset($_REQUEST["regexp"])){echo $_REQUEST["regexp"];}?></textarea>
	<p>源文本：</p>
	<textarea class="form-control" rows="6" id="text" placeholder="请输入源文本" name="text"><?php if(isset($_REQUEST["text"])){echo $_REQUEST["text"];}?></textarea>
	<button type="submit" class="btn btn-default">运行</button>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="m" value="1" <?php if(isset($_REQUEST["m"])){echo "checked=\"checked\"";}?>/>多行模式
		</label>
		<label>
			<input type="checkbox" name="i" value="1" <?php if(isset($_REQUEST["i"])){echo "checked=\"checked\"";}?>/>不区分大小写
		</label>
		<label>
			<input type="checkbox" name="ns" value="1" <?php if(isset($_REQUEST["ns"])){echo "checked=\"checked\"";}?>/>点号不匹配换行符
		</label>
	</div>
  </div>
</form>
<?php
function replaceSpecial($str)
{
    $str=HTMLSpecialChars($str);
    $str=nl2br($str);
    $str=str_replace(" ","&nbsp",$str);
    $str=str_replace("<? ","< ?",$str);
    return $str;
}

  if(isset($_REQUEST["regexp"]) && isset($_REQUEST["text"]))
  {
    echo "<div class=\"jumbotron\">\n";
	
	$xsf="/u";
	if(isset($_REQUEST["m"]))
	{
		$xsf=$xsf."m";
	}
	if(isset($_REQUEST["i"]))
	{
		$xsf=$xsf."i";
	}
	if(!isset($_REQUEST["ns"]))
	{
		$xsf=$xsf."s";
	}

    $r=$_REQUEST["regexp"];
	$t=$_REQUEST["text"];
	
	$t1=replaceSpecial($t);
	$t1=preg_replace("/".replaceSpecial($r).$xsf,"<span style=\"background:#ffffcd\">$0</span>",$t1);

	echo $t1."<hr />\n";
	preg_match_all("/".$r.$xsf,$t,$m);
	echo "<table class=\"table table-bordered\">\n";
	echo "<tbody>\n";
	for($i=0;$i<count($i,0);$i++)
	{
		echo "<tr>\n<td>\n".$i."\n</td>\n";
		foreach($m[$i] as $m1)
		{
		    $m1=replaceSpecial($m1);
			echo "<td>".$m1."</td>";
		}
		echo "</tr>\n";
	}
	echo "</tbody>\n";
  }
?>
			</div>
		</div>
	</div>
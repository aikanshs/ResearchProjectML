<html>
<head>
<title>RNA-Protein Interaction Prediction</title>
<style>
div.one{
	align:center;
	 border-style: solid;
    border-width: 1px;
	margin-left:100px;
	margin-right:100px;
	width:80%;
}
div.two{
	 border-style: solid;
	 height:150px;
    border-width: 1px;
	background-color:#00284d;
}
div.three{
	 border-style: solid;
	 height:50px;
    border-width: 1px;
}
div.four{
	 border-style: solid;
	 width:200px;
	 float:left;
    border-width: 1px;
}

div.check{
	 border-style: solid;
	 border-width: 1px;
	 margin-left:200px;
	 height:270px;
}
table, th, td {
    border: 1px solid black;
	border-collapse: collapse;

}
</style>
</head>
<body>
<div align="center" class="one" >
<a href="http://www.bitmesra.ac.in" >
<div  class="two">
<img src="bit_mesra.png" style="width:500px; height:150px; float:left; padding-left:2cm">
<!--<p>Department Of Electronics And Communication</p>-->
</div></a>
<div class="three">
<h2 style="color:#3333ff">Protein-RNA Interaction Prediction (PRISearch)</h2>
</div>
<div class="four">
<table style="width:200px">
  <tr>
  <td align="center" style="background-color:#00284d;">
	<h3><a href="intro.html" style="width:200px;color:#ffffff"><font size="5"> Introduction</a></font> </h3>
	</td>
	</tr>
	<td align="center" >
	<h3><a href="example.html" style="text-decoration:none;">Example</a> </h3>
	</td>
	</tr>
	<tr>
 
	<tr>
  <td align="center">
	<h3><a href="index.html" style="text-decoration:none;">Search</a> </h3>
	</td>
	</tr>
	<tr>
  <td align="center" >
	<h3><a href="datasets.html" style="text-decoration:none;">Datasets</a> </h3>
	</td>
	</tr>
	<!--<tr>
  <td align="center" >
	<h3><a href="reference.html" style="text-decoration:none;">Reference</a> </h3>
	</td>
	</tr>-->
	
	<tr>
  <td align="center">
	<h3><a href="developer.php" class="dev_link" style="text-decoration:none;" >Developer</a> </h3>
	</td>
	</tr>
	<tr>
  <td align="center">
	<h3><a href="contact.html" style="text-decoration:none;">Contact Us</a> </h3>
	</td>
	</tr>
	</table>
</div>
<div class="check">
<h2>Result:</h2>
<div>
<h3 style="float:left;margin-left:150px;">SVM Score</h3>
<h3 style="float:right;margin-right:110px;">Remarks</h3><br>
</div>
<?php
if(file_exists("test.dat"))
	unlink("test.dat");
if(file_exists("prediction.dat"))
	unlink("prediction.dat");

$protein=$_POST["protein"];
$rna=$_POST["rna"];
//echo "<div>".$protein."</div>";
//echo "<div>"."RNA"."</div>";
//echo "<div>".$rna."</div>";
$command="ConjointTriple $protein $rna";
exec($command,$output,$ret);
$classify="svm_classify test.dat model prediction.txt";

exec($classify,$output,$ret);
//print_r($output);
$file=fopen("prediction.txt","r");
		$no=(float)fgets($file);
		if($no>=0){
		echo "<div>";
		echo "<p style='margin-top:50px;float:left;margin-right:10px;'>".$no."</p>";
		echo "<p style='margin-top:50px;float:right;margin-left:20px;'>Pair interacts</p>";
		echo "</div>";
		//echo "<div style='margin-top:50px;float:left;margin-right:10px;'>".$no."</div>";
		//echo "<div style='margin-top:50px;float:right;margin-left:20px;'>Pair interacts</div>";
		}
		else{
		//echo "<div style='margin-top:20px;float:left;margin-right:10px;'>";
		echo "<div>";
		echo "<p style='float:left;'>".$no."</p>";
		echo "<p style='float:right;margin-right:50px;'>Pair Does Not interacts</p>";
		echo "</div>";
		
		}

?>
<h3 style="margin-top:100px;">What does SVM Score means?</h3>
<p >If a SVM score is greater than or equal to 0 then it means that the given pair of Protein and RNA interacts and if the SVM score is less than 0 then the pair does not interacts.</p>
</div>
<body>
</html>
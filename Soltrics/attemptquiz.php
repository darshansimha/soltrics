<?php
session_start();


if(!isset($_SESSION['email']))
header("Location:index.php");


include('dbconn.php');

$qid= $_GET['qid'];
$query="select qname from quiz_detail where qid='$qid'";
$res=mysql_query($query);
$qrow=mysql_fetch_assoc($res);
$table='q_'.$qrow['qname'];
$_SESSION['table']=$table;
$sql="select * from $table";
$result=mysql_query($sql) or die("quiz table couldnt feteched.");

$num_mul=0;
$num_ans=0;
$num_dis=0;
$num_true=0;

?>
<!DOCTYPE html>
<html>

<!-- Mirrored from detail.herokuapp.com/form-showcase.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 18 Jun 2013 17:38:29 GMT -->
<head>
	<title>Detail Admin - Form Showcase</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">

    <!-- libraries -->
    <link href="css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet">
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet">
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet">
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet">
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/elements.css">
    <link rel="stylesheet" type="text/css" href="css/icons.css">
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/form-showcase.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="code.jquery.com/jquery-latest.js"></script>
	
</head>
<body>


<div class="container-fluid">
<div id="pad-wrapper" class="form-page">
<div class="row-fluid form-wrapper">
    <!-- left column -->
    <form id="contact_form" method="post" action="submitquiz.php">
    
    <ul class="nav nav-tabs ">
<li class="active"><a href="#home" data-toggle="tab" >Multiple Choice&nbsp;(<span id="total_mul">0</span>)</a></li>
<li><a href="#profile" data-toggle="tab">Multiple Choice/ Multiple ansnwers&nbsp;(<span id="total_ans">0</span>)</a></li>
<li><a href="#messages" data-toggle="tab">Descriptive Questions&nbsp;(<span id="total_dis">0</span>)</a></li>
<li><a href="#settings" data-toggle="tab">True/False&nbsp;(<span id="total_true">0</span>)</a></li>
              <div class="pull-right">
              Total:&nbsp;<span id="total">0</span>&nbsp;
              <input type="submit" class="btn btn-primary" id="submitQuiz" align="right"></div>
        </ul> 
           <div class="tab-content">      
<?php                
$track=0;
while($row= mysql_fetch_assoc($result))
{	$id=$row['ques_id'];
	if($row['type']==0)
	{
		if($num_mul==0)
		{
			$track=1;
			echo "<div class='tab-pane active' id='home'>";
		}
		
		$num_mul++;
		
		echo
		"<div class='field-box'>
        <label>".$num_mul.".</label>
        <div class='span8'>
        <div class='text-error row-fluid span12' >".
		$row['question']."</div>".
		"<label class='radio'>
        <input type='radio' name='ansmul$id' id='optionsRadios1' value='0' >".
		$row['o1'].
		"</label>".
		"<label class='radio'>
        <input type='radio' name='ansmul$id' id='optionsRadios2' value='1' >".
		$row['o2'].
		"</label>".	
		"<label class='radio'>
        <input type='radio' name='ansmul$id' id='optionsRadios3' value='2' >".
		$row['o3'].
		"</label>".
		"<label class='radio'>
        <input type='radio' name='ansmul$id' id='optionsRadios4' value='3' >".
		$row['o4'].
		"</label>".
		
		"</div></div>";
		
		
	}
	if($row['type']==1)
	{
		if($num_ans==0)
		{
			if($track==1)echo "</div>";
			echo "<div class='tab-pane' id='profile'>";
            
		}
		
		$num_ans++;
		echo
		"<div class='field-box'>
        <label>".$num_ans.".</label>
        <div class='span8'>
        <div class='text-error row-fluid span12' >".
		$row['question']."</div>".
		"<label class='checkbox'>
        <input type='checkbox' name='ansans$id' id='optionscheck1' value='0' >".
		$row['o1'].
		"</label>".
		"<label class='checkbox'>
        <input type='checkbox' name='ansans$id' id='optionscheck2' value='1' >".
		$row['o2'].
		"</label>".	
		"<label class='checkbox'>
        <input type='checkbox' name='ansans$id' id='optionscheck3' value='2' >".
		$row['o3'].
		"</label>".
		"<label class='checkbox'>
        <input type='checkbox' name='ansans$id' id='optionscheck4' value='3' >".
		$row['o4'].
		"</label>".
		"</div></div>";
	}
	if($row['type']==2)
	{
		if($num_dis==0)
		{
			if($track==1)echo "</div>";
			echo "<div class='tab-pane' id='messages'>";
		}
		
		$num_dis++;
		echo
		"<div class='field-box'>
        <label>".$num_dis.".</label>
        <div class='span8'>
        <div class='text-error row-fluid span12' >".
		$row['question']."</div>".
		"<textarea  name='ansdis$id' class='span12' rows='4'></textarea>".
		"</div></div>";
	}
	if($row['type']==3)
	{
		if($num_true==0)
		{
			if($track==1)echo "</div>";
			echo "<div class='tab-pane' id='settings'>";
		}
		
		$num_true++;
		echo
		"<div class='field-box'>
        <label>".$num_true.".</label>
        <div class='span8'>
        <div class='text-error row-fluid span12' >".
		$row['question']."</div>".
		"<label class='radio'>
        <input type='radio' name='anstrue$id' id='optionsradio1' value='0' >".
		"True".
		"</label>".
		"<label class='radio'>
        <input type='radio' name='anstrue$id' id='optionradio2' value='1' >".
		"False".
		"</label>".
		"</div></div>";
	}
	if($track==1){echo "</div>";$track=0;}
}
?>
	</div>     
	</form>
    
    </div>
    </div>
    </div>
  
<    


<!-- scripts for this page -->
    <script src="js/wysihtml5-0.3.0.js"></script>
    <script src="code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-wysihtml5-0.0.2.js"></script>
    <script src="js/bootstrap.datepicker.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/theme.js"></script>

    <!-- call this page plugins -->
    <script type="text/javascript">
        $(function () {

            // add uniform plugin styles to html elements
            $("input:checkbox, input:radio").uniform();

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });

            // wysihtml5 plugin on textarea
            $(".wysihtml5").wysihtml5({
                "font-styles": false
            });
        });
    </script>
</body>

</html>
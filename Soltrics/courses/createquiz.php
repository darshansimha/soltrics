<!DOCTYPE html>
<html>

<!-- Mirrored from detail.herokuapp.com/form-showcase.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 18 Jun 2013 17:38:29 GMT -->
<head>
	<title>Create Quiz</title>
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
   

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
	
	$("document").ready(function(e) {
		
    var num_mul=0;
	var num_ans=0;
	var num_dis=0;
	var num_true=0;
	
	var rem_mul=0;
	var rem_ans=0;
	var rem_dis=0;
	var rem_true=0;
	
	function count(a)
	{
		var c=0;
		for( var i=0;i<a.length;i++)
		if(a[i]==1) c++;
		return c;
	}
	
	var a_mul= Array();
	var a_ans= Array();
	var a_dis= Array();
	var a_true= Array();
	
	$("#addmultiple").click(function(e) {
		a_mul.push(1);
		num_mul++;
		var a=count(a_mul);
		var b=count(a_ans);
		var c=count(a_dis);
		var d=count(a_true);
		$("#total_mul").text(a);
		$("span#total").text(a+b+c+d);
        $("#addmultiplearea").append(
		"<div class='field-box mul' id="+num_mul+">"+
					
"<label>"+num_mul+"</label>"+
"<input class='span10 inline-input question' placeholder='Write Question' type='text' name='questionmul_"+num_mul+"'>"+
"<input type='button' class='btnRemove icon-remove btn' value='Remove'>"+

"<div class='field-box'>"+
"<label></label>"+
"<div class='span8'>"+
"<label class='radio'>"+
"<input type='radio' name='ansmul_"+num_mul+"' id='optionsRadios1' value='0' checked>"+
"<input class='span8 inline-input option1' placeholder='option1' type='text' name='optionmul1_"+num_mul+"'>"+
"</label>"+
"<label class='radio'>"+
"<input type='radio' name='ansmul_"+num_mul+"' id='optionsRadios2' value='1'>"+
"<input class='span8 inline-input option2' placeholder='option2' type='text' name='optionmul2_"+num_mul+"'>"+
"</label>"+
"<label class='radio'>"+
"<input type='radio' name='ansmul_"+num_mul+"' id='optionsRadios3' value='2'>"+
"<input class='span8 inline-input option3' placeholder='option3' type='text' name='optionmul3_"+num_mul+"'>"+
"</label>"+
"<label class='radio'>"+
"<input type='radio' name='ansmul_"+num_mul+"' id='optionsRadios4' value='3'>"+
"<input class='span8 inline-input option4' placeholder='option4' type='text' name='optionmul4_"+num_mul+"'>"+
"</label>"+
"</div>"+
"</div>"+
		"</div>"
		);
			$('.btnRemove').on('click', function () { 
					rem_mul++;
					a_mul[parseInt($(this).parent().attr("id"))-1]=0;					
					var a=count(a_mul);
					var b=count(a_ans);
					var c=count(a_dis);
					var d=count(a_true);
					$("span#total").text(a+b+c+d);
        			
					$("#total_mul").text(a);
					$(this).parent().remove (); // remove the textbox
                    
                });
    	});
		
		
		$("#addmultipleans").click(function(e) {
		a_ans.push(1);
		num_ans++;
					var a=count(a_mul);
					var b=count(a_ans);
					var c=count(a_dis);
					var d=count(a_true);
					$("span#total").text(a+b+c+d);
        			
		$("#total_ans").text(b);
        
        $("#addmultipleansarea").append(
		"<div class='field-box ans' id="+num_ans+">"+
					
"<label>"+num_ans+"</label>"+
"<input class='span10 inline-input question' placeholder='Write Question' type='text' name='questionans_"+num_ans+"'>"+
"<input type='button' class='btnRemove icon-remove btn' value='Remove'>"+

"<div class='field-box'>"+
"<label></label>"+
"<div class='span8'>"+
		   
"<label class='checkbox'>"+
"<input type='checkbox' name='checka_"+num_ans+"' id='optionscheck1' value='0'>"+
"<input class='span7 inline-input option1' placeholder='option1' type=' text' name='optionans1_"+num_ans+"'>"+
"</label>"+
"<label class='checkbox'>"+
"<input type='checkbox' name='checkb_"+num_ans+"' id='optionscheck2' value='1'>"+
"<input class='span8 inline-input option2' placeholder='option2' type='text' name='optionans2_"+num_ans+"'>"+
"</label>"+
"<label class='checkbox'>"+
"<input type='checkbox' name='checkc_"+num_ans+"' id='optionscheck3' value='2'>"+
"<input class='span8 inline-input option3' placeholder='option3' type='text' name='optionans3_"+num_ans+"'>"+
"</label>"+
"<label class='checkbox'>"+
"<input type='checkbox' name='checkd_"+num_ans+"' id='optionscheck4' value='3'>"+
"<input class='span8 inline-input option4' placeholder='option4' type='text' name='optionans4_"+num_ans+"'>"+
"</label>"+
"</div>"+
"</div>"+
		"</div>"
			);
			
			$('.btnRemove').on('click', function () { 
					rem_ans++;
					a_ans[parseInt($(this).parent().attr("id"))-1]=0;
					var a=count(a_mul);
					var b=count(a_ans);
					var c=count(a_dis);
					var d=count(a_true);
					$("span#total").text(a+b+c+d);
        			
					$("#total_ans").text(b);
        			$(this).parent().remove (); // remove the textbox
               });
    	});
		
		$("#add").click(function(e) {
		a_dis.push(1);
		num_dis++;
					var a=count(a_mul);
					var b=count(a_ans);
					var c=count(a_dis);
					var d=count(a_true);
					$("span#total").text(a+b+c+d);
        			
		$("#total_dis").text(c);
        
        $("#addarea").append(
				"<div class='field-box dis' id="+num_dis+">"+
					"<label>"+num_dis+"</label>"+
					"<textarea class='span10 question' rows='4' name='questiondis_"+num_dis+"'></textarea>"+
					"<input type='button' class='btnRemove icon-remove btn' value='Remove'>"+
				"</div>"
			);
			
			$('.btnRemove').on('click', function () { 
                    rem_dis++;
					a_dis[parseInt($(this).parent().attr("id"))-1]=0;
					var a=count(a_mul);
					var b=count(a_ans);
					var c=count(a_dis);
					var d=count(a_true);
					$("span#total").text(a+b+c+d);
        			
					$("#total_dis").text(c);
        			$(this).parent().remove (); // remove the textbox
                    
                });
    	});
		
		$("#addtrue").click(function(e) {
		a_true.push(1);
		num_true++;
		var a=count(a_mul);
					var b=count(a_ans);
					var c=count(a_dis);
					var d=count(a_true);
					$("span#total").text(a+b+c+d);
        			
		$("#total_true").text(d);
		
        $("#addtruearea").append(
		"<div class='field-box true' id="+num_true+">"+
					
"<label>"+num_true+"</label>"+
"<input class='span10 inline-input question' placeholder='Write Question' type='text' name='questiontrue_"+num_true+"'>"+
"<input type='button' class='btnRemove icon-remove btn' value='Remove'>"+
"<div class='field-box'>"+
"<label></label>"+
"<div class='span8'>"+
"<div class='row-fluid'>"+
"<div class='span4'>"+
"<label class='radio'>"+
"<input type='radio' name='anstrue_"+num_true+"' id='optionsRadios1' value='0' checked>"+
"True"+
"</label>"+
"</div>"+
"<div class='span4'>"+
"<label class='radio'>"+
"<input type='radio' name='anstrue_"+num_true+"' id='optionsRadios2' value='1'>"+
"False"+
"</label>"+
"</div>"+
"</div>"+
"</div>"+
         "</div>"
			);
			
			$('.btnRemove').on('click', function () { 
					rem_true++;
					a_true[parseInt($(this).parent().attr("id"))-1]=0;
					var a=count(a_mul);
					var b=count(a_ans);
					var c=count(a_dis);
					var d=count(a_true);
					$("span#total").text(a+b+c+d);
        			
					$("#total_true").text(d);
        			$(this).parent().remove (); // remove the textbox
                });
    	});
	
		$("input#submitQuiz").click(function() {
	var a=count(a_mul);
	var b=count(a_ans);
	var c=count(a_dis);
	var d=count(a_true);
	if(a+b+c+d==0){
		$("form>span#error").html("<div class='alert-info'>There is no <strong>Question</strong> to submit.</div>");
		return false;}
	//Quiz name
		var n=$("form>input#quizname").val();
		if(n==""){
			$("form>span#error").html("<div class='alert-info'>Fill <strong>Quiz Name</strong></div>");
			$("form>input#quizname").focus();
			return false;
		}
	//1.		  	
	for(var i=0;i<a_mul.length;i++)
	if(a_mul[i]==1){	
		var str="div.mul#"+(i+1);
		var n=$(str+" input.question").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice</strong> correctly.</div>");
			$(str+" input.question").focus();
			return false;
		}
		var n=$(str+" input.option1").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice</strong> correctly.</div>");
			$(str+" input.option1").focus();
			return false;
		}
		
		var n=$(str+" input.option2").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice</strong> correctly.</div>");
			$(str+" input.option2").focus();
			return false;
		}
		
		var n=$(str+" input.option3").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice</strong> correctly.</div>");
			$(str+" input.option3").focus();
			return false;
		}
		var n=$(str+" input.option4").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice</strong> correctly.</div>");
			$(str+" input.option4").focus();
			return false;
		}
	}
	//2.
	for(var i=0;i<a_ans.length;i++)
	if(a_ans[i]==1){	
		var str="div.ans#"+(i+1);
		var n=$(str+" input.question").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice/Multiple Answers</strong> correctly.</div>");
			$(str+" input.question").focus();
			return false;
		}
		var n=$(str+" input.option1").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice/Multiple Answers</strong> correctly.</div>");
			$(str+" input.option1").focus();
			return false;
		}
		
		var n=$(str+" input.option2").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice/Multiple Answers</strong> correctly.</div>");
			$(str+" input.option2").focus();
			return false;
		}
		
		var n=$(str+" input.option3").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice/Multiple Answers</strong> completely.</div>");
			$(str+" input.option3").focus();
			return false;
		}
		var n=$(str+" input.option4").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Multiple Choice/Multiple Answers</strong> completely.</div>");
			$(str+" input.option4").focus();
			return false;
		}
	}
	//3.
	for(var i=0;i<a_dis.length;i++)
	if(a_dis[i]==1){	
		var str="div.dis#"+(i+1);
		var n=$(str+" textarea.question").val();
		if(n==""){
		$("form>span#error").html("<div class='alert-info'>Fill <strong>Descriptive Questions</strong> completely.</div>");
			$(str+" textarea.question").focus();
			return false;
		}
	}
	//4.
		  	
	for(var i=0;i<a_true.length;i++)
	if(a_true[i]==1){	
		var str="div.true#"+(i+1);
		var n=$(str+" input.question").val();
		if(n==""){
			$("form>span#error").html("<div class='alert-info'>Fill <strong>True/False</strong> Questions completely.</div>");
			$(str+" input.question").focus();
			return false;
		}
	}
		});
		
		
	});
	</script> 
</head>
<body>
	<div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="#">
                    <i class="icon-home"></i>
                    <span>Add Content</span>
                </a>
            </li>            
            <li>
                <a href="editcourseinfo.php">
                    <i class="icon-signal"></i>
                    <span>Course Info</span>
                </a>
            </li>
             <li>
                <a href="createquiz.html">
                    <i class="icon-signal"></i>
                    <span>Add Quiz</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-signal"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-signal"></i>
                    <span>Idea Box</span>
                </a>
            </li>
                

        </ul>
    </div>

	<div class="content">
	    <div class="container-fluid">
        	<div id="pad-wrapper" class="form-page">
				<div class="row-fluid form-wrapper">

<form id="contact_form" method="post" action="process.php">
    <input type="text" class="span8" name="quizname" placeholder="Quiz Name" id="quizname">
    <span id="error"></span>
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
              <div class="tab-pane active" id="home">
                    <div class="span12 column" id="addmultiplearea"></div>
                    <div class="btn btn-primary" id="addmultiple">Add more Multiple Questions</div>
              </div>
              
              <div class="tab-pane" id="profile">
                      <div class="span12 column" id="addmultipleansarea"></div>
                    <div class="btn btn-primary" id="addmultipleans">Add more Multiple-Ans type Questions</div>
              </div>
              
              <div class="tab-pane" id="messages">
                  <div class="span12 column" id="addarea"></div>
                  <div class="btn btn-primary" id="add">Add more Decriptive Questions</div>
              </div>
              
              <div class="tab-pane" id="settings">
                  <div class="span12 column" id="addtruearea"></div>
                  <div class="btn btn-primary" id="addtrue">Add more True/False</div>
              </div>
              
            </div>     
        </div>

    
 </form>
        
        </div>
        </div>
        </div>
        </div>    
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
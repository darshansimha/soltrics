<?php 

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
function formvalidate()
{

var a=new Array();
 
 a[0]=document.f1.fname.value;
 a[1]=document.f1.lname.value;
  a[2]=document.f1.dept.value;
 a[3]=document.f1.univ.value;
  a[4]=document.f1.phone.value;
  a[5]=document.f1.pw.value;
  a[6]=document.f1.email.value;
  
  var i=0;
  var count=0;
  for(i=0;i<7;i++)
  {
  
  if(a[i]=="")
  {
  count++;
  }
  else{}
  }
  if(count>=1)
  {
  alert("Please Fill all the fields!");
  return false;
  }
  
  else{
  return true;
  }
  
  }
  

</script>



</head>


<body>





					
					<h2>Faculty Registration</a></h2>
					<p>Please fill up the form</p>
	<table>				
  <tr>
    <td>Firstname</td>
    <td><input type="text" name="fname"></td>
  </tr>
  <tr>
    <td>Lastname</td>
    <td><input type="text" name="lname"></td>
  </tr>
  <tr>
    <td>Department</td>
    <td><input type="text" name="dept"></td>
  </tr>
  <tr>
    <td>University</td>
    <td><input type="text" name="univ"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="pw"></td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><input type="text" name="phone"></td>
  </tr>
  
    <tr>
    
    <td><input type="submit" name="sub" value="Register" onClick="return formvalidate()"></td>
  </tr>
</table>		
						</form>
					

			

</body>
</html>

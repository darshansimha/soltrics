
<ul>
		<li><a href="index.php" class="first">Home</a></li>
	
		<?php
	
				if(!isset($_SESSION['student']))
				{
					echo '<li><a href="studentregister.php">Student Registration</a></li>';
				}
	
		?>
		
				
		<?php
	
				if(!isset($_SESSION['faculty']))
				{
					echo '<li><a href="facultyregister.php">Faculty Registration</a></li>';
				}
	
		?>
			            
				<li><a href="Contact.php">Contact</a></li>

				
		<?php
				if(isset($_SESSION['faculty']))
				{
					echo '<li><a href="postcourse.php">Post Course</a></li>';
				}
	
		?>	
		
		<?php

				if(isset($_SESSION['faculty']))
				{
					echo '<li><a href="manage.php">Manage Course</a></li>';
				}
	
		?>		

				<?php

				if(isset($_SESSION['faculty']))
				{
					echo '<li><a href="add_cat.php">Add Course Category</a></li>';
				}
	
		?>		
	
		
		<?php
	
				if(isset($_SESSION['student'])||isset($_SESSION['faculty']))
				{
					echo '<li><a href="process_logout.php">Logout</a></li>';
				}
	
				?>
</ul>
		

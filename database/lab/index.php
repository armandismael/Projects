	<?php

	if(!$_Session["credentials"]){
		header("Location:signin.html");
	}
	/*if($_Session["admin"] == 0){
		header("Location:instructor.html");
	}*/
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Index </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{
    background-image: url("background.jpg");
    background-repeat: no-repeat;
    background-position: top;
    background-size: 100% ;
}
.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Select a section Armand</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="studentSection.php" method="post">
			    			<div class="form-group">
			    				<h5>You are currently registred to: <?php /*add code here*/ ?></h5> 
			    				change section:
			    					<select name="sectionlist">
			    					<?php /*add code here*/ ?>
									  <option value="section1">10:00-11:00</option>
									   <option value="section2">11:00-12:00</option>
									    <option value="section3">12:00-13:00</option>
									</select>

			    			</div>				
			    			<input type="submit" value="Submit" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
<script type="text/javascript">

</script>
</body>
</html>

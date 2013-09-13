<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>Install Briefcase</title>
</head>
<body>
<nav>Select Target</nav>

<div class="buildlist">
  <table>
	<tr>
    	<td>
      	<a href="downloadPage.php?target=0">
        	<div class="instructions">Briefcase for Enterprise</div>
      	</a>
    	</td>
  	</tr>
  	<tr>
    	<td>
      	<a href="downloadPage.php?target=1">
        	<div class="instructions">Briefcase for Good</div>
      	</a>
    	</td>
  	</tr>
  	<tr>
    	<td>
      	<a href="downloadPage.php?target=2">
        	<div class="instructions">Briefcase Pro</div>
      	</a>
    	</td>
  	</tr>
  	<tr>
    	<td>
      	<a href="downloadPage.php?target=3">
        	<div class="instructions">Briefcase Lite</div>
      	</a>
    	</td>
  	</tr>
  	<tr>
    	<td>
      	<a href="downloadPage.php?target=4">
        	<div class="instructions">Briefcase Trial</div>
      	</a>
    	</td>
  	</tr>
 </table>
</div>

<form enctype="multipart/form-data" action="upload.php" method="POST">

<select name="target">
  <option value="0">Briefcase for Enterprise</option>
  <option value="1">Briefcase for Good</option>
  <option value="2">Briefcase Pro</option>  
  <option value="3">Briefcase Lite</option> 
  <option value="4">Briefcase Trial</option> 
</select>

 Please choose a file: <input name="uploaded" type="file" /><br />
 <input type="submit" value="Upload" />
 </form> 


</body>
</html>
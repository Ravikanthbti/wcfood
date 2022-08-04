<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="{{ url('/get_filter')}}" method="GET">
    <input type="text" name="min_price">   
    <input type="text" name="max_price">  
    <input type="text" name="keyword" >  
    <input type="submit" value="Filter">
</form>
</body>
</html>
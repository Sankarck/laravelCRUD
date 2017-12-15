<html>
<head>
	<script type="text/javascript"> 
		function objectsTry()
		{
			emp={id:102,name:"Shyam Kumar",salary:40000}  
		}
		document.getElementById('ref').innerHTMl=emp.id+" "+emp.name+" "+emp.salary;  
	</script>
</head>
<body>
	<form name="sample" >
		<input type="button" name="btn" value="click me" onclick="objectsTry()">
    </form>

    <div id="ref"></div>
</body>
</html>

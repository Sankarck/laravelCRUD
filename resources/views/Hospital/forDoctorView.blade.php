

<!DOCTYPE html>
<html>
	<head>
		<title>Display</title>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>	
 <body>
	<table class="table table-bordered">
		<thead>
			<th>PATIENT NAME</th>
			<th>DOB</th>
			<th>AGE</th>
			<th>SEX</th>
			<th>TREATMENT</th>
			<th>DESCRIPTION</th>
			<th>IMAGES</th>
		</thead>
		</thead>
		</thead>
     <tbody>
                 <div class="pull-right">
                	<a class="btn btn-success" href="{{ url('login') }}">LOGOUT</a>
                 </div>
                 @foreach( $patient_data as $temp)
					<tr>
						<td>{{$temp->Name}}</td>
						<td>{{$temp->DOB}}</td>
						<td>{{$temp->Age}}</td>
						<td>{{$temp->Sex}}</td>
						<td>{{$temp->Treatment}}</td>
						<td>{{$temp->Description}}</td>
						<td>{{$temp->Images}}</td>
						
					</tr>				
				 @endforeach				
 		</tbody>
	  </table>
	     {{$patient_data->links() }}
	</body>
</html>

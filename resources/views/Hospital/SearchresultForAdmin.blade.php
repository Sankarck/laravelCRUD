<!DOCTYPE html>
<html>
	<head>
		<title>Display</title>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="http://code.jquery.com/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
          <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
          
	</head>	
 <body>
	<table class="table table-bordered" id="mytable">
		<thead>
			<th>PATIENT NAME</th>
			<th>DOB</th>
			<th>AGE</th>
			<th>SEX</th>
			<th>TREATMENT</th>
			<th>DESCRIPTION</th>
			<th>IMAGES</th> 
			<th colspan="2">ACTIONS</th>                    
		</thead>
		</thead>
		</thead>      
     <tbody>
                
                <br>
                 <div class="container">
                    <form action="{{url('search')}}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search"
                                placeholder="Search users"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                 </div>
                 <br>
                 @foreach( $p_name as $temp)
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
      
	</body>    
</html>

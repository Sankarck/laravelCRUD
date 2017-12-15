<!DOCTYPE html>
<html>
    <head>
        <title>ADMIN EDIT</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        </script>
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
        <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    </head>
<body>
    <center>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <center>   
        <form action="{{url('update')}}" method="POST" >
        <input type="hidden" value="{{ $patientdetails->id}}" name="formId" />

        {{ csrf_field() }}

            <h1>EDIT PATIENT DETAILS HERE</h1>

            <p>NAME:</p>

            <p><input type="text" name="patient_name" value="{{ $patientdetails->Name}}" ></p>
    
            <p>DOB :</p>
    
            <p><input type="text" name="dob" id="dob" value="{{ $patientdetails->DOB}}" ></p> 

            <p>AGE:</p>
    
            <p><input type="text" name="age" id="age" value="{{ $patientdetails->Age}}" ></p>

            <p>DESCRIPTION :</p>
    
            <p><input type="textarea" name="description" value="{{ $patientdetails->Description}}"></p>

            <p><input type="submit"  value="UPDATE"></p>

            <p><input type="button" name="cancel" value="CANCEL" onClick="window.location='{{url('displayData')}}';" /></p>
    </center>
    <script type="text/javascript">

            $(document).ready(function(){
            $('#dob').datepicker({autoclose: true}).on('changeDate', function(ev) {
                console.log(ev);
                var today = new Date(),
                age = today.getFullYear() - ev.date.getFullYear();
                $('#age').val(age);
            });
        });
    
    </script>

    
</body>
</html>


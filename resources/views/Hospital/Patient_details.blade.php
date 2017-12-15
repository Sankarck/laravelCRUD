<!DOCTYPE html>
<html>
    <head>
        <title>ADMIN FILL</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        </script>
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
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
        <form action="{{url('patientDetails')}}" method="POST" onubmit="return ageCalculate()" enctype="multipart/form-data" >

        {{ csrf_field() }}

            <h1>PATIENT DETAILS</h1>

            <p>NAME:</p>
    
            <p><input type="text" name="patient_name" ></p>
    
            <p>DOB :</p>
    
            <p><input type="text" name="dob" id="dob"></p> 

            <p>AGE :</p>

            <p><input type="text" name="age" id="age"></p>

            <p>SEX :</p>

            <p>
            <input type="radio" name="gender" value="male" >MALE
            <input type="radio" name="gender" value="female">FEMALE
            </p> 

            <p>TREATMENT</p>
            
            <p><input type="checkbox" name="Treatment[]" value="cardio">Cardio
                <input type="checkbox" name="Treatment[]" value="Neuro">Neuro
                <input type="checkbox" name="Treatment[]" value="Gastro">Gastro
            </p>

            <p>DESCRIPTION :</p>
    
            <p><input type="textarea" name="description"></p>

            <p>IMAGE</p>

            <p><input type="file" name="image"></p>

            <p><input type="submit"  value="INSERT"></p>

            <p><input type="button" name="cancel" value="cancel" onClick="window.location='{{url('/Hospital/login')}}';" /></p>
    </center>

    <script type="text/javascript">
        
        function ageCalculate() {
                    var birthDate =document.getElementById('dob').value;
                    var mdate = birthDate.toString();
                    var yearThen = parseInt(mdate.substring(0,4), 10);
                    var monthThen = parseInt(mdate.substring(5,7), 10);
                    var dayThen = parseInt(mdate.substring(8,10), 10);
                    var today = new Date();
                    var birthday = new Date(yearThen, monthThen-1, dayThen);
                    var differenceInMilisecond = today.valueOf() - birthday.valueOf();	       
                    var year_age = Math.floor(differenceInMilisecond / 31536000000);
                    document.getElementById("age").value= year_age + " years ";
                // document.getElementById("dob").value= year_age;   
                    return true;     
                }  
        
        $(document).ready(function(){
            $('#dob').datepicker({autoclose: true}).on('changeDate', function(ev) {
                // console.log(ev); console.log(ev.date.getFullYear());
                var today = new Date(), 
                age = today.getFullYear() - ev.date.getFullYear();
                $('#age').val(age);

            });
        });

        </script>
    
</body>
</html>
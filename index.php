   
    <!DOCTYPE html>  
    <html>  
    <head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>  
    <link rel="stylesheet" type="text/css" href="style.css"> 
    </head>  
    <body>  
    
    <?php  
    // define variables to empty values  
    $nameErr = $emailErr = $mobilenoErr = $genderErr = "";  
    $name = $email = $mobileno = $gender = "";  
      
    //Input fields validation  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
          
    //String Validation  
        if (empty($_POST["name"])) {  
             $nameErr = "Name is required";  
        } else {  
            $name = input_data($_POST["name"]);  
                // check if name only contains letters and whitespace  
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                    $nameErr = "Only alphabets and white space are allowed";  
                }  
        }  
          
        //Email Validation   
        if (empty($_POST["email"])) {  
                $emailErr = "Email is required";  
        } else {  
                $email = input_data($_POST["email"]);  
                // check that the e-mail address is well-formed  
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                    $emailErr = "Invalid email format";  
                }  
         }  
        
        //Number Validation  
        if (empty($_POST["mobileno"])) {  
                $mobilenoErr = "Mobile no is required";  
        } else {  
                $mobileno = input_data($_POST["mobileno"]);  
                // check if mobile no is well-formed  
                if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
                $mobilenoErr = "Only numeric value is allowed.";  
                }  
            //check mobile no length should not be less and greater than 10  
            if (strlen ($mobileno) != 10) {  
                $mobilenoErr = "Mobile no must contain 10 digits.";  
                }  
        }  
          
        //Empty Field Validation  
        if (empty($_POST["gender"])) {  
                $genderErr = "Gender is required";  
        } else {  
                $gender = input_data($_POST["gender"]);  
        }  
      
    }  
    function input_data($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    }  
    ?> 
    
      
    <h2>Student Registration Form</h2>     
    <form action="index.php" method="POST">    
        <div class="display">
            <label>Name:*</label>   
            <input type="text" name="name">
            <label2><?php echo $nameErr; ?></label2> 
        </div>
        <div class="display">
            <label>Student Id:</label>   
            <input type="text" name="id">  
        </div>
        <div class="display">
            <label>Parent's name:</label>   
            <input type="text" name="pname">  
        </div>
        <div class="display">
            <label>Course:</label>   
            <input type="text" name="course">  
        </div>
        <div class="display">
            <label>Department:</label>   
            <input type="text" name="dept">  
        </div>
        <div class="display">
            <label>Semester:</label>   
            <input type="text" name="sem">  
        </div>
        <div class="display">
            <label>E-mail:*</label>   
            <input type="text" name="email">
            <label2><?php echo $emailErr; ?></label2>
        </div> 
        <div class="display">
            <label>Mobile No:*</label>   
            <input type="text" name="mobileno" >
            <label2><?php echo $mobilenoErr;?></label2>
        </div> 
        <div class="display">
            <label>Gender:*</label>  
            <input type="radio" name="gender" value="male" style="width:2%"><label1>Male</label1><br>
            <input type="radio" name="gender" value="female" style="width:2%"><label1>Female</label1><br>
            <input type="radio" name="gender" value="other" style="width:2%"><label1>Other</label1><br>
            <label2><?php echo $genderErr; ?></label2>  
        </div>
        <div class="display">
            <label>GPA:</label>   
            <input type="text" name="gpa">  
        </div>
       <br>
       <div class="display">
        <button type="submit" class="btn" name="submit" value="submit">Register</button>                            
    </div>
        <br><br>                             
    </form>  
      
    <?php  
        if(isset($_POST['submit'])) {  
        if($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "") {  
            echo "<h4> <b>You have sucessfully registered.</b> </h4>";   
        } else {  
            echo "<h3> <b>You didn't fill up the form correctly.</b> </h3>";  
            return;
        } 
        $name = $_POST['name'];
        $id = $_POST['id'];
        $pname = $_POST['pname'];
        $course = $_POST['course'];
        $dept = $_POST['dept'];
        $sem = $_POST['sem'];
        $email = $_POST['email'];
        $mobile = $_POST['mobileno'];
        $gender = $_POST['gender'];
        $gpa = $_POST['gpa'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'registration';

        $conn = mysqli_connect($host,$user,$pass,$dbname);
        $sql = "INSERT INTO student(name,id,pname,course,dept,sem,email,mobile,gender,gpa) 
        values ('$name','$id','$pname','$course','$dept','$sem','$email','$mobile','$gender','$gpa')";
        mysqli_query($conn,$sql);
        }  
    ?>  
      
    </body>  
    </html>  
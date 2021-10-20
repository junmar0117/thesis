<?php
$vkey = uniqid(true);
$code = $vkey;
?>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title> AidPack | Civilian Register </title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/C_register_login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    
    <nav>
    <?php
        include_once('header.php');
    ?>
    </nav>
    <table class="rlcontain">
        <tr>
            <th class="rlinfo">
                <h1 class="rlch1">Hello, Citizen!</h1>
                <h2 class="rlch2">Create your account to access and report with R&R.</h2>
            </th>
                <td class="register-box">
    <div >
        <h2 class="rlch1">Create Account</h2>
        
        <form action="C_register.php" method="POST" id="myEmail">

            <table class="cressubt">
                <tr>
                    <td>
        <div class="register-box2">
        <label>First Name</label>
            <input type="text" id="name" required="required" name="fname" placeholder="">
        
        </div>
</td>
<td>
        <div class="register-box2">
        <label>Last Name</label>
            <input type="text" id="name" required="required" name="lname" placeholder="">
        
        </div>
</td>
</tr>
</table>

        <div class="register-box2">
        <label>Date of birth</label>
            <input type="date" id="age" required="required" name="birthday" placeholder="">
           
        </div>

        <div class="register-box2">
        <label>Barangay</label>
        <br>
            <select name="barangays" id="barangays" required="required">
                <option value="833">Barangay 833</option>
                <option value="834">Barangay 834</option>
                <option value="835">Barangay 835</option>
                <option value="836">Barangay 836</option>
                <option value="837">Barangay 837</option>
                <option value="838">Barangay 838</option>
                <option value="839">Barangay 839</option>
                <option value="840">Barangay 840</option>
                <option value="841">Barangay 841</option>
                <option value="842">Barangay 842</option>
                <option value="843">Barangay 843</option>
                <option value="844">Barangay 844</option>
                <option value="845">Barangay 845</option>
                <option value="846">Barangay 846</option>
                <option value="847">Barangay 847</option>
                <option value="848">Barangay 848</option>
                <option value="849">Barangay 849</option>
                <option value="850">Barangay 850</option>
                <option value="851">Barangay 851</option>
                <option value="852">Barangay 852</option>
                <option value="853">Barangay 853</option>
                <option value="854">Barangay 854</option>
                <option value="855">Barangay 855</option>
                <option value="856">Barangay 856</option>
                <option value="857">Barangay 857</option>
                <option value="858">Barangay 858</option>
                <option value="859">Barangay 859</option>
                <option value="860">Barangay 860</option>
                <option value="861">Barangay 861</option>
                <option value="862">Barangay 862</option>
                <option value="863">Barangay 863</option>
                <option value="864">Barangay 864</option>
                <option value="865">Barangay 865</option>
                <option value="866">Barangay 866</option>
                <option value="867">Barangay 867</option>
                <option value="868">Barangay 868</option>
                <option value="869">Barangay 869</option>
                <option value="870">Barangay 870</option>
                <option value="871">Barangay 871</option>
                <option value="872">Barangay 872</option>
            </select>
        </div>

        <div class="register-box2">
        <label>Contact Number</label>
            <input type="tel" id="contact_no" required="required" name="contact_number" placeholder="" pattern="[0,9]{2}[0-9]{9}">
            
        </div>

        <div class="register-box2">
        <label>Email</label>
            <input type="text" id="email" required="required" name="email" placeholder="">
            
        </div>

        <div class="register-box2">
        <label>Username</label>
            <input type="text" id="username" required="required" name="username" placeholder="">
            
        </div>

        <div class="register-box2">
        <label>Password</label>
            <input type="password" id="form_password" required="required" name="password" placeholder="" pattern="(?=.*[^\w])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, one special case character, and at least 8 or more characters">
            
        </div>

        <div class="register-box2">
        <label>Confirm Password</label>
            <input type="password" id="cpassword" required="required" name="cpassword" placeholder="" pattern="(?=.*[^\w])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, one special case character, and at least 8 or more characters">
            
        </div>
<br>
            <input type="hidden" name="codes" value="<?php echo $code; ?>">
            <input type="hidden" id="name" value="AidPack | R & R">
            <input type="hidden" id="subject" value="Reports from AidPack | R & R">
            <input type="hidden" id="body" value="<a href='http://localhost/thesiss/verify.php?vkey=<?php echo $code; ?>'>Register Account</a>">

            <input type="submit" value="Register" class="C_registerbtn" onclick="sendEmail1()">
            <a href="C_login.php" id="signininstead">Already have an account? Log in here.</a>
        </form>

    </div>
</td>
</tr>
</table>
<div class="footer3">
          </div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    function sendEmail1()
    {
        var name = $("#name");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");

        if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body))
        {
            $.ajax({
                url: 'sendEmail1.php',
                method: 'POST',
                dataType: 'json',
                data:{
                    name: name.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val(),
                }, success: function(response){
                    $('#myEmail')[0].reset();
                    $('.sent-notification').text("Message Sent!");
                }
            });
        }
    }
    function isNotEmpty(caller){
        if(caller.val() == ""){
            caller.css('border', '1px solid red');
            return false;
        }else{
            caller.css('border', '');
            return true;
        }
    }
    </script>

</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fname = ucwords(($_POST['fname']));
	$lname = ucwords(($_POST['lname']));
    $contact_no = ($_POST['contact_number']);
	$birthday = ($_POST['birthday']);
	$barangays = ($_POST['barangays']);
	$email = ($_POST['email']);
	$username = ($_POST['username']);
	$password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
    $vkey1 = ($_POST['codes']);
    
    $bool = true;

   
	require 'connection.php';
	$query = "SELECT * from civilians";
	$results = mysqli_query($con, $query); //Query the users table

	while($row = mysqli_fetch_array($results)) //display all rows from query    
	{
		
        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("C_register.php");</script>'; // redirects to register.php
		}
    }
    
    
        if ($bool) // checks if bool is true
        {
          if($password === $cpassword)
          {
          $password = password_hash($password, PASSWORD_DEFAULT);
          mysqli_query($con, "INSERT INTO civilians (fname, lname, birthday, address,email,contact_no,username, password,vkey) VALUES ('$fname','$lname','$birthday','$barangays','$email','$contact_no','$username','$password','$vkey1')"); //Inserts the value to table users
          print '<script>alert("Successfully Registered! A verification email has been sent to the email address that you provided."); </script>'; // Prompts the user
          print '<script>window.location.assign("C_login.php");</script>'; // redirects to register.php
          }
          else
          {
            print '<script>alert("Password did not match! Please Try Again!"); </script>'; // Prompts the user
            print '<script>window.location.assign("C_login.php");</script>'; // redirects to register.php
          }
        }
      
	}
?>



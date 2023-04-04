<html>
    <head>
        <title>Rishton Academy Primary School</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"><!--helps scale website to fir device-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--stylesheet to fix the navbar, from W3Schools-->
        <link rel="stylesheet" href="rishton.css"> <!--links to the css style page-->

    </head>
    <body>
        <div class="navbar"><!--navigation bar for navigating through the website and all it's functions... adapted from W3schools nav bar-->
            <a href="index.html">Home</a><!--link takes you to the home page-->
             <div class="dropdown">
              <button class="dropbtn">Pupils<!--has dropdown for viewing, adding, deleting, and updating student info-->
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="ViewPupil.php">View</a>
                <a href="AddPupil.php">Add</a>
                <a href="UpdatePupil.php">Update</a>
                <a href="DeletePupil.php">Delete</a>
              </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Teachers<!--has dropdown for viewing, adding, deleting, and updating teacher info-->
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="ViewTeacher.php">View</a>
                    <a href="AddTeacher.php">Add</a>
                    <a href="UpdateTeacher.php">Update</a>
                    <a href="DeleteTeacher.php">Delete</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Classes <!--has dropdown for viewing, adding, deleting, and updating class info-->
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="ViewClass.php">View</a>
                    <a href="AddClass.php">Add</a>
                    <a href="UpdateClass.php">Update</a>
                    <a href="DeleteClass.php">Delete</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Parents <!--has dropdown for viewing, adding, deleting, and updating parent info-->
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="ViewParent.php">View</a>
                    <a href="AddParent.php">Add</a>
                    <a href="UpdateParent.php">Update</a>
                    <a href="DeleteParent.php">Delete</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Pupils/Parents <!--has dropdown for viewing, adding, deleting, and updating parent/pupil info-->
                 <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                   <a href="ViewPupilParent.php">View</a>
                   <a href="AddPupilParent.php">Add</a>
                   <a href="UpdatePupilParent.php">Update</a>
                   <a href="DeletePupilParent.php">Delete</a>
                </div>
            </div>
          </div>
          <div>
            <br>
            <form method="post" action="AddTeacher.php"><!--creates a form to add a new teacher that needs a first name, last name, phone number, address, salary, background check and class ID-->
  
                  <label for="FName">First Name:</label>
                  <input type="text" name="FName"><br><br>

                  <label for="LName">Last Name:</label>
                  <input type="text" name="LName"><br><br>

                  <label for="phone">Phone Number:</label>
                  <input type="number" name="phone"><br><br>

                  <label for="Address">Address:</label>
                  <input type="text" name="Address"><br><br>

                  <label for="money">Salary:</label>
                  <input type="number" name="money"><br><br>
            
                  <label for="BackgroundCheck">Background Check:</label>
                    <select id="MedicalRecord" name="BackgroundCheck">
                      <option value="Checked">Checked</option>
                      <option value="NotChecked">Not Checked</option>
                    </select><br><br>

                  <label for="classid">Class ID:</label>
                  <input type="number" name="classid">
            
                  <br><br>
  
                  <input type="submit" name="submit">
  
                </form>
          </div>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); //displays errors

//mysqli_connect() function establishes a connection with MySQL server and returns the connection as an object.
/*
   $host = "localhost";
   $username  = "root";
   $passwd = " ";
   $dbname = "school";
*/
$link = mysqli_connect("sdb-57.hosting.stackcp.net", "student50-3530313512c8", "ua92-studentAc", "student50-3530313512c8");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}


/*
The isset() function checks whether a variable
 is set, which means that it has to be declared 
 and is not NULL. 
 This function returns true if the variable
  exists and is not NULL, 
  otherwise it returns false.
*/
if (isset($_POST['submit'])) {

    $fname = $_POST['FName'];
    $lname = $_POST['LName'];
    $phone = $_POST['phone'];
    $address = $_POST['Address'];
    $BaChe = $_POST['BackgroundCheck'];
    $salary = $_POST['money'];
    $Cid = $_POST['classid'];

    
/*
mysqli_query() function accepts a string value
representing a query as one of the parameters
and, executes/performs the given query 
on the database
*/
    $sql = "INSERT INTO Teachers (class_id,teach_Fname,teach_Lname,phone_number,address,salary,background_check) VALUES ('$Cid','$fname','$lname','$phone','$address','$salary','$BaChe')"; //creates a new teacher based on the submitted information in AddTeacher.php form
    if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error adding record ";
    }

}

?>
    </body>
</html>
<html>
    <head>
        <title>Rishton Academy Primary School</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"><!--helps scale website to fir device-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--stylesheet to fix the navbar-->
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
            <form method="post" action="AddPupilParent.php"><!--creates a form to add a new pupil and parent relationship that needs their pupil and parent IDs-->
  

                  <label for="pupilid">Pupil ID:</label>
                  <input type="number" name="pupilid">

                  <label for="parentid">Parent ID:</label>
                  <input type="number" name="parentid">
            
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

    $puid = $_POST['pupilid'];
    $paid = $_POST['parentid'];


    
/*
mysqli_query() function accepts a string value
representing a query as one of the parameters
and, executes/performs the given query 
on the database
*/
    $sql = "INSERT INTO ParentsPupils (pupil_id, parent_id) VALUES ('$puid','$paid')"; //creates a new pupil parent relationship based on the submitted information in AddPupilParent.php form
    if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error adding record ";
    }

}

?>
<!--list of parents and pupils to make relationships easier to make-->
<h2>See all Pupils</h2>
        <table>
            <tr>
            <th width="100px">Pupil ID<br><hr></th>
            <th width="150px">First Name<br><hr></th>
            <th width="150px">Last Name<br><hr></th>
            <th width="150px">Address<br><hr></th>
            <th width="150px">Medical Record<br><hr></th>
            <th width="150px">Dinner Money<br><hr></th>
            <th width="150px">Class ID<br><hr></th>
            </tr>
            
            <?php
            /* 	function fetches a result row as an associative array.
              Note: Fieldnames returned from 
               this function are case-sensitive.
            */	
            $sql = mysqli_query($link, "SELECT * FROM Pupils");
            while ($row = $sql->fetch_assoc()){
            echo "
            <tr>
            <th>{$row['pupil_id']}</th>
            <th>{$row['pupil_Fname']}</th>
            <th>{$row['pupil_Lname']}</th>
            <th>{$row['address']}</th>
            <th>{$row['medical_record']}</th>
            <th>{$row['Dinner_Money']}</th>
            <th>{$row['class_id']}</th>
            </tr>";
            }
            ?>
        </table>
        
        <h3>See all Parents</h3>
	
        <table>
            <tr>
            <th width="100px">Parent ID<br><hr></th>
            <th width="150px">First Name<br><hr></th>
            <th width="150px">Last Name<br><hr></th>
            <th width="150px">Address<br><hr></th>
            <th width="150px">Email<br><hr></th>
            <th width="150px">Telephone<br><hr></th>
            </tr>
            
            <?php
            /* 	function fetches a result row as an associative array.
              Note: Fieldnames returned from 
               this function are case-sensitive.
            */	
            $sql = mysqli_query($link, "SELECT * FROM Parents");
            while ($row = $sql->fetch_assoc()){
            echo "
            <tr>
            <th>{$row['parent_id']}</th>
            <th>{$row['parent_Fname']}</th>
            <th>{$row['parent_Lname']}</th>
            <th>{$row['address']}</th>
            <th>{$row['email']}</th>
            <th>{$row['telephone']}</th>
            </tr>";
            }
            ?>
        </table>
    </body>
</html>
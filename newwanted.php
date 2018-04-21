<?php session_start();
echo "<script>togglefunc();</script>";
if(!isset($_SESSION['username'])) {
   header( 'Location: http://localhost/DBMS-Project/index.php');
}
?>

<?php

    if(isset($_REQUEST['submit'])) {
        $servername = "localhost";
        $username = "root";
        $password ="";
        $dbname = "DBMSProject";


        $target_dir = "wanted/";
        $conn = mysqli_connect($servername,$username,$password);
        mysqli_select_db($conn,$dbname);

        if($conn->connect_error)
        {
            die("connection error".$conn->connect_error);
        }
        $filename = $_FILES["fileToUpload"]["name"];

        $upload = 1;

        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
        $file_ext = substr($filename, strripos($filename, '.')); // get file name
        if($file_ext != ".jpg" && $file_ext != ".png" && $file_ext != ".jpeg" && $file_ext != ".gif" )
        {
            alert( "Sorry, only JPG, JPEG, PNG & GIF files are allowed." );
            $upload =0;
        }
        $newfilename = md5($file_basename) . $file_ext;

        if(file_exists("wanted/".$newfilename))
        {
            alert( "Sorry, file already exists.");
            $upload = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 5000000)
        {
            alert ("Sorry, your file is too large.");
            $upload = 0;
        }


        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], ("wanted/".$newfilename) ))
        {
            echo "hello";
            $name = $_POST['name'];
            $description = $_POST['description'];
            $lastseen = $_POST['lastseen'];
            $addr = "wanted/".$newfilename;
            //$var10 = $_SESSION['type'];
            //$var11 = $_SESSION['username'];
                $sql = "INSERT into  wantedtable (name , description , lastseen , photoaddress ) values ( '$name',  '$description' , ' $lastseen ' , '$addr' )";
                if($upload ==1)
                {
                    // try {
                    //     mysqli_query($conn,$sql);
                    //     alert("Successfully added");
                    //     header('Location:http://localhost/DBMS-Project/newwanted.php');
                    //     exit();
                    // }
                    // catch (mysqli_sql_exception $exception) {
                    //     alert ($exception->getMessage());
                    // }
                    $conn->query($sql);
                    alert("Successfully added");
                    header('Location:http://localhost/DBMS-Project/copmainpage.php');
                    exit();
                }
        }

    }
    function alert($msg){
        echo "<script> alert('$msg'); </script>";
    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="newwanted.css">
    <title>
        New Wanted
    </title>
    <script type="text/javascript">
        function maxDateSetter() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd
            }
            if(mm<10){
                mm='0'+mm
            }
            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("datefield").setAttribute("max", today);
        }
    </script>
</head>
<body>
    <div class = "top">
        <span class="mainheading">Online FIR Portal</span>
            <p style="float: left ; width: 60%; text-align: right; margin-top: 2%;"; > <img style="margin-bottom: 1%;" src="user.png"> <?php echo $_SESSION['username'] ; ?> &nbsp; &nbsp; &nbsp; <a href="http://localhost/DBMS-Project/logout.php"><img src="logout.png"> Logout</a></p>
    </div>

    <div class ="leftt">
        <a href="http://localhost/DBMS-Project/copmainpage.php" class = "anchor" >
            <div class = "clickable">
                Home
            </div>
        </a>

        <a href="http://localhost/DBMS-Project/copprofile.php" class = "anchor" >
            <div class = "clickable">
                Profile
            </div>
        </a>

        <a href="http://localhost/DBMS-Project/showcopfir.php" class = "anchor" >
            <div class = "clickable">
                Check FIR Records
            </div>
        </a>

        <a href="http://localhost/DBMS-Project/updatefircop.php" class = "anchor" >
            <div class = "clickable">
                Update FIR Status
            </div>
        </a>

        <a href="http://localhost/DBMS-Project/wantedpage.php" class = "anchor" >
            <div class = "clickable">
                Wanted List
            </div>
        </a>

        <a href="http://localhost/DBMS-Project/contactus.html" class = "anchor" >
            <div class = "clickable">
                Contact Log
            </div>
        </a>

    </div>


    <div class="main-panel">
        <form class = "lodge" method = "POST" action="<?php echo htmlspecialchars("$_SERVER[PHP_SELF]");?>" enctype="multipart/form-data">
            <label for = "name">Name ( Optional )</label>
            <input type="text" name = "name">
            <label for = "description">Description</label>
            <textarea rows="3" required name="description"></textarea>
            <label for = "lastseen">Last Seen ( Optional )</label>
            <input id = "datefield" type="date" max="2019-09-03" name = "lastseen"><br>
            <label for="image"  style="padding-top: 1%">Image</label>
            <input type="file"  name = "fileToUpload" id = "fileToUpload" required>
            <button type="submit" name="submit" > Submit Details</button>
            <br><br><br>
        </form>
    </div>
    <script type="text/javascript">
        maxDateSetter();
    </script>
<script type="text/javascript">
    maxDateSetter();
</script>
</body>
</html>
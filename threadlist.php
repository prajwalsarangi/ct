<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iDiscuss- coding forums</title>
</head>

<body>
    <?php  include 'dbconnect.php';?>
    <?php  include 'header.php';?>

    <?php 
      $id =  $_GET['catid'];
      $sql =  "SELECT * FROM `categories` WHERE category_id = $id";
      $result = mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($result)) {
              $catname = $row['category_name'];
              $catdesc = $row['category_description'];
          }  
     ?>
    <!-- carousel starts here-->
    <?php 
    $showAlert = false; 
     $method = $_SERVER['REQUEST_METHOD'];
     if($method== 'POST'){
       // isert into thread into db
       $th_title =  $_POST['title'];
       $th_desc =   $_POST['desc'];
       $th_title = str_replace("<", "&lt;" ,$th_title);
       $th_title = str_replace(">","&gt;",$th_title);

       $th_desc  = str_replace("<", "&lt;" ,$th_desc );
       $th_desc  = str_replace(">","&gt;",$th_desc );

       $sno = $_POST['sno']; 
       $sql =  "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
       $result = mysqli_query($conn,$sql);
       $showAlert = true;
   
       if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your thread has been added please wait for the community to respond
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
       }
     }
    ?>
 
    <!--category container starts here-->
    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname?> forums</h1>
            <p class="lead"><?php echo $catdesc ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with other. Do not cross post questions. ..No Spam /
                Advertising / Self-promo in the forums is no Do not post copyright-infringing material. ... Do not post
                “offensive” posts, links or images. ...
                .
                Do not PM users asking for help. ...
                Remain respectful of other members at all times.</p>
            <a class="btn btn-outline-success btn-lg" href="about.php" role="button">Learn more</a>
        </div>
    </div>
 
    <?php 
       if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin'] = true){

     
        echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1> 
        <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                    possible</small>
            </div>
            <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
} 
    

    else {
        echo '  <div class="container">
        <p class = "lead">You are not logged in.Please log in to start a discussion</p>
    </div>';
    }
   ?>
  
    <div class="container">
        <h1 class="py-2">Browse Questions</h1>
        <?php 
      $id =  $_GET['catid'];
      $sql =  "SELECT * FROM `threads` WHERE thread_cat_id = $id";
      $result = mysqli_query($conn,$sql);
      $noResult = true;
      while ($row = mysqli_fetch_assoc($result)) {
              $noResult = false;
              $id = $row['thread_id'];
              
              $title = $row['thread_title'];
              $desc = $row['thread_desc'];
              $thread_time = $row['timestamp']; 
              $thread_user_id = $row['thread_user_id'];
          $sql2= "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
          $result2= mysqli_query($conn, $sql2);  
          $row2= mysqli_fetch_assoc($result2);
   
          



       echo '<div class="d-flex">
            <div class="flex-shrink-0">
              <img src="user_default.png"width = "50px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
            <p class="fw-bolder">'.$row2['user_email'].' at '. $thread_time.'</p>
            <h5 class = "mt-0"> <a class = "text-dark" href = "thread.php?threadid='.$id.'">'.$title.'<a/><h5>
                
            </div>
          </div>'; 

    }  
   // echo var_dump($noResult);
   
    if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No questions in this category</h1>
          <p class="lead">Be the first person to ask  aquestion</p>
        </div>
      </div>';
    }
?>







    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
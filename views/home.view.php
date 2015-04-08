<?php 

require '../blog.php';
use Blog\DB; 

$cards = DB\get('cards', $conn); 

if(isset($_GET['logout'])){ 
    session_destroy();
    header("Location: /idbs/index.php"); //Redirect the user to index page
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title> Dashboard </title>

  <!-- CSS  -->
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/for_home.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>
  <nav class="indigo accent-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="home.view.php" class="brand-logo ">IDEAS BOARD </a>
      <ul class="right hide-on-med-and-down">
        <li>
            <a href="#add-model" data-position="bottom" data-delay="50" data-tooltip="Add a new Card" id="btn-add-model" class="btn-floating tooltipped btn-large waves-effect waves-light blue lighten-1 modal-trigger">
              <i class="mdi-content-add"></i></a>&nbsp;&nbsp;&nbsp;
        </li>
        <li><a id="signout" href="#">Sign Out</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">

        <li><a id="signout" href="#">Sign Out</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>


  <div id="add-modal" class="modal " >
    <form method="POST" action="">
    <div class="modal-content">
      
      <div class="row">
        <div class="input-field col s12 ">
          <input id="title" type="text" class="validate ">
          <label for="title">Title : </label>
        </div>
      </div>
      <div class="row">
        <div class="file-field input-field col s12 ">
          <input class="file-path validate" type="text"/>
          <div class="btn">
            <span>Upload </span>&nbsp;&nbsp;
            <input type="file" />
          </div>
        </div>
        <div class="row">
          <div class="row">
          <div class="input-field col s12 ">
            <textarea id="textarea1" class="materialize-textarea" length="120"></textarea>
            <label for="textarea1">Post : </label>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn waves-effect waves-light"  type="submit" name="action">Submit
        <i class="mdi-content-send center"></i>
      </button>
   </div>
 </form>
</div>

<!-- <h1>Helloo .. <?= $_SESSION['username']; ?></h1> -->


<?php foreach ($cards as $card ) : ?> 
<div id="container">  
<div class="row js-masonry" data-masonry-options='{ "columnWidth": 200, "itemSelector": ".row", "isOriginLeft": true, "isOriginTop": true }' >
        <div class="col s12 m7">
          <div class="card ">
            <div class="card-image">
               <?php if(isset($card['file'])){
                        $card['file'];
               } else { ?>
                <img src="../img/12.jpg">
               <?php } ?>  
              <span class="card-title"><?= $card['title']; ?></span>
            </div>
            <div class="card-content">
              <p><?= $card['body']; ?></p>
            </div>
            <div class="card-action">
              <input type="text" placeholder="Comment" />
            </div>
          </div>
        </div>
      </div>
    </div> 
</div>          
<?php endforeach; ?>

<!--  Scripts-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/init.js"></script>
<script type="text/javascript" src="../js/masonry.js"></script>

<script type="text/javascript">

$(document).ready(function(){
  //If user wants to end session
  $("#signout").click(function(){
    var exit = confirm("Are you sure you want to end the session?");
    if(exit==true){window.location = '../index.php?logout=true';}    
  });
});


$(document).one('ready', function () {
    Materialize.toast('Helloo , Manasa', 4000, 'rounded');
});

</script>


</body>
</html>
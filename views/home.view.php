<?php 

require '../blog.php';
use Blog\DB; 

$cards = DB\get('cards', $conn); 

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
  $title = $_POST['title'];
  $body = $_POST['body'];

  if ( !empty($title) || !empty($body) ) {

      if(isset($_FILES['pic'])  && $_FILES['pic']['size'] > 0){
          $image = addslashes(file_get_contents($_FILES['pic']['tmp_name']));
          $imageProperties = getimageSize($_FILES['pic']['tmp_name']);
          $imgtype = $imageProperties['mime'];           
          Blog\DB\query(
          "INSERT INTO cards(title, image, imgtype, body) VALUES(:title, :image, :imgtype, :body)",
          array('title' => $title, 'image' => $image, 'imgtype' => $imgtype, 'body' => $body),
          $conn);    
          header('Location: '.$_SERVER['PHP_SELF']); 

    } else {

          Blog\DB\query(
          "INSERT INTO cards(title, body) VALUES(:title, :body)",
          array('title' => $title, 'body' => $body),
          $conn);    
          header('Location: '.$_SERVER['PHP_SELF']);

    }
  } 
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
<body >
  <nav class="indigo accent-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="home.view.php" class="brand-logo ">IDEAS BOARD </a>
      <ul class="right hide-on-med-and-down">
        <li>
            <a href="#add-model" data-position="bottom" data-delay="50" data-tooltip="Add a new Card" id="btn-add-model" class="btn-floating tooltipped btn-large waves-effect waves-light blue lighten-1 modal-trigger">
              <i class="mdi-content-add"></i></a>&nbsp;&nbsp;&nbsp;
        </li>
        <li><a id="signout" href="#">Sign Out!</a></li>
      </ul>

      <ul id="nav-mobile"  class="side-nav">

        <li><a id="signout"  href="#">Sign Out!</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>

<form  action="" enctype="multipart/form-data" method="POST">
  <div id="add-modal" class="modal " >
    
    <div class="modal-content">
      
      <div class="row">
        <div class="input-field col s12 ">
          <input id="title" name="title" type="text" class="validate ">
          <label for="title">Title : </label>
        </div>
      </div>
      <div class="row">
        <div class="file-field input-field col s12 ">
          <input class="file-path validate" type="text" placeholder="Upload a Pic or a file here"/>
          <div class="btn btn-large indigo accent-2">
            <span><i class="large mdi-file-cloud-upload"></i></span>&nbsp;&nbsp;&nbsp;<input name="pic" type="file"/>
          </div>
          

        </div>
        <div class="row">
          <div class="row">
          <div class="input-field col s12 ">
            <textarea id="body" name="body" class="materialize-textarea" length="120"></textarea>
            <label for="body">Post : </label>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn waves-effect waves-light indigo accent-2"  type="submit" name="action">Submit
        <i class="mdi-content-send center"></i>
      </button>
   </div>
 </form>
</div>


<?php foreach ($cards as $carde) : ?> 
<div class="row" id="mason">  
        
          <div class="card m6 ">
            <?php if( is_null($carde['image'])): ?>
              <div class="card-image">
                <img src="../img/idea.png">                
                <span class="card-title"><?= $carde['title']; ?></span>
              </div>
            <?php else: ?>
              <div class="card-image">
                 <img src="data:image/jpeg;charset=utf-8;base64,<?php echo base64_encode($carde['image']); ?>" />
                <span class="card-title"><?= $carde['title']; ?></span>
              </div>
            <?php endif; ?>  
              <div class="card-content">
                <p><?= $carde['body']; ?></p>
              </div>
              <div class="card-action">
                <input type="text" placeholder="Comment" />
              </div>
          </div>
  
</div>
<?php endforeach; ?> 



</body>

<!--  Scripts-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/init.js"></script>
<script type="text/javascript" src="../js/masonry.js"></script>

<script>

$(document).ready(function(){
  //If user wants to end session
  $("#signout").click(function(){
    var exit = confirm("Are you sure you want to end the session?");
    if(exit==true){window.location = '../index.php?logout=true'};    
  });

});


</script>

<script>

$(document).ready(function() {
    var $mason = $('#mason');

    $mason.masonry({
      columnWidth: 200,
      itemSelector: '.card'
    });
            
}
</script>

</html>
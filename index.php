

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
   <link rel="stylesheet" href="themes/Index.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style media="screen">
      #fbBtn{margin-right: 10px;}
      #Btn{margin-right: 10px;}
      #likeBtn{margin-right: 14px;}
      #profile, #logoutBtn{display: none;}
    </style>
    
    </style>
  </head>
  <body>
    <script>
      window.fbAsyncInit = function() {
    FB.init({
      appId      : '315623622288787',
      xfbml      : true,
      version    : 'v2.11'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
       
       function statusChangeCallback(response){
         if(response.status === 'connected'){
         console.log('Logged in and authenticated');
           setElements(true);
           testAPI();
         } else {
           console.log('Not authenticated');
           setElements(false);
         }
       }


  function checkLoginState() {
   FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

function testAPI(){
  FB.api('/me?field=name,email, birthday', function(response){
    if(response && !response.eror){
      console.log(response);
      buildProfile(response);
    }
  })
}

function buildProfile(user){
  let profile = `
  <h3>${user.name}</h3>
  <ul class="list-group">
  <li class="list-group-item">User ID : ${user.id}</li>
  <li class="list-group-item">User email : ${user.email}</li>
  <li class="list-group-item">User birthday : ${user.birthday}</li>
  `;

}

function setElements(isLoggedIn){
  if(isLoggedIn){
    document.getElementById('profile').style.display = 'block';
    document.getElementById('logoutBtn').style.display = 'block';
    document.getElementById('fbBtn').style.display = 'none';
    document.getElementById('heading').style.display = 'none';

  } else{
    document.getElementById('profile').style.display = 'none';
    document.getElementById('logoutBtn').style.display = 'none';
    document.getElementById('fbBtn').style.display = 'block';
    document.getElementById('heading').style.display = 'block';


  }



}
  
  
  function logoutBtn(){
    FB.logout(function(response){
      setElements(false);
    });

  }
  
  


      
    </script>

    <div data-role="navbar">
      <a class="navbar-brand">BlueJack</a>
    

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="#">Borrow</a>
          </li>


          
        
        </ul>

        <ul class="nav nav-bar navbar-right">
      <li><a class="nav-item" id="logoutBtn" href='' onclick="logout()">logout</a></li>

      <fb:login-button 
    id='fbBtn'
      scope="public_profile,email,user_location"
      onlogin="checkLoginState();">
    </fb:login-button>


      

        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>

    <div class="container">
      <h3 id="heading">Log in to view your profile</h3>
      <div id="profile">
        
      </div>
    </div>

    <div
    id ='likeBtn'
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>


<div>
  <?
  $host       =   "sql12.freemysqlhosting.net";
  $user       =   "sql12214602";
  $password   =   "c7FkFkE4TZ";
  $database   =   "sql12214602";

  mysql_connect($host,$user,$password);
  mysql_select_db($database);

       

  $sql = "SELECT * FROM BlueJack";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      echo"<p>";
      echo $row['author'];
      echo"<br>";
      echo$row['title'];
      echo"</p>";
      # code...
    }

  } else {echo "there are no data!";}
?>
</div>




    
  </body>
</html>

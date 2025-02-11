 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script type="text/javascript" src="{ { asset('/resources/js/tagsinput.js') }}"></script>
  <link href="{{ asset('/resources/css/tagsinput.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/resources/css/styles.css') }}">
  <link rel="icon" href="favicon (2).ico">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Monoton&family=Raleway:wght@500&display=swap" rel="stylesheet">

  </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="opening-page.html">Pro-Gamers</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/gamingforum/update">Update Password</a>
            <a class="dropdown-item" href="/gamingforum/logout">Log Out</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/gamingforum/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/gamingforum/notification">Notification</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/gamingforum/profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/gamingforum/chats">Chats</a>
        </li>
      </ul>
  </nav>
      <div>
      @if ($errors->any())
      <div class="alert alert-danger" class="col-3">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
       @if(Session::has('fail'))
      <div class="alert alert-danger">
        {{ Session::get('fail') }}
      </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div>
     @endif
    </div>
      <div class="container" id="container1">
        <br>
        <br>
        <form method="post" action="updateusername">
          @csrf
              <div class="row-md">
                <div class="col">
                  <center>
                  <h3> Enter New Username </h3>
                  <p role="alert" id = "message" style="height: 50px;width: 350px; display: none"></p>
                <br>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><img class="username" src="{{ asset('/resources/images/user.png') }}" alt="key-logo"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Password" aria-describedby="basic-addon1" name="username" id="username" onkeyup="showHint(this.value)" required>
                  </div>
                  <input  class="btn btn-primary" type="submit" value="Update Username">
                  <br>
                    </center>
             </div>
             </div>
           </form>
      </div>
      </div>
      <br>
      <br>
      <br>
      <div class="bottom-container">
    <center>
      <a class="footer-link" href="https://www.linkedin.com/"><img class="facebook" src="{{ asset('/resources/images/linkedin.png') }}" alt="linkedin-logo"></a>
      <a class="footer-link" href="https://www.facebook.com/"> <img class="facebook" src="{{ asset('/resources/images/facebook.png') }}" alt="facebook-logo"></a>
      <a class="footer-link" href="https://www.youtube.com/"> <img class="facebook" src="{{ asset('/resources/images/youtube.png') }}" alt="youtube-logo"></a>
    </center>
    <br>
    <p class="end">© 2020 eCode.js</p>
  </div>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</div>
  </body>
  <script type="text/javascript">
  function showHint(val){
    document.getElementById("message").style.display = "block";
    if(val.length < 6){
       $('#message').html("Username must be of atleast 6 character");
       document.getElementById("message").className = "alert-primary alert"
    }else{
      var search = val;
      $('#message').html("");
        $.ajax({
              url: "/gamingforum/avail",
                type: "post",
                data: {
                "_token": "{{ csrf_token() }}",
                "search": search
               },
        success:function(data){
          if(data == 0){
            document.getElementById("message").className = "alert-success alert"
            $('#message').html("Username is available");
          }
          else{
             document.getElementById("message").className = "alert-warning alert"
            $('#message').html("Username is not available");
          }
        }
    });
      }
  }
</script>
</html>
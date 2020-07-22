<html>

<head>
  <title>Webtres</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/36bbb7515e.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(141,162,122,1) 15%, rgba(93,163,177,1) 100%); width: 100%;
      height: 100%;">
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><b>Webtres</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ml-5 mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio</a>
        </li>
      </ul>
    </div>
  </nav>
  </header>
<section>
  <div class="container" >
    @yield('contenido')
  </div>
  </section>
</body>
<script>
$("#rut").change(function(){
        var rut = $("#rut").val();
        var token = '{{csrf_token()}}';
        var s='{{url('/verificarut/')}}'+'/'+rut;
        $.ajax({
            url: s,
            type: 'get',
            data:{
                _token:token,
                'data':rut
            },
            success: function(data){
                console.log(data);
                $('#result').html(data.success); 
                $('#result').html(data.error); 
            }
        });
    });
</script>
</html>
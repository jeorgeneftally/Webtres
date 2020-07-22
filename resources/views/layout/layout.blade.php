<html>

<head>
  <title>Webtres</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/36bbb7515e.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(141,162,122,1) 15%, rgba(93,163,177,1) 100%); width: 100%;
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
    <div class="container">
      @yield('contenido')
    </div>
  </section>
</body>


<script>
  $(document).ready(function() {

    $("#email").keyup(function() {

      var email = $("#email").val();

      if (email != 0) {
        if (isValidEmailAddress(email)) {
          $('#emal').html("");
        } else {
          $('#emal').html("Email no valido");
        }
      } else {
        $('#emal').html("El campo no puede ser vacio");
      }

    });

  });

  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }
</script>
<script>
  $(document).ready(function() {
    $("#rut").keyup(function() {
      var rut = $("#rut").val();
      var token = '{{csrf_token()}}';
      var s = 'api/' + '{{url(' / verificarut / ')}}' + '/' + rut;
      $.ajax({
        url: s,
        type: 'get',
        data: {
          _token: token,
          'data': rut
        },
        success: function(data) {
          if (data.error === "RUT No Disponible") {
            $('#result').html(data.error);
            $("#boton").prop('disabled', true);
          }
        }
      });
    });
  });
</script>
<script>
  function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.', '');
    // Despejar Guión
    valor = valor.replace('-', '');
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();
    // Formatear RUN
    rut.value = cuerpo + '-' + dv
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if (cuerpo.length < 7) {
      rut.setCustomValidity("RUT Incompleto");
      $("#boton").prop('disabled', true);
      $('#result').html("RUT Incompleto");
      return false;
    }
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    // Para cada dígito del Cuerpo
    for (i = 1; i <= cuerpo.length; i++) {

      // Obtener su Producto con el Múltiplo Correspondiente
      index = multiplo * valor.charAt(cuerpo.length - i);
      // Sumar al Contador General
      suma = suma + index;
      // Consolidar Múltiplo dentro del rango [2,7]
      if (multiplo < 7) {
        multiplo = multiplo + 1;
      } else {
        multiplo = 2;
      }
    }
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    // Casos Especiales (0 y K)
    dv = (dv == 'K') ? 10 : dv;
    dv = (dv == 0) ? 11 : dv;
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if (dvEsperado != dv) {
      rut.setCustomValidity("RUT Inválido");
      $('#result').html("RUT Inválido");
      $("#boton").prop('disabled', true);
      return false;
    }
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
    $("#boton").removeAttr('disabled');
    $('#result').html("");

  }
</script>
<script>
  $(document).ready(function() {

    $("#apellido").keyup(function() {

      var apellido = $("#apellido").val();

      if (apellido != 0) {
        if (isApellido(apellido)) {
          $('#apellid').html("");
        } else {
          $('#apellid').html("Solo letras");
        }
      } else {
        $('#apellid').html("El campo no puede ser vacio");
      }

    });

  });

  function isApellido(apellido) {
    var pattern = new RegExp("[a-zA-Z]{1,254}");
    return pattern.test(apellido);
  }
</script>

</html>
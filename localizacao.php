<html>
<head>
<title>Tassia Sena Biomédica Esteticista</title>
<meta charset="utf-8">
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="tassia.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="jquery-3.6.0.js"></script>
<script src="javascript.js"></script>

<style>
body {
  background-color: #BC8F8F;
  background-image: url("background/fundo.png");
}

#map {
  height: 400px;
  width: 100%;
}
</style>

<!-- Importar a API do Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=SUA_CHAVE_DE_API&callback=initMap" async defer></script>

<!-- Script para criar o mapa -->
<script>
// Função de inicialização do mapa
function initMap() {
  // Coordenadas da localização
  var location = {lat: -12.955084, lng: -38.445257}; // Altere as coordenadas conforme necessário

  // Opções de configuração do mapa
  var mapOptions = {
    center: location,
    zoom: 16
  };

  // Criar o mapa
  var map = new google.maps.Map(document.getElementById('map'), mapOptions);

  // Marcador no mapa
  var marker = new google.maps.Marker({
    position: location,
    map: map,
    title: 'Localização'
  });
}
</script>

</head>

<body>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" href="index.php">Home</a>
          <a class="nav-link active" href="cuidados.php">Cuidados</a>
          <a class="nav-link active" href="agenda.php">Agenda</a>
          <a class="nav-link active" href="localizacao.php">Localização</a>
          <a class="nav-link active" href="sobre_mim.php">Sobre mim!</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="w-100 p-3" style="background-color: #eee;">
    <div id="map"></div>
  </div>
</div>

<FOOTER><h> By @Tais_decampos<h3></FOOTER>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

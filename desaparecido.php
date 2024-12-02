<?php

include './database/database-connection.php';
include './database/missings-repository.php';
include './database/comments-repository.php';
include './database/users-repository.php';

include './utils/get-user-id.php';
include './utils/get-missing-id.php';
include  './utils/sonner.php';
include './utils/select-language.php';


$user  = find_by_id($connection, get_user_id());
$missing = get_missing_by_id($connection, get_missing_id());

if (!$missing) {
  sonner("alert", "desaparecido não encontrado");
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desaparecido | <?php echo $missing["missing_person_name"] ?></title>
  <link rel="stylesheet" href="./assets/styles/tudo.css" />
  <link rel="icon" href="./assets/images/favicon.png">

  <!-- Incluindo o CSS do Leaflet -->
  <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

  <!-- Incluindo o JavaScript do Leaflet -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    .content-missing {
      margin: auto;
      display: grid;
      width: 100%;
      max-width: 1200px;
      height: 60vh;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      padding: 2rem 1rem 0;
    }

    .content-missing img {
      width: 100%;
      height: 56vh;
      object-fit: cover;
      object-position: top center;
      border-radius: 5px;
    }

    .content-missing .content-missing-description {
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .content-missing .content-missing-description div {
      margin-top: 1rem;
      display: flex;
      flex-direction: column;
      gap: .5rem;
    }


    .metadata .maps {
      width: 100%;
      height: 40vh;
      max-width: 1200px;
    }

    .metadata {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      justify-content: center;
      align-items: center;
    }

    .comment-image-url {
      width: 100%;
      max-width: 1200px;
      height: 40vh;
      height: auto;
      object-fit: cover;
      object-position: top center;
      margin: auto !important;
    }


    .form-content {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .main {
      padding: 0 1rem;
      max-width: 1200px;

    }
  </style>
</head>

<body>

  <?php include './components/select-language.php'; ?>


  <div class="content-missing">
    <img src="./assets/uploads/missings/<?php echo $missing["missing_person_photo"] ?>" alt="foto de <?php echo $missing["missing_person_name"] ?>">
    <div class="content-missing-description">
      <h1><strong>
          Nome:
        </strong>
        <?php echo $missing["missing_person_name"] ?></h1>
      <div>
        <p>
          <strong>
            Visto por último em:
          </strong>
          <?php echo $missing["missing_location"] ?>
        </p>

        <p><strong>
            Data do desaparecimento
          </strong>
          <?php
          $date = new DateTime($missing["missing_date"]);
          $formatted_date = $date->format('d/m/Y');
          echo  $formatted_date ?>
        </p>
        <p>
          <strong>Idade:</strong>
          <?php echo $missing["missing_person_age"] ?> anos

        </p>
        <p>
          <strong>
            Genero:
          </strong>
          <?php echo $missing["missing_person_gender"] ?>
        </p>

        <p>
          <strong>
            Numero de Contato:
          </strong>
          <?php echo $missing["missing_person_contact"] ?>
        </p>

        <p>
          <strong>Historia:</strong>
          <?php echo $missing["missing_person_story"] ?>
        </p>

        <p>
          <strong>Caracteristicas:</strong>
          <?php echo $missing["missing_person_note"] ?>
        </p>

        <?php if (!empty($missing["illnesses"])): ?>
          <p>
            <strong>Doenças:</strong>
            <?php echo $missing["illnesses"] ?>
          </p>
        <?php endif; ?>

        <?php if (!empty($missing["chemical_dependency"])): ?>
          <p>
            <strong>Dependente quimico:</strong>
            <?php echo $missing["chemical_dependency"] ?>
          </p>
        <?php endif; ?>

        <?php if (!empty($missing["profile"])): ?>
          <p>
            <strong>Perfil Em Rede Social:</strong>
            <?php echo $missing["profile"] ?>
          </p>
        <?php endif; ?>

        <?php if (!empty($missing["car_plate"])): ?>
          <p>
            <strong>Placa do Veiculo:</strong>
            <?php echo $missing["car_plate"] ?>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <main class="main">
    <div class="newPost">
      <?php if (get_user_id()): ?>
        <!--formlário de postagem-->

        <div class="infoUser">
          <div class="imgUser">
            <img src="./assets/uploads/users/<?php echo $user["user_photo"] ?>" alt="foto de perfil do<?php echo $user["username"] ?>">
          </div>
          <strong><?php echo $user["username"] ?></strong>
        </div>

        <!--Formulario de envio-->
        <form
          action="./create-comment-by-missing.action.php?missing-id=<?php echo $missing['missing_person_id'] ?>"
          class="formPost" method="post" enctype="multipart/form-data">
          <textarea name=" comment" id="comment" placeholder="Faça seu comentário" required></textarea>
          <input type="text" name="latitude" id="input-latitude"
            value="" class="invisible">
          <input type="text" name="longitude"
            id="input-longitude" value="" class="invisible">

          <div class="iconsAndButton">
            <div class="icons">
              <button class="btnFileForm"><img src="./assets/images/img.svg" alt="Adicionar uma imagem">
                <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem"></button>
              <button class="btnFileForm" id="btn-add-current-location" type="button"
                data-missing-id="<?php echo $missing['missing_person_id']; ?>"><img
                  src="./assets/images/location.svg" alt="Adicionar localização atual"></button>
            </div>
            <button type="submit" class="btnSubmitForm">Publicar</button>
          </div>
        </form>
      <?php else: ?>
        <div style="width:100%; height:100%; display:flex; justify-content: center; align-content:center">
          <h3>necessário ter uma conta para comentar :(</h3>
        </div>
      <?php endif; ?>
    </div>



    <!--post de comentário-->
    <ul class="posts">
      <?php
      $comments = fetch_comments_by_missing_id($connection, get_missing_id());
      ?>
      <?php if ($comments->num_rows > 0): ?>
        <?php while ($comment = $comments->fetch_assoc()): ?>
          <li class="post">
            <div class="infoUserPost">
              <div class="imgUserPost">
                <img src="./assets/uploads/users/<?php echo $comment["author_image_url"] ?>" alt="">
              </div>
              <div class="nameAndHour">
                <strong><?php echo $comment["author_name"] ?></strong>
                <p><?php $date = new DateTime($comment["created_at"]);
                    $formatted_date = $date->format('d/m/Y');
                    echo  $formatted_date  ?></p>
              </div>
            </div>
            <div class="form-content">
              <div class="metadata">
                <?php if (!empty($comment["latitude"]) && !empty($comment["longitude"])): ?>
                  <div class="maps" id="map-<?php echo $comment["comment_id"] ?>" data-latitude="<?php echo $comment["latitude"]  ?>" data-longitude="<?php echo $comment["longitude"] ?>">
                  </div>
                <?php endif; ?>
                <?php if (isset($comment["image_url"])): ?>
                  <img src="./assets/uploads/comments/<?php echo $comment["image_url"] ?>" alt=""
                    class="comment-image-url" style="margin:auto">
                <?php endif; ?>
              </div>


              <p><?php echo $comment["content"] ?></p>

            </div>
          </li>
        <?php endwhile; ?>
      <?php endif; ?>

    </ul>
  </main>
  <?php
  include "./components/sonner.php";
  ?>

  <script>
    const buttonAddCurrentLocation = document.getElementById("btn-add-current-location")

    buttonAddCurrentLocation.addEventListener("click", () => {
      navigator.geolocation.getCurrentPosition((position) => {
        const {
          latitude,
          longitude
        } = position.coords;

        const inputLatitude = document.getElementById(`input-latitude`);
        const inputLongitude = document.getElementById(`input-longitude`);

        inputLatitude.value = latitude;
        inputLongitude.value = longitude;

        alert("Localização atual adicionada com sucesso!");

      })
    })

    function initMap(mapId, latitude, longitude) {
      const map = L.map(mapId).setView([latitude, longitude], 13);

      // Adiciona o mapa base do OpenStreetMap
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map);

      // Adiciona um marcador no mapa
      L.marker([latitude, longitude])
        .addTo(map)
        .bindPopup("Você está aqui!")
        .openPopup();
    }

    const maps = document.querySelectorAll(".maps");

    maps.forEach((map) => {
      const {
        latitude,
        longitude
      } = map.dataset;

      const mapId = map.getAttribute("id")

      initMap(mapId, latitude, longitude)
    })
  </script>
</body>

</html>
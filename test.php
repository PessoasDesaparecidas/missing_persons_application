<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <div>
    <div class="gender-input">
      <input type="radio" id="female" name="genero_desaparecido" value="Feminino">
      <label for="female">Feminino</label>
    </div>

    <div class="gender-input">
      <input type="radio" id="male" name="genero_desaparecido" value="Masculino" checked>
      <label for="male">Masculino</label>
    </div>

    <div class="gender-input">
      <input type="radio" id="others" name="genero_desaparecido" value="Outros">
      <label for="others">Outros</label>
    </div>

    <div class="gender-input">
      <input type="radio" id="none" name="genero_desaparecido" value="Prefiro não dizer">
      <label for="none">Prefiro não dizer</label>
    </div>

    <div class="gender-input">
      <input type="file" accept="image/*" class="picture_input"
        id="imagem" name="imagem"
        value="./assets/images/missing-image-example-form.jpg"
        required>
    </div>
  </div>
</body>

</html>
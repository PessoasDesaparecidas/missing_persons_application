<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/missing-cadastre.css">
    <title>Cadastro de Desaparecido</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="./assets/images/sample-example-profile.svg">
        </div>
        <div class="form">
            <form action="#">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre o desaparecido</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Nome completo</label>
                        <input id="firstname" type="text" name="firstname" placeholder="Digite o nome completo do desaparecido" required>
                    </div>

                    <div class="input-box">
                        <label for="number">Idade do desaparecido</label>
                        <input id="number" type="text" name="number" placeholder="Digite a idade atual do desaparecido" required>
                    </div>

                    <div class="input-box">
                        <label for="caract">Caracteristicas do desaparecido</label>
                        <input id="caract" type="text" name="caract" placeholder="Digite as caraceristicas do desaparecido" required>
                    </div>

                    <div class="input-box">
                        <label for="number">Telefone para contato</label>
                        <input id="number" type="tel" name="number" placeholder="(xx) xxxxx-xxxx" minlength="9" maxlength="9" required>
                    </div>

                    <div class="input-box">
                        <label for="datetime">Foi visto por último em</label>
                        <input id="datetime" type="datetime-local" name="datetime" style="width: 215px;" required>
                    </div>

                    <div class="input-box">
                        <label for="reg">Região</label>
                        <input id="reg" type="text" name="reg" placeholder="Digite a região do desaparecido" required>
                    </div>
                </div>

                <div class="input-box">
                    <label for="hist">Historia</label>
                    <input id="hist" type="text" name="hist" placeholder="Digite a historia do desaparecido" required>
                </div>

                <div class="input-box">
                    <label class="picture" tabindex="0">Foto</label>
                    <input type="file" accept="image/*" class="picture_input" required>
                </div>

                <div class="gender-inputs">

                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>

                    <div class="gender-group">

                        <div class="gender-input">
                            <input type="radio" id="female" name="gender">
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" id="male" name="gender">
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" id="others" name="gender">
                            <label for="others">Outros</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" id="none" name="gender">
                            <label for="none">Prefiro não dizer</label>
                        </div>

                    </div>
                    <div class="continue-button">
                        <button><a href="#">Cadastrar</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
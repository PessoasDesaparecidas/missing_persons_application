<?php
include './utils/protect-page-route.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/missing-cadastre.css">
    <link rel="icon" href="./assets/images/favicon.png">
    <title>Cadastro de Desaparecido</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="./assets/images/sample-example-profile.svg">
        </div>
        <div class="form">
            <form action="missing-cadastre.action.php" method="POST" class="form-register-missing"
                enctype="multipart/form-data" id="form">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre o desaparecido</h1>
                    </div>
                    <button class="btn-previous-state-form" id="btn-previous-state-form" type="button">
                     <-voltar
                    </button>
                </div>
                <section id="form-state-one">
                    <div class="input-group">
                    <div class="input-box">
                        <label for="nome_desaparecido">Nome completo</label>
                        <input id="nome_desaparecido" type="text" name="nome_desaparecido"
                            placeholder="Digite o nome completo do desaparecido" required>
                    </div>

                    <div class="input-box">
                        <label for="idade_desparecido">Idade do desaparecido</label>
                        <input id="idade_desparecido" type="text" name="idade_desparecido"
                            placeholder="Digite a idade atual do desaparecido" required>
                    </div>

                    <div class="input-box">
                        <label for="observacao_desaparecido">Caracteristicas do desaparecido</label>
                        <input id="observacao_desaparecido" type="text" name="observacao_desaparecido"
                            placeholder="Digite as caraceristicas do desaparecido" required>
                    </div>

                    <div class="input-box">
                        <label for="contato_desaparecido">Telefone para contato</label>
                        <input id="contato_desaparecido" type="tel" name="contato_desaparecido"
                            placeholder="(xx) xxxxx-xxxx" minlength="11" maxlength="15" required>
                    </div>

                    <div class="input-box">
                        <label for="data_desaparecimento">Foi visto por último em</label>
                        <input id="data_desaparecimento" type="datetime-local" name="data_desaparecimento"
                            style="width: 215px;" required>
                    </div>

                    <div class="input-box">
                        <label for="local_desaparecimento">Região</label>

                        <select name="local_desaparecimento" id="local_desaparecimento" required>
                            <option value="zona central">zona central</option>
                            <option value="zona norte">zona norte</option>
                            <option value="zona sul">zona sul</option>
                            <option value="zona oeste">zona oeste</option>
                            <option value="zona leste">zona leste</option>
                        </select>
                    </div>
                </div>


                <div class="input-box">
                    <label for="hist">o que fazia quando desapareceu</label>
                    <input id="hist" type="text" name="historia_desaparecido"
                        placeholder="Digite a historia do desaparecido" required>
                </div>

                <div class="input-box">
                    <label class="picture" tabindex="0" for="imagem">Foto</label>
                    <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem" required>
                </div>
                <div class="continue-button" id="next-state-form">
                    <button type="button">
                        Proxima
                    </button>
                </div>
                </section>

                <section id="form-state-two">
                    <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>
                    <div class="gender-group ">

                        <div class="gender-input">
                            <input type="radio" id="female" name="genero_desaparecido" value="Feminino">
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" id="male" name="genero_desaparecido" value="Masculino">
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

                    </div>
                </div>

                <br>
                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Mais informações</h6>
                    </div>
                    <div class="gender-group group-plus-information">

                        <div> 
                            <div class="gender-input  ">
                                <input type="checkbox" id="mais-infromacao-1" name="mais-infromacao-1"
                                    value="" >
                                <label for="mais-infromacao-1">é uma pessoa com doença mental</label>
                            </div>

                            <div class="gender-input ">
                                <input type="checkbox" id="mais-infromacao-2" name="mais-infromacao-2"
                                    value="">
                                <label for="mais-infromacao-2">dependente quimico</label>
                            </div>
                        </div>

                        <div>
                            <div class="gender-input ">
                                <input type="checkbox" id="mais-infromacao-3" name="mais-infromacao-3"
                                    value="">
                                <label for="mais-infromacao-3">pussui perfil em alguma rede social</label>
                            </div>

                            <div class="gender-input ">
                                <input type="checkbox" id="mais-infromacao-4" name="mais-infromacao-4"
                                    value="">
                                <label for="mais-infromacao-4">dirigia algum veiculo</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit" name="btn-cadastre-missing">
                        Cadastrar
                    </button>
                </div>
                </section>
            </form>
        </div>
    </div>

    <!-- javascript do fomulario -->
     <script src="./assets/javascript/aply-phone-mask.js" defer></script>
     <script src="./assets/javascript/prompsts-check-boxs-form.js" defer></script>
     <script src="./assets/javascript/control-state-form.js" defer></script>
</body>

</html>
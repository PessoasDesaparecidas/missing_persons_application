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
            <form action="missing-cadastre.action.php" method="POST" class="form-register-missing"
                enctype="multipart/form-data">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre o desaparecido</h1>
                    </div>
                </div>
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
                            placeholder="(xx) xxxxx-xxxx" minlength="9" maxlength="9" required>
                    </div>

                    <div class="input-box">
                        <label for="data_desaparecimento">Foi visto por último em</label>
                        <input id="data_desaparecimento" type="datetime-local" name="data_desaparecimento"
                            style="width: 215px;" required>
                    </div>

                    <div class="input-box">
                        <label for="local_desaparecimento">Região</label>
                        <input id="local_desaparecimento" type="text" name="local_desaparecimento"
                            placeholder="Digite a região do desaparecido" required>
                    </div>
                </div>


                <div class="input-box">
                    <label for="hist">Historia</label>
                    <input id="hist" type="text" name="historia_desaparecido"
                        placeholder="Digite a historia do desaparecido" required>
                </div>

                <div class="input-box">
                    <label class="picture" tabindex="0" for="imagem">Foto</label>
                    <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem" required>
                </div>


                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>
                    <div class="gender-group">

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
                            <div class="gender-input">
                                <input type="checkbox" id="mais_infromacao-1" name="mais_infromacao-1"
                                    value="é uma pessoa com doença mental">
                                <label for="mais_infromacao-1">é uma pessoa com doença mental</label>
                            </div>

                            <div class="gender-input">
                                <input type="checkbox" id="mais_infromacao-1" name="mais_infromacao"
                                    value="usava telefone quando desapareceu">
                                <label for="male">usava telefone quando desapareceu</label>
                            </div>
                        </div>

                        <div>
                            <div class="gender-input">
                                <input type="checkbox" id="others" name="mais_infromacao"
                                    value="pussui perfil em alguma rede social">
                                <label for="others">pussui perfil em alguma rede social</label>
                            </div>

                            <div class="gender-input">
                                <input type="checkbox" id="none" name="mais_infromacao" value="dirigia algum veiculo">
                                <label for="none">dirigia algum veiculo</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit" name="btn-cdastre-missing">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
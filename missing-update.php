<?php
include './utils/protect-page-route.php';
include './database/missings-repository.php';
session_abort();
include './utils/sonner.php';

$page = $_GET["page"];
$missing_id = $_GET["missing_id"];
$missing = get_missing_by_id($connection, $missing_id);


if (!$missing) {
    sonner("error", "desaparecido não encontrado");
    header('Location: missings-dashboard.php?page=1');
}

if ($missing["user_id"] != get_user_id()) {
    sonner("error", "usuario não autorizado");
    header('Location: missings-dashboard.php?page=1');
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/globals.css">
    <link rel="stylesheet" href="./assets/styles/missing-cadastre.css">
    <link rel="icon" href="./assets/images/favicon.png">
    <title>Desaparecido | <?php echo $missing["missing_person_name"]?></title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="./assets/images/sample-example-profile.svg">
        </div>
        <div class="form">
            <form action="missing-update.action.php?missing_id=<?php echo $missing_id ?>&page=<?php echo $page ?>"
                method="POST" class="form-register-missing" enctype="multipart/form-data" id="form">
                <div class="form-header">
                    <div class="title">
                        <h1>Desaparecido: <?php echo strtoupper($missing["missing_person_name"])?></h1>
                    </div>
                    <button class="btn-previous-state-form" id="btn-previous-state-form" type="button">
                     <-voltar
                    </button>
                </div>

                <section id="form-state-one">
                <div class="input-group">
                    <div class="input-box">
                        <label for="missing_person_name">username completo</label>
                        <input id="missing_person_name" type="text" name="missing_person_name"
                            placeholder="Digite o username completo do desaparecido" required
                            value="<?php echo $missing["missing_person_name"] ?>">
                    </div>

                    <div class="input-box">
                        <label for="missing_person_age">Idade do desaparecido</label>
                        <input id="missing_person_age" type="text" name="missing_person_age"
                            placeholder="Digite a idade atual do desaparecido" required
                            value="<?php echo $missing["missing_person_age"] ?>" />
                    </div>

                    <div class="input-box">
                        <label for="missing_person_note">Caracteristicas do desaparecido</label>
                        <input id="missing_person_note" type="text" name="missing_person_note"
                            placeholder="Digite as caraceristicas do desaparecido" required
                            value="<?php echo $missing["missing_person_note"] ?>" />
                    </div>

                    <div class="input-box">
                        <label for="missing_person_contact">Telefone para contato</label>
                        <input id="missing_person_contact" type="tel" name="missing_person_contact"
                            placeholder="(xx) xxxxx-xxxx" minlength="9" maxlength="9"
                            value="<?php echo $missing["missing_person_contact"] ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="missing_date">Foi visto por último em</label>
                        <input id="missing_date" type="datetime-local" name="missing_date"
                            style="width: 215px;" value="<?php echo $missing["missing_date"] ?>" required>
                    </div>

                    <div class="input-box">

                        <label for="missing_location">Região</label>

                        <select name="missing_location" id="missing_location" required>
                            <option value="zona central"
                                <?php $missing["missing_location"]==="zona central" && print_r( "selected='selected'")?>>
                                zona central
                            </option>
                            <option value="zona norte"
                                <?php $missing["missing_location"]==="zona norte" && print_r( "selected='selected'")?>>
                                zona
                                norte</option>
                            <option value="zona sul"
                                <?php $missing["missing_location"]==="zona sul" && print_r( "selected='selected'")?>>
                                zona sul
                            </option>
                            <option value="zona oeste"
                                <?php $missing["missing_location"]==="zona oeste" && print_r( "selected='selected'")?>>
                                zona
                                oeste</option>
                            <option value="zona leste"
                                <?php $missing["missing_location"]==="zona leste" && print_r( "selected='selected'")?>>
                                zona
                                leste</option>
                        </select>

                    </div>
                </div>

                <div class="input-box">
                    <label for="hist"> o que fazia quando desapareceu</label>
                    <input id="hist" type="text" name="missing_person_story"
                        placeholder="Digite a historia do desaparecido"
                        value="<?php echo $missing["missing_person_story"] ?>" required>
                </div>

                <div class="input-box">
                    <label class="picture" tabindex="0" for="imagem">Foto</label>
                    <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem" >
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

                    <div class="gender-group">

                        <div class="gender-input">
                            <?php
                            if ($missing["missing_person_gender"] === "Feminino"):
                            ?>
                            <input type="radio" id="female" name="missing_person_gender" value="Feminino" checked>
                            <?php else: ?>
                            <input type="radio" id="female" name="missing_person_gender" value="Feminino">
                            <?php endif ?>

                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <?php if ($missing["missing_person_gender"] === "Masculino"): ?>
                            <input type="radio" id="male" name="missing_person_gender" value="Masculino" checked>
                            <?php else: ?>
                            <input type="radio" id="male" name="missing_person_gender" value="Masculino" checked>
                            <?php endif ?>

                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <?php if ($missing["missing_person_gender"] === "Outros"): ?>
                            <input type="radio" id="others" name="missing_person_gender" value="Outros" checked>
                            <?php else: ?>
                            <input type="radio" id="others" name="missing_person_gender" value="Outros">
                            <?php endif ?>

                            <label for="others">Outros</label>
                        </div>

                        <div class="gender-input">
                            <?php if ($missing["missing_person_gender"] === "Prefiro não dizer"): ?>
                            <input type="radio" id="none" name="missing_person_gender" value="Prefiro não dizer" checked>
                            <?php else: ?>
                            <input type="radio" id="none" name="missing_person_gender" value="Prefiro não dizer">
                            <?php endif; ?>
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
                                    value="<?php echo $missing["illnesses"]?>" 
                                    <?php if(!empty($missing["illnesses"])){
                                        print_r("checked");
                                    }?>
                                    >
                                <label for="mais-infromacao-1">é uma pessoa com doença mental</label>
                            </div>

                            <div class="gender-input ">
                                <input type="checkbox" id="mais-infromacao-2" name="mais-infromacao-2"
                                    value="<?php echo $missing["chemical_dependency"]?>" 
                                    <?php if(!empty($missing["chemical_dependency"])){
                                        print_r("checked");
                                    }?>
                                    >
                                <label for="mais-infromacao-2">dependente quimico</label>
                            </div>
                        </div>

                        <div>
                            <div class="gender-input ">
                                <input type="checkbox" id="mais-infromacao-3" name="mais-infromacao-3"
                                    value="<?php echo $missing["profile"]?>" 
                                    <?php if(!empty($missing["profile"])){
                                        print_r("checked");
                                    }?>
                                    >
                                <label for="mais-infromacao-3">pussui profile em alguma rede social</label>
                            </div>

                            <div class="gender-input ">
                                <input type="checkbox" id="mais-infromacao-4" name="mais-infromacao-4"
                                    value="<?php echo $missing["car_plate"]?>" 
                                    <?php if(!empty($missing["car_plate"])){
                                        print_r("checked");
                                    }?>
                                    >
                                <label for="mais-infromacao-4">dirigia algum veiculo</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit" name="btn-update-missing">
                        atuzalizar
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
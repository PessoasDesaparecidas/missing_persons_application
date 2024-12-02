<?php

include './database/database-connection.php';
include './database/missings-repository.php';
include './utils/get-user-id.php';
include './utils/select-language.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Busca Solidaria</title>
  <link rel="stylesheet" href="./assets/styles/header.css">
  <link rel="stylesheet" href="./assets/styles/tudo.css">
  <link rel="stylesheet" href="./assets/styles/footer.css">
  <link rel="stylesheet" href="./assets/styles/orient.css">
  <link rel="icon" href="./assets/images/favicon.png">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    body {
      overflow-x: hidden !important;
    }
  </style>

</head>

<body>

  <?php include './components/header.php'; ?>


  <div class="containe">
    <div class="text-content">
      <h1>Orientações importantes </h1>
      <p>
        Seguir as orientações ao lidar com o desaparecimento de uma pessoa é crucial para maximizar as chances de encontrá-la rapidamente e em segurança.</p>
    </div>
  </div>

  <!--FIM DA PRIMEIRA SECTION-->

  <section class="orient2">
    <div class="cont-orin">
      <h2 class="baby">Passo 1</h2>
    </div>
    <div class="cont-orin1">
      <h3 class="titu">Verificar se há registro da pessoa desaparecida nos serviços de emergência</h3>
      <p>Em primeiro lugar, você deve verificar se há algum registro da pessoa desaparecida nos serviços de emergência listados abaixo:</p>
    </div>
  </section>

  <div class="features" data-aos="zoom-in-up">
    <div class="feature">
      <div class="icon">
        <i class="fa-solid fa-truck-medical" style="color: #000000;"></i>
      </div>
      <h3>SAMU</h3>
      <p>Se houver sinais de acidente ou saúde crítica, o SAMU presta atendimento de urgência. Ligue 192.</p>
    </div>
    <div class="feature" data-aos="zoom-in-up">
      <div class="icon">
        <i class="fa-solid fa-building-shield" style="color: #000000;"></i>
      </div>
      <h3>BOMBEIROS</h3>
      <p>Em áreas de risco, como matas ou rios, os bombeiros ajudam nas buscas. Ligue 193 em emergências.</p>
    </div>
    <div class="feature" data-aos="zoom-in-up">

      <div class="icon">
        <i class="fa-solid fa-handcuffs" style="color: #000000;"></i>
      </div>
      <h3>POLICIA</h3>
      <p>Registre um B.O. imediatamente! A polícia inicia as buscas sem precisar esperar 24 horas. Informe todos os detalhes possíveis.</p>
    </div>
  </div>


  <section class="orient3">
    <div class="cont-orin">
      <h2 class="baby" data-aos="fade-down-right">Passo 2</h2>
    </div>
    <div class="cont-orin1">
      <h3 class="titu">Registrar o Boletim de Ocorrência (BO)</h3>
      <p data-aos="zoom-in">O BO é o documento que desencadeia oficialmente a investigação de um desaparecimento, por isso é importante fazê-lo imediatamente após a desaparição.</br> Não é necessário aguardar 24 horas para registrar o BO.
        </br>
        Quando você faz o BO de uma pessoa desaparecida, o RG dela é bloqueado, mas isso não gera antecedentes criminais contra ela.
        </br>
        É importante manter os dados de contato atualizados junto aos órgãos em que solicitou apoio e, principalmente, junto à delegacia responsável pela busca.
        </br> </br>
      <h3 class="titu"> Como fazer o Boletim de Ocorrência (BO): </h3>
      </br>
      <p data-aos="fade-down-left">
        Pela internet no endereço eletrônico: <button class="btn-link" onclick="window.open('https://www.ssp.sp.gov.br/nbo', '_blank')">
          Acessar Plataforma NBO
        </button>
        </br>
        Presencialmente no DP mais próximo de você; ou
        </br>
        Presencialmente no Departamento Estadual de Homicídios e de Proteção à Pessoa (DHPP), junto à 5ª delegacia especializada em desaparecimentos.
        Endereço: Rua Brigadeiro Tobias, n° 527 – 3° andar, Luz – São Paulo (SP).
        Horário de Atendimento:09h às18. </br> Telefones: (11) 3311-3547 / 3311-3548 / 3311-3983</p>
      </p>
    </div>

    <div class="cont-orin">
      <h2 class="baby" data-aos="fade-down-right">Passo 3</h2>
    </div>
    <div class="cont-orin1">
      <h3 class="titu"> Procurar apoio na busca</h3>
      <p data-aos="fade-down-left">Serviço Municipal de Apoio a Familiares e Pessoas Desaparecidas </br>
        </br>
      <h3 class="titu"> O que esse serviço pode fazer por você? </h3>

      <p data-aos="fade-down-left">
        Auxiliar na busca, identificação e orientação em casos de desaparecimento; realizar pesquisa em bancos de dados municipais e serviços em geral da Administração Pública Municipal.

        Caso a pessoa seja atendida em qualquer Serviço de Acolhimento Municipal (centros de acolhida, Instituições de Longa Permanência para Idosos (ILPIs), Serviços de Acolhimento Institucional para Crianças e Idosos (SAICAs) etc.), o sistema identificará que se trata de uma pessoa desaparecida e iniciará os procedimentos.

        Dar acolhimento, escuta e/ou algum atendimento especializado (jurídico, social, psicológico, dentre outros), durante o processo de busca.

        Realizar comunicação sobre o desaparecimento nas redes sociais da Secretaria de Direitos Humanos e Cidadania (SMDHC) da Prefeitura de São Paulo.</p>
      </br>
      <h3 class="titu"> Como solicitar esse atendimento?</h3>
      <p data-aos="fade-down-left">
        Presencialmente, na Ouvidoria de Direitos Humanos, levando uma foto recente da pessoa desaparecida.</br>
        Endereço: Rua Dr. Falcão Filho, 69 – Centro – São Paulo (SP).
        </br>
        Horário de Atendimento: de segunda a sexta-feira, das 10h às 16h, com possibilidade de agendamento pelo telefone </br>Telefone: (11) 3104-0701.
        </br>
        Por meio do preenchimento de formulário no endereço eletrônico http://bit.ly/formuláriocadastramento.</br>
        Atenção: é importante fornecer, no formulário, o maior número de dados possíveis sobre a pessoa desaparecida.
      </p>
    </div>

  </section>

  <section class="class-action-section">
    <div class="content" data-aos="fade-down-right">
      <h2>mais informações</h2>
      <h1>SEUS DIREITOS AO FAZER BO</h1>
      <li>
        Você tem o direito de receber atendimento digno e respeitoso por parte de todos os funcionários da delegacia e do Poder Público e eles devem estar identificados (Portaria 18/1998 do Delegado Geral de Polícia, artigo 13º, incisos VI e VII). </br>
      <li> Qualquer Delegacia de Polícia ou a Delegacia Eletrônica deve registrar a notícia do desaparecimento (Portaria nº 18/1998 do Delegado Geral de Polícia, artigo 13, incisos I e III).</br></li>
      <li>É proibido ao Delegado esperar 24h do conhecimento do desaparecimento para registrar o Boletim de Ocorrência (Portaria nº 18/1998 do Delegado Geral de Polícia, artigo 13, inciso III).</br></li>
      <li> Você tem direito a ter uma cópia do BO e número do Procedimento de Investigação de Desaparecimento instaurado ( Constituição Federal, artigo 5º, inciso XXXIII).</br></li>
      <li> Por ser parte interessada, você tem direito a ser informado sobre eventual sigilo da investigação ou, em caso negativo, do andamento da investigação.</br> </li>
      </li>
    </div>
    <div class="image" data-aos="fade-down-left">
      <img src="./assets/images/poli.jpg" alt="Gavel on credit card">
    </div>
  </section>

  <section class="orient4">
    <h1 class="tt-mapa" data-aos="zoom-in-up">Secretaria Municipal de Direitos Humanos e Cidadania</h1>
    <div class="cont-mapa">
      <h2 class="tt-map">Telefone: (11) 2833.4150 <br>smdhcgabinete@prefeitura.sp.gov.br</h2>
      <iframe class="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.5584474548864!2d-46.640007825021335!3d-23.54837866111466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce58534495b681%3A0x1a343f1522cd7280!2zUi4gTMOtYmVybyBCYWRhcsOzLCAxMTkgLSBTw6ksIFPDo28gUGF1bG8gLSBTUCwgMDEwMDgtMDAw!5e0!3m2!1spt-BR!2sbr!4v1731704773016!5m2!1spt-BR!2sbr"
        width="800" height="400" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>

  <section class="orient5">

  </section>



  <?php
  session_start();
  include './components/sonner.php';
  ?>

  <!-- rodapé -->
  <?php
  include './components/footer.php'
  ?>

  <!-- libras -->
  <?php
  include './components/libras.php'
  ?>

  <script src="./assets/javascript/politica.js"></script>
  <script src="./assets/javascript/header.js"></script>
  <script src="./assets/javascript/handle-form-user.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- lib de icons -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
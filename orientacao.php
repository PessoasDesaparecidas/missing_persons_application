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

    .select-language-group {
      position: fixed;
      right: 10px;
      top: 40%;
      z-index: 1000;
      background-color: black;
      font-size: 1rem;
      color: white;
      width: auto;
      height: auto;
      padding: 5px 10px;
    }
  </style>

</head>

<body>

  <?php include './components/header.php'; ?>

  <?php include './components/select-language.php'; ?>

  <?php if ($language == "pt"): ?>

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



  <?php elseif ($language == "es"): ?>
    <div class="containe">
      <div class="text-content">
        <h1>Directrices Importantes</h1>
        <p>
          Seguir las directrices al tratar con la desaparición de una persona es crucial para maximizar las posibilidades de encontrarla rápida y seguramente.
        </p>
      </div>
    </div>

    <!-- FIN DE LA PRIMERA SECCIÓN -->

    <section class="orient2">
      <div class="cont-orin">
        <h2 class="baby">Paso 1</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Verificar si la persona desaparecida está registrada en servicios de emergencia</h3>
        <p>
          Primero, debe verificar si la persona desaparecida está registrada en los servicios de emergencia que se enumeran a continuación:
        </p>
      </div>
    </section>

    <div class="features" data-aos="zoom-in-up">
      <div class="feature">
        <div class="icon">
          <i class="fa-solid fa-truck-medical" style="color: #000000;"></i>
        </div>
        <h3>SAMU</h3>
        <p>Si hay señales de un accidente o una situación de salud crítica, SAMU proporciona atención urgente. Llame al 192.</p>
      </div>
      <div class="feature" data-aos="zoom-in-up">
        <div class="icon">
          <i class="fa-solid fa-building-shield" style="color: #000000;"></i>
        </div>
        <h3>BOMBEROS</h3>
        <p>En áreas de riesgo como bosques o ríos, los bomberos ayudan en las búsquedas. Llame al 193 en emergencias.</p>
      </div>
      <div class="feature" data-aos="zoom-in-up">
        <div class="icon">
          <i class="fa-solid fa-handcuffs" style="color: #000000;"></i>
        </div>
        <h3>POLICÍA</h3>
        <p>¡Presente una denuncia policial de inmediato! La policía comienza la búsqueda sin esperar 24 horas. Proporcione todos los detalles posibles.</p>
      </div>
    </div>

    <section class="orient3">
      <div class="cont-orin">
        <h2 class="baby" data-aos="fade-down-right">Paso 2</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Realizar una Denuncia Policial (BO)</h3>
        <p data-aos="zoom-in">
          El BO es el documento que oficialmente inicia la investigación de una desaparición, por lo que es importante realizarlo inmediatamente después de que la persona desaparezca.
          <br> No es necesario esperar 24 horas para realizar el BO. <br>
          Cuando se presenta un BO para una persona desaparecida, su identificación se bloquea, pero esto no genera antecedentes penales en su contra. <br>
          Es importante mantener actualizados sus datos de contacto con las agencias que buscó apoyo, especialmente con la comisaría responsable de la búsqueda. <br><br>
        <h3 class="titu">Cómo realizar una Denuncia Policial (BO):</h3>
        <br>
        <p data-aos="fade-down-left">
          En línea en la siguiente URL:
          <button class="btn-link" onclick="window.open('https://www.ssp.sp.gov.br/nbo', '_blank')">Acceder a la Plataforma NBO</button>
          <br>
          En persona en la comisaría más cercana; o<br>
          En persona en el Departamento Estatal de Homicidios y Personas Desaparecidas (DHPP), específicamente en la 5ª comisaría especializada en desapariciones. <br>
          Dirección: Rua Brigadeiro Tobias, nº 527 – 3er piso, Luz – São Paulo (SP).<br>
          Horario de atención: de 9:00 a 18:00 horas.<br>
          Teléfonos: (11) 3311-3547 / 3311-3548 / 3311-3983
        </p>
        </p>
      </div>

      <div class="cont-orin">
        <h2 class="baby" data-aos="fade-down-right">Paso 3</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Buscar apoyo en la búsqueda</h3>
        <p data-aos="fade-down-left">
          Servicio Municipal de Apoyo a Familias y Personas Desaparecidas<br><br>
        <h3 class="titu">¿Qué puede hacer este servicio por usted?</h3>
        <p data-aos="fade-down-left">
          Ayudar en la búsqueda, identificación y orientación en casos de desaparición; realizar investigaciones en bases de datos municipales y servicios de administración pública en general.<br><br>
          Proporcionar refugio, escucha y/o apoyo especializado (legal, social, psicológico, entre otros) durante el proceso de búsqueda.<br><br>
          Comunicar la desaparición en las redes sociales de la Secretaría de Derechos Humanos y Ciudadanía de São Paulo.<br>
        </p>
        <br>
        <h3 class="titu">¿Cómo solicitar este servicio?</h3>
        <p data-aos="fade-down-left">
          En persona, en la Defensoría de los Derechos Humanos, llevando una foto reciente de la persona desaparecida.<br>
          Dirección: Rua Dr. Falcão Filho, 69 – Centro – São Paulo (SP).<br>
          Horario de atención: de lunes a viernes, de 10:00 a 16:00 horas, con posibilidad de programar una cita por teléfono.<br>
          Teléfono: (11) 3104-0701<br>
          Llenando un formulario en la siguiente URL: http://bit.ly/formulario-registro.<br>
          Nota: Es importante proporcionar la mayor cantidad de información posible sobre la persona desaparecida en el formulario.
        </p>
        </p>
      </div>
    </section>

    <section class="class-action-section">
      <div class="content" data-aos="fade-down-right">
        <h2>Más Información</h2>
        <h1>SUS DERECHOS AL PRESENTAR UNA DENUNCIA POLICIAL</h1>
        <ul>
          <li>
            Tiene derecho a recibir un servicio digno y respetuoso por parte de todos los empleados de la comisaría y los funcionarios públicos, quienes deben estar identificados (Ordenanza 18/1998 del Delegado General de Policía, Artículo 13, Incisos VI y VII).
          </li>
          <li>
            Cualquier Comisaría o Comisaría Electrónica debe registrar el informe de la desaparición (Ordenanza 18/1998 del Delegado General de Policía, Artículo 13, Incisos I y III).
          </li>
          <li>
            Está prohibido que el Delegado de Policía espere 24 horas después de conocer la desaparición para registrar la Denuncia Policial (Ordenanza 18/1998 del Delegado General de Policía, Artículo 13, Inciso III).
          </li>
          <li>
            Tiene derecho a recibir una copia del BO y el número del Procedimiento de Investigación relacionado con la desaparición (Constitución Federal, Artículo 5, Inciso XXXIII).
          </li>
          <li>
            Como parte interesada, tiene derecho a ser informado sobre cualquier confidencialidad de la investigación o, en caso contrario, sobre el progreso de la investigación.
          </li>
        </ul>
      </div>
      <div class="image" data-aos="fade-down-left">
        <img src="./assets/images/poli.jpg" alt="Mazo sobre tarjeta de crédito">
      </div>
    </section>

    <section class="orient4">
      <h1 class="tt-mapa" data-aos="zoom-in-up">Secretaría Municipal de Derechos Humanos y Ciudadanía</h1>
      <div class="cont-mapa">
        <h2 class="tt-map">
          Teléfono: (11) 2833.4150 <br>
          smdhcgabinete@prefeitura.sp.gov.br
        </h2>
        <iframe class="iframe"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.5584474548864!2d-46.640007825021335!3d-23.54837866111466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce58534495b681%3A0x1a343f1522cd7280!2zUi4gTMOtYmVybyBCYWRhcsOzLCAxMTkgLSBTw6ksIFPDo28gUGF1bG8gLSBTUCwgMDEwMDgtMDAw!5e0!3m2!1ses!2sbr!4v1731704773016!5m2!1ses!2sbr"
          width="800" height="400" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </section>


  <?php elseif ($language == "en"): ?>
    <div class="containe">
      <div class="text-content">
        <h1>Important Guidelines</h1>
        <p>
          Following guidelines when dealing with a person's disappearance is crucial to maximize the chances of finding them quickly and safely.
        </p>
      </div>
    </div>

    <!-- END OF FIRST SECTION -->

    <section class="orient2">
      <div class="cont-orin">
        <h2 class="baby">Step 1</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Check if the missing person is registered with emergency services</h3>
        <p>
          First, you must check if the missing person is registered with the emergency services listed below:
        </p>
      </div>
    </section>

    <div class="features" data-aos="zoom-in-up">
      <div class="feature">
        <div class="icon">
          <i class="fa-solid fa-truck-medical" style="color: #000000;"></i>
        </div>
        <h3>SAMU</h3>
        <p>If there are signs of an accident or critical health, SAMU provides urgent care. Call 192.</p>
      </div>
      <div class="feature" data-aos="zoom-in-up">
        <div class="icon">
          <i class="fa-solid fa-building-shield" style="color: #000000;"></i>
        </div>
        <h3>FIREFIGHTERS</h3>
        <p>In risk areas like forests or rivers, firefighters help with searches. Call 193 in emergencies.</p>
      </div>
      <div class="feature" data-aos="zoom-in-up">
        <div class="icon">
          <i class="fa-solid fa-handcuffs" style="color: #000000;"></i>
        </div>
        <h3>POLICE</h3>
        <p>File a police report immediately! The police start the search without waiting 24 hours. Provide as many details as possible.</p>
      </div>
    </div>

    <section class="orient3">
      <div class="cont-orin">
        <h2 class="baby" data-aos="fade-down-right">Step 2</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">File a Police Report (BO)</h3>
        <p data-aos="zoom-in">
          The BO is the document that officially triggers the investigation of a disappearance, so it is important to file it immediately after the person goes missing.
          <br> There is no need to wait 24 hours to file the BO. <br>
          When you file a BO for a missing person, their ID is blocked, but this does not generate a criminal record against them. <br>
          It is important to keep your contact details updated with the agencies you sought support from, especially with the police station responsible for the search. <br><br>
        <h3 class="titu">How to file a Police Report (BO):</h3>
        <br>
        <p data-aos="fade-down-left">
          Online at the following URL:
          <button class="btn-link" onclick="window.open('https://www.ssp.sp.gov.br/nbo', '_blank')">Access NBO Platform</button>
          <br>
          In person at the nearest police station; or<br>
          In person at the State Department of Homicides and Missing Persons (DHPP), specifically at the 5th police station specialized in disappearances. <br>
          Address: Rua Brigadeiro Tobias, nº 527 – 3rd floor, Luz – São Paulo (SP).<br>
          Service Hours: 9:00 AM to 6:00 PM.<br>
          Phone Numbers: (11) 3311-3547 / 3311-3548 / 3311-3983
        </p>
        </p>
      </div>

      <div class="cont-orin">
        <h2 class="baby" data-aos="fade-down-right">Step 3</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Seek support in the search</h3>
        <p data-aos="fade-down-left">
          Municipal Service for Support to Families and Missing Persons<br><br>
        <h3 class="titu">What can this service do for you?</h3>
        <p data-aos="fade-down-left">
          Assist in the search, identification, and guidance in disappearance cases; conduct research in municipal databases and general public administration services.<br><br>
          Provide shelter, listening, and/or specialized support (legal, social, psychological, among others) during the search process.<br><br>
          Communicate the disappearance on the social networks of the Human Rights and Citizenship Secretariat of São Paulo.<br>
        </p>
        <br>
        <h3 class="titu">How to request this service?</h3>
        <p data-aos="fade-down-left">
          In person, at the Human Rights Ombudsman’s Office, bringing a recent photo of the missing person.<br>
          Address: Rua Dr. Falcão Filho, 69 – Centro – São Paulo (SP).<br>
          Service Hours: Monday to Friday, 10:00 AM to 4:00 PM, with the possibility of scheduling an appointment by phone.<br>
          Phone: (11) 3104-0701<br>
          By filling out a form at the following URL: http://bit.ly/formulário-cadastramento.<br>
          Note: It is important to provide as much information as possible about the missing person in the form.
        </p>
        </p>
      </div>
    </section>

    <section class="class-action-section">
      <div class="content" data-aos="fade-down-right">
        <h2>More Information</h2>
        <h1>YOUR RIGHTS WHEN FILING A POLICE REPORT</h1>
        <ul>
          <li>
            You have the right to receive dignified and respectful service from all employees at the police station and public officials, and they must be identified (Ordinance 18/1998 of the General Police Delegate, Article 13, Clauses VI and VII).
          </li>
          <li>
            Any Police Station or the Electronic Police Station must record the report of the disappearance (Ordinance 18/1998 of the General Police Delegate, Article 13, Clauses I and III).
          </li>
          <li>
            The Police Delegate is prohibited from waiting 24 hours after learning of the disappearance to register the Police Report (Ordinance 18/1998 of the General Police Delegate, Article 13, Clause III).
          </li>
          <li>
            You have the right to receive a copy of the BO and the Investigation Procedure number related to the disappearance (Federal Constitution, Article 5, Clause XXXIII).
          </li>
          <li>
            As an interested party, you have the right to be informed about any investigation confidentiality or, if not, the progress of the investigation.
          </li>
        </ul>
      </div>
      <div class="image" data-aos="fade-down-left">
        <img src="./assets/images/poli.jpg" alt="Gavel on credit card">
      </div>
    </section>

    <section class="orient4">
      <h1 class="tt-mapa" data-aos="zoom-in-up">Municipal Department of Human Rights and Citizenship</h1>
      <div class="cont-mapa">
        <h2 class="tt-map">
          Phone: (11) 2833.4150 <br>
          smdhcgabinete@prefeitura.sp.gov.br
        </h2>
        <iframe class="iframe"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.5584474548864!2d-46.640007825021335!3d-23.54837866111466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce58534495b681%3A0x1a343f1522cd7280!2zUi4gTMOtYmVybyBCYWRhcsOzLCAxMTkgLSBTw6ksIFPDo28gUGF1bG8gLSBTUCwgMDEwMDgtMDAw!5e0!3m2!1spt-BR!2sbr!4v1731704773016!5m2!1spt-BR!2sbr"
          width="800" height="400" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>

  <?php endif; ?>

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
  include './components/libras.php';
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
<?php
include './database/database-connection.php';
include './utils/get-user-id.php';
include './utils/select-language.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if ($language == "pt"): ?>
      Busca Solidária
    <?php elseif ($language == "es"): ?>
      Búsqueda Solidaria
    <?php elseif ($language == "en"): ?> Solidarity Search
    <?php endif; ?>
  </title>
  <link rel="stylesheet" href="./assets/styles/orientation.css">
  <link rel="stylesheet" href="./assets/styles/globals.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

  <!--comeco da nav-->
  <?php
  include './components/header.php'
  ?>

  <?php if ($language == "pt"): ?>

    <div class="containe">
      <div class="text-content">
        <h1>Orientações recomendadas</h1>
        <p>
          Seguir as orientações ao lidar com o desaparecimento de uma pessoa é crucial para maximizar as chances de
          encontrá-la rapidamente e em segurança.</p>
      </div>
    </div>

    <!--FIM DA PRIMEIRA SECTION-->

    <section class="orient2">
      <div class="cont-orin">
        <h2 class="baby">Passo 1</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Verificar se há registro da pessoa desaparecida nos serviços de emergência</h3>
        <p>Em primeiro lugar, você deve verificar se há algum registro da pessoa desaparecida nos serviços de emergência
          listados abaixo:</p>
      </div>
      <div class="features" data-aos="zoom-in-up">
        <div class="feature">
          <div class="icon">
            <i class="fa-solid fa-pencil"></i>
          </div>
          <h3>SAMU</h3>
          <p>Wozber will do all the heavy lifting. You will only need to follow simple guided step.</p>
        </div>
        <div class="feature" data-aos="zoom-in-up">
          <div class="icon">
            <i class="fa-solid fa-smile"></i>
          </div>
          <h3>BOMBEIROS</h3>
          <p>A chatbot-like assistant that will provide you all the needed help at every step.</p>
        </div>
        <div class="feature" data-aos="zoom-in-up">

          <div class="icon">
            <i class="fa-brands fa-linkedin"></i>
          </div>
          <h3>POLÍCIA</h3>
          <p>Import your English LinkedIn profile and turn it into a job-winning Wozber resume.</p>
        </div>
      </div>


    </section>


    <section class="orient3">
      <div class="cont-orin">
        <h2 class="baby" data-aos="fade-down-right">Passo 2</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Registrar o Boletim de Ocorrência (BO)</h3>
        <p data-aos="zoom-in">O BO é o documento que desencadeia oficialmente a investigação de um desaparecimento, por
          isso é importante fazê-lo imediatamente após a desaparição.</br> Não é necessário aguardar 24 horas para
          registrar o BO.
          </br>
          Quando você faz o BO de uma pessoa desaparecida, o RG dela é bloqueado, mas isso não gera antecedentes criminais
          contra ela.
          </br>
          É importante manter os dados de contato atualizados junto aos órgãos em que solicitou apoio e, principalmente,
          junto à delegacia responsável pela busca.
          </br> </br>
        <h3 class="titu"> Como fazer o Boletim de Ocorrência (BO): </h3>
        </br>
        <p data-aos="fade-down-left">
          Pela internet no endereço eletrônico: <button class="btn-link"
            onclick="window.open('https://www.ssp.sp.gov.br/nbo', '_blank')">
            Acessar Plataforma NBO
          </button>
          </br>
          Presencialmente no DP mais próximo de você; ou
          </br>
          Presencialmente no Departamento Estadual de Homicídios e de Proteção à Pessoa (DHPP), junto à 5ª delegacia
          especializada em desaparecimentos.
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
          Auxiliar na busca, identificação e orientação em casos de desaparecimento; realizar pesquisa em bancos de dados
          municipais e serviços em geral da Administração Pública Municipal.

          Caso a pessoa seja atendida em qualquer Serviço de Acolhimento Municipal (centros de acolhida, Instituições de
          Longa Permanência para Idosos (ILPIs), Serviços de Acolhimento Institucional para Crianças e Idosos (SAICAs)
          etc.), o sistema identificará que se trata de uma pessoa desaparecida e iniciará os procedimentos.

          Dar acolhimento, escuta e/ou algum atendimento especializado (jurídico, social, psicológico, dentre outros),
          durante o processo de busca.

          Realizar comunicação sobre o desaparecimento nas redes sociais da Secretaria de Direitos Humanos e Cidadania
          (SMDHC) da Prefeitura de São Paulo.</p>
        </br>
        <h3 class="titu"> Como solicitar esse atendimento?</h3>
        <p data-aos="fade-down-left">
          Presencialmente, na Ouvidoria de Direitos Humanos, levando uma foto recente da pessoa desaparecida.</br>
          Endereço: Rua Dr. Falcão Filho, 69 – Centro – São Paulo (SP).
          </br>
          Horário de Atendimento: de segunda a sexta-feira, das 10h às 16h, com possibilidade de agendamento pelo telefone
          </br>Telefone: (11) 3104-0701.
          </br>
          Por meio do preenchimento de formulário no endereço eletrônico http://bit.ly/formuláriocadastramento.</br>
          Atenção: é importante fornecer, no formulário, o maior número de dados possíveis sobre a pessoa desaparecida.
        </p>
      </div>

    </section>
    <section class="class-action-section">
      <div class="content">
        <h2>mais informações</h2>
        <h1>SEUS DIREITOS AO FAZER BO</h1>
        <li>
          Você tem o direito de receber atendimento digno e respeitoso por parte de todos os funcionários da delegacia e
          do Poder Público e eles devem estar identificados (Portaria 18/1998 do Delegado Geral de Polícia, artigo 13º,
          incisos VI e VII). </br>
        <li> Qualquer Delegacia de Polícia ou a Delegacia Eletrônica deve registrar a notícia do desaparecimento (Portaria
          nº 18/1998 do Delegado Geral de Polícia, artigo 13, incisos I e III).</br></li>
        <li>É proibido ao Delegado esperar 24h do conhecimento do desaparecimento para registrar o Boletim de Ocorrência
          (Portaria nº 18/1998 do Delegado Geral de Polícia, artigo 13, inciso III).</br></li>
        <li> Você tem direito a ter uma cópia do BO e número do Procedimento de Investigação de Desaparecimento instaurado
          ( Constituição Federal, artigo 5º, inciso XXXIII).</br></li>
        <li> Por ser parte interessada, você tem direito a ser informado sobre eventual sigilo da investigação ou, em caso
          negativo, do andamento da investigação.</br> </li>
        </li>
      </div>
      <div class="image">
        <img src="./assets/images/poli.jpg" alt="Gavel on credit card">
      </div>
    </section>
    <section class="orient4">
      <h1 class="tt-mapa">Secretaria Municipal de Direitos Humanos e Cidadania</h1>
      <div class="cont-mapa">
        <h2 class="tt-map">Telefone: (11) 2833.4150 <br>smdhcgabinete@prefeitura.sp.gov.br</h2>
        <iframe class="iframe"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.5584474548864!2d-46.640007825021335!3d-23.54837866111466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce58534495b681%3A0x1a343f1522cd7280!2zUi4gTMOtYmVybyBCYWRhcsOzLCAxMTkgLSBTw6ksIFPDo28gUGF1bG8gLSBTUCwgMDEwMDgtMDAw!5e0!3m2!1spt-BR!2sbr!4v1731704773016!5m2!1spt-BR!2sbr"
          width="800" height="400" style="border: 0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>


    <section class="orient5">

    </section>

  <?php elseif ($language == "es"): ?>

    <div class="containe">
      <div class="text-content">
        <h1>Pautas recomendadas</h1>
        <p>
          Seguir las pautas al tratar con la desaparición de una persona es crucial para maximizar las posibilidades de
          Encuéntralo de manera rápida y segura.
        </p>
      </div>
    </div>

    <!--FIM DA PRIMEIRA SECTION-->

    <section class="orient2">
      <div class="cont-orin">
        <h2 class="baby">Paso 1</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Verifique si hay un registro de la persona desaparecida en los servicios de emergencia</h3>
        <p>
          En primer lugar, debe verificar si hay algún registro de la persona desaparecida en los servicios de emergencia
          Listado a continuación:
        </p>
      </div>
      <div class="features" data-aos="zoom-in-up">
        <div class="feature">
          <div class="icon">
            <i class="fa-solid fa-pencil"></i>
          </div>
          <h3>SAMU</h3>
          <p>Wozber will do all the heavy lifting. You will only need to follow simple guided step.</p>
        </div>
        <div class="feature" data-aos="zoom-in-up">
          <div class="icon">
            <i class="fa-solid fa-smile"></i>
          </div>
          <h3>BOMBEROS</h3>
          <p>A chatbot-like assistant that will provide you all the needed help at every step.</p>
        </div>
        <div class="feature" data-aos="zoom-in-up">

          <div class="icon">
            <i class="fa-brands fa-linkedin"></i>
          </div>
          <h3>POLICÍA</h3>
          <p>Import your English LinkedIn profile and turn it into a job-winning Wozber resume.</p>
        </div>
      </div>


    </section>


    <section class="orient3">
      <div class="cont-orin">
        <h2 class="baby" data-aos="fade-down-right">Paso 2</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Registre el informe de ocurrencia(BO)</h3>
        <p data-aos="zoom-in">
          Bo es el documento que desencadena oficialmente la investigación de una desaparición, para
          Esto es importante hacerlo inmediatamente después de la desaparición. </br>
          No es necesario esperar 24 horas para
          Registre el bo.
          </br>
          Cuando haces que la persona desaparecida sea, su identificación está bloqueada, pero eso no genera antecedentes
          penales
          contra ella.
          </br>
          Es importante mantener los datos de contacto actualizados con los órganos en los que solicitó soporte y,
          especialmente,
          Al lado de la estación de policía responsable de la búsqueda.</br> </br>
        <h3 class="titu"> Cómo hacer el informe de ocurrencia (BO): </h3>
        </br>
        <p data-aos="fade-down-left">
          A través de Internet en la dirección de correo electrónico: <button class="btn-link"
            onclick="window.open('https://www.ssp.sp.gov.br/nbo', '_blank')">
            Plataforma de acceso NBO
          </button>
          </br>
          En persona en el DP más cercano de ti;o
          </br>
          En persona en el Departamento de Homicidios y Protección de Personas de Estado (DHPP), con la quinta estación de
          policía
          especializado en desapariciones.
          Dirección: Rua Brigadeiro Tobias, No. 527 - 3 piso, Luz - São Paulo (SP).
          Horario de oficina: 09h a 18. </br> Teléfonos: (11) 3311-3547 / 3311-3548 / 3311-3983</p>
        </p>
      </div>

      <div class="cont-orin">
        <h2 class="baby" data-aos="fade-down-right">Psso 3</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu"> Buscar apoyo</h3>
        <p data-aos="fade-down-left">Serviço Municipal de Apoio a Familiares e Pessoas Desaparecidas </br>
          </br>
        <h3 class="titu"> O que esse serviço pode fazer por você? </h3>

        <p data-aos="fade-down-left">
          Asistir en la búsqueda, identificación y orientación en casos de desaparición;realizar investigaciones en bases
          de datos
          Municipalidades y servicios en general de la Administración Pública Municipal.

          Si la persona se cumple en algún servicio de atención municipal (centros anfitriones, instituciones de
          Larga estadía para los ancianos (ILPI), servicios de recepción institucional para niños y ancianos (Saicas)
          etc.), el sistema identificará que es una persona desaparecida e iniciará los procedimientos.

          Dar recepción, escucha y/o algo de atención especializada (legal, social, psicológica, entre otros),
          Durante el proceso de búsqueda.

          Realizar comunicación sobre la desaparición en las redes sociales de la Secretaría de Derechos Humanos y
          Ciudadanía
          (Smdhc) de la ciudad de São Paulo.</p>
        </br>
        <h3 class="titu"> Como solicitar esse atendimento?</h3>
        <p data-aos="fade-down-left">
          En persona, en el Defensor del Pueblo de Derechos Humanos, tomando una foto reciente de la persona desaparecida.
          Dirección: Rua Dr. Falcão Filho, 69 - Centro - São Paulo (SP).</br>
          Horario de oficina: de lunes a viernes, de 10 a.m. a 4 p.m., con la posibilidad de cita por
          teléfono</br>Teléfono: (11) 3104-0701.
          </br>
          Completando el formulario en la dirección de correo electrónico http://bit.ly/formuláriocadastramento.</br>
          Atención: es importante proporcionar, en el formulario, el mayor número posible de datos sobre la persona
          desaparecida.
        </p>
      </div>

    </section>
    <section class="class-action-section">
      <div class="content">
        <h2>mais informações</h2>
        <h1>SEUS DIREITOS AO FAZER BO</h1>
        <li>
          Tiene derecho a recibir un servicio decente y respetuoso de todos los empleados de la estación de policía y
          del poder público y deben ser identificados (Portaria 18/1998 do Delegado Geral de Polícia, artigo 13º,
          incisos VI e VII). </br>

        <li> Cualquier estación de policía o la estación de policía electrónica debe registrar las noticias de la
          desaparición(Portaria
          nº 18/1998 do Delegado Geral de Polícia, artigo 13, incisos I e III).</br></li>
        <li>Se le prohíbe al delegado esperar 24 horas desde la desaparición para registrar el informe policial(Portaria
          nº 18/1998 do Delegado Geral de Polícia, artigo 13, inciso III).</br></li>
        <li> Tiene derecho a tener una copia de BO y el número del procedimiento de investigación de desaparición(
          Constituição Federal, artigo 5º, inciso XXXIII).</br></li>
        <li> Debido a que es una parte interesada, tiene derecho a ser informado sobre cualquier confidencialidad de la
          investigación o, en caso de
          negativo, el progreso de la investigación.</br> </li>
      </div>
      <div class="image">
        <img src="./assets/images/poli.jpg" alt="Gavel on credit card">
      </div>
    </section>
    <section class="orient4">
      <h1 class="tt-mapa">Secretaría Municipal de Derechos Humanos y Ciudadanía</h1>
      <div class="cont-mapa">
        <h2 class="tt-map">Teléfono: (11) 2833.4150 <br>smdhcgabinete@prefeitura.sp.gov.br</h2>
        <iframe class="iframe"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.5584474548864!2d-46.640007825021335!3d-23.54837866111466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce58534495b681%3A0x1a343f1522cd7280!2zUi4gTMOtYmVybyBCYWRhcsOzLCAxMTkgLSBTw6ksIFPDo28gUGF1bG8gLSBTUCwgMDEwMDgtMDAw!5e0!3m2!1spt-BR!2sbr!4v1731704773016!5m2!1spt-BR!2sbr"
          width="800" height="400" style="border: 0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>


    <section class="orient5">

    </section>

  <?php elseif ($language == "en"): ?>

    <div class="containe">
      <div class="text-content">
        <h1>Orientações recomendadas</h1>
        <p>
          Seguir as orientações ao lidar com o desaparecimento de uma pessoa é crucial para maximizar as chances de
          encontrá-la rapidamente e em segurança.</p>
      </div>
    </div>

    <!--FIM DA PRIMEIRA SECTION-->

    <section class="orient2">
      <div class="cont-orin">
        <h2 class="baby">Passo 1</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Verificar se há registro da pessoa desaparecida nos serviços de emergência</h3>
        <p>Em primeiro lugar, você deve verificar se há algum registro da pessoa desaparecida nos serviços de emergência
          listados abaixo:</p>
      </div>
      <div class="features" data-aos="zoom-in-up">
        <div class="feature">
          <div class="icon">
            <i class="fa-solid fa-pencil"></i>
          </div>
          <h3>SAMU</h3>
          <p>Wozber will do all the heavy lifting. You will only need to follow simple guided step.</p>
        </div>
        <div class="feature" data-aos="zoom-in-up">
          <div class="icon">
            <i class="fa-solid fa-smile"></i>
          </div>
          <h3>BOMBEIROS</h3>
          <p>A chatbot-like assistant that will provide you all the needed help at every step.</p>
        </div>
        <div class="feature" data-aos="zoom-in-up">

          <div class="icon">
            <i class="fa-brands fa-linkedin"></i>
          </div>
          <h3>POLÍCIA</h3>
          <p>Import your English LinkedIn profile and turn it into a job-winning Wozber resume.</p>
        </div>
      </div>


    </section>


    <section class="orient3">
      <div class="cont-orin">
        <h2 class="baby" data-aos="fade-down-right">Passo 2</h2>
      </div>
      <div class="cont-orin1">
        <h3 class="titu">Registrar o Boletim de Ocorrência (BO)</h3>
        <p data-aos="zoom-in">O BO é o documento que desencadeia oficialmente a investigação de um desaparecimento, por
          isso é importante fazê-lo imediatamente após a desaparição.</br> Não é necessário aguardar 24 horas para
          registrar o BO.
          </br>
          Quando você faz o BO de uma pessoa desaparecida, o RG dela é bloqueado, mas isso não gera antecedentes criminais
          contra ela.
          </br>
          É importante manter os dados de contato atualizados junto aos órgãos em que solicitou apoio e, principalmente,
          junto à delegacia responsável pela busca.
          </br> </br>
        <h3 class="titu"> Como fazer o Boletim de Ocorrência (BO): </h3>
        </br>
        <p data-aos="fade-down-left">
          Pela internet no endereço eletrônico: <button class="btn-link"
            onclick="window.open('https://www.ssp.sp.gov.br/nbo', '_blank')">
            Acessar Plataforma NBO
          </button>
          </br>
          Presencialmente no DP mais próximo de você; ou
          </br>
          Presencialmente no Departamento Estadual de Homicídios e de Proteção à Pessoa (DHPP), junto à 5ª delegacia
          especializada em desaparecimentos.
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
          Auxiliar na busca, identificação e orientação em casos de desaparecimento; realizar pesquisa em bancos de dados
          municipais e serviços em geral da Administração Pública Municipal.

          Caso a pessoa seja atendida em qualquer Serviço de Acolhimento Municipal (centros de acolhida, Instituições de
          Longa Permanência para Idosos (ILPIs), Serviços de Acolhimento Institucional para Crianças e Idosos (SAICAs)
          etc.), o sistema identificará que se trata de uma pessoa desaparecida e iniciará os procedimentos.

          Dar acolhimento, escuta e/ou algum atendimento especializado (jurídico, social, psicológico, dentre outros),
          durante o processo de busca.

          Realizar comunicação sobre o desaparecimento nas redes sociais da Secretaria de Direitos Humanos e Cidadania
          (SMDHC) da Prefeitura de São Paulo.</p>
        </br>
        <h3 class="titu"> Como solicitar esse atendimento?</h3>
        <p data-aos="fade-down-left">
          Presencialmente, na Ouvidoria de Direitos Humanos, levando uma foto recente da pessoa desaparecida.</br>
          Endereço: Rua Dr. Falcão Filho, 69 – Centro – São Paulo (SP).
          </br>
          Horário de Atendimento: de segunda a sexta-feira, das 10h às 16h, com possibilidade de agendamento pelo telefone
          </br>Telefone: (11) 3104-0701.
          </br>
          Por meio do preenchimento de formulário no endereço eletrônico http://bit.ly/formuláriocadastramento.</br>
          Atenção: é importante fornecer, no formulário, o maior número de dados possíveis sobre a pessoa desaparecida.
        </p>
      </div>

    </section>
    <section class="class-action-section">
      <div class="content">
        <h2>mais informações</h2>
        <h1>SEUS DIREITOS AO FAZER BO</h1>
        <li>
          Você tem o direito de receber atendimento digno e respeitoso por parte de todos os funcionários da delegacia e
          do Poder Público e eles devem estar identificados (Portaria 18/1998 do Delegado Geral de Polícia, artigo 13º,
          incisos VI e VII). </br>
        <li> Qualquer Delegacia de Polícia ou a Delegacia Eletrônica deve registrar a notícia do desaparecimento (Portaria
          nº 18/1998 do Delegado Geral de Polícia, artigo 13, incisos I e III).</br></li>
        <li>É proibido ao Delegado esperar 24h do conhecimento do desaparecimento para registrar o Boletim de Ocorrência
          (Portaria nº 18/1998 do Delegado Geral de Polícia, artigo 13, inciso III).</br></li>
        <li> Você tem direito a ter uma cópia do BO e número do Procedimento de Investigação de Desaparecimento instaurado
          ( Constituição Federal, artigo 5º, inciso XXXIII).</br></li>
        <li> Por ser parte interessada, você tem direito a ser informado sobre eventual sigilo da investigação ou, em caso
          negativo, do andamento da investigação.</br> </li>
        </li>
      </div>
      <div class="image">
        <img src="./assets/images/poli.jpg" alt="Gavel on credit card">
      </div>
    </section>
    <section class="orient4">
      <h1 class="tt-mapa">Secretaria Municipal de Direitos Humanos e Cidadania</h1>
      <div class="cont-mapa">
        <h2 class="tt-map">Telefone: (11) 2833.4150 <br>smdhcgabinete@prefeitura.sp.gov.br</h2>
        <iframe class="iframe"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.5584474548864!2d-46.640007825021335!3d-23.54837866111466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce58534495b681%3A0x1a343f1522cd7280!2zUi4gTMOtYmVybyBCYWRhcsOzLCAxMTkgLSBTw6ksIFPDo28gUGF1bG8gLSBTUCwgMDEwMDgtMDAw!5e0!3m2!1spt-BR!2sbr!4v1731704773016!5m2!1spt-BR!2sbr"
          width="800" height="400" style="border: 0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>


    <section class="orient5">

    </section>

  <?php endif; ?>









  <?php
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

  <!-- javascript -->

  <script src="./assets/javascript/politica.js"></script>
  <script src="./assets/javascript/header.js"></script>
  <script src="./assets/javascript/handle-form-user.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <!-- AOS ANIMAÇÂO -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>


</body>

</html>
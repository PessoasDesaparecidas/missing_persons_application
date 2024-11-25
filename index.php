<?php
include './database/database-connection.php';
include './utils/get-user-id.php';
include './database/missings-repository.php';

$leanguage = "pt";

if (isset($_GET["lg"])) {
  switch ($_GET["lg"]) {
    case 'en':
      $leanguage = "en";
      break;
    case 'es':
      $leanguage = "es";
      break;
    default:
      $leanguage = "pt";
      break;
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if ($leanguage == "pt"): ?>
    Busca Solidária
    <?php elseif ($leanguage == "es"): ?>
    Búsqueda Solidaria
    <?php elseif ($leanguage == "en"): ?>
    Solidarity Search
    <? endif; ?>
  </title>
  <link rel="icon" href="./assets/images/favicon.png">
  <link rel="stylesheet" href="./assets/styles/globals.css">
  <link rel="stylesheet" href="./assets/styles/about.css">
  <link rel="stylesheet" href="./assets/styles/carrossel.css">
  <link rel="stylesheet" href="./assets/styles/tudo.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
  <!--comeco da nav-->
  <?php
  include './components/header.php'
  ?>
  <!--fim da nav-->

  <!--1 section-->
  <section class="one">
    <div class="content-0" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
      <h1>
        <?php if ($leanguage = "pt"): ?>
        <?php elseif ($leanguage = "en"): ?>
        <?php elseif ($leanguage = "es"): ?>
        <? endif ?>
        Ajude-nos a encontrar aqueles que fazem falta.
      </h1>
      <p>
        <?php if ($leanguage = "pt"): ?>
        O desaparecimento de pessoas no Brasil é uma questão alarmante, com cerca de 80 mil novos casos anuais,
        segundo o Anuário Brasileiro de Segurança Pública. Diante da falta de informações claras à população sobre
        o que fazer em casos de desaparecimento, nossa plataforma procura auxiliar, oferecendo um banco de dados e
        um sistema para cadastro de pessoas desaparecidas.
        <?php elseif ($leanguage = "en"): ?>
        The disappearance of people in Brazil is an alarming issue, with around 80 thousand new cases annually,
        according to the Brazilian Public Security Yearbook. Given the lack of clear information to the population about
        what to do in cases of disappearance, our platform seeks to help, offering a database and
        a system for registering missing persons.
        <?php elseif ($leanguage = "es"): ?>
        La desaparición de personas en Brasil es un tema alarmante, con alrededor de 80 mil nuevos casos al año,
        según el Anuario Brasileño de Seguridad Pública. Ante la falta de información clara a la población sobre
        qué hacer en casos de desaparición, nuestra plataforma busca ayudar, ofreciendo una base de datos y
        un sistema para registrar personas desaparecidas.
        <? endif ?>

      </p>
      <a href="./missing-cadastre.php" class="btn">
        <?php if ($leanguage = "pt"): ?>
        Cadastre aqui
        <?php elseif ($leanguage = "en"): ?>
        Register here
        <?php elseif ($leanguage = "es"): ?>
        Regístrate aquí
        <? endif ?>
      </a>
    </div>
  </section>
  <!--fim-->
  <br />

  <!-- carrossel -->
  <h1 class="tit">
    <?php if ($leanguage = "pt"): ?>
    DESAPARECIDOS RECENTEMENTE
    <?php elseif ($leanguage = "en"): ?>
    RECENTLY MISSING
    <?php elseif ($leanguage = "es"): ?>
    RECIENTEMENTE DESAPARECIDO
    <? endif ?>
  </h1>
  <section class="carrossel" data-aos="fade-up">
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carousel">
        <?php
        $recent_missings = fetch_recent_missings($connection, 0);

        if ($recent_missings->num_rows > 0) :
        ?>
        <?php while ($missing = $recent_missings->fetch_assoc()): ?>
        <div class="card">
          <div class="card-img">
            <img src="./assets/uploads/missings/<?php echo $missing["missing_person_photo"] ?>">
          </div>
          <div class="card-body">
            <p><strong> Nome: </strong> <?php echo $missing["missing_person_name"] ?></p>
            <p><strong> Idade: </strong> <?php echo $missing["missing_person_age"] ?></p>
            <p><strong> Região: </strong> <?php echo $missing["missing_location"] ?></p>

            <p><strong>Data do desaparecimento</strong>
              <?php
                  $date = new DateTime($missing["missing_date"]);
                  $formatted_date = $date->format('d/m/Y');
                  echo  $formatted_date ?>
            </p>
            <a href="./desaparecido.php?missing_id=<?php echo $missing["missing_person_id"] ?>" class="btn"><i
                class="fa-solid fa-comment"></i> Viu? Comente</a>
          </div>
        </div>
        <?php endwhile ?>
        <?php endif; ?>
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
  </section>

  <center>
    <section class="cta-section">
      <div class="cta-content" data-aos="fade-up" data-aos-duration="3000">
        <?php if ($leanguage = "pt"): ?>
        <h2>
          <span>
            Cada minuto importa,
          </span><br>
          </br>
          <strong>
            cadastre aqui seu
          </strong>
          <span class="typing-text"></span>
        </h2>
        <p>
          aumentando a possibilidade de encontra-lo.
        </p>
        <small>
          O preenchimento de formulario não substitui o BO
        </small>
        <a href="./missing-cadastre.php" class="btn">
          Formulario de cadastro
        </a>
        <?php elseif ($leanguage = "en"): ?>
        <h2>
          <span>
            Every minute counts,
          </span><br>
          </br>
          <strong>
            register your
          </strong>
          <span class="typing-text"></span>
        </h2>
        <p>
          increasing the possibility of finding it.
        </p>
        <small>
          Filling out the form does not replace the BO
        </small>
        <a href="./missing-cadastre.html" class="btn">
          Registration form
        </a>
        <?php elseif ($leanguage = "es"): ?>
        <h2>
          <lapso>
            Cada minuto importa,
            </span><br>
            </br>
            <fuerte>
              catastro aqui seu
              </strong>
              <span class="texto-escrito"></span>
        </h2>
        <small>
          aumentando la posibilidad de encontrar-lo.
          </sma>
          <p>
            El preenchimento de formulario no sustituye el BO
          </p>
          <a href="./missing-cadastre.html" class="btn">
            Formulario de catastro
          </a>
          <? endif ?>

      </div>
    </section>

  </center>


  <center>
    <section class="spsp" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
      <div class="sampa">
        <div class="image-section">
          <!-- Substitua a URL da imagem abaixo pela sua imagem -->
          <img src="./assets/images/sp.webp" alt="Descrição da Imagem">
        </div>
        <div class="text-section">
          <?php if ($leanguage = "pt"): ?>
          <p class="subtitle">
            No ano de 2024, em uma pesquisa feita pela instituição SSP, aponta cerca de 17.711
            pessoas que estavam desaparecidas e foram encontradas em São Paulo.
          </p>
          <h1 class="title">Podemos ajudar nessa busca!</h1>
          <?php elseif ($leanguage = "en"): ?>
          <p class="subtitle">
            In 2024, a survey carried out by the SSP institution indicated that around 17,711 people were missing and
            found in São Paulo.
          </p>
          <h1 class="title">We can help you in this search!</h1>
          <?php elseif ($leanguage = "es"): ?>
          <p cuass="subtitle">
            En el año 2024, en encuesta realizada por la institución SSP señala alrededor de 17.711
            personas que estaban desaparecidas y fueron encontradas en São Paulo.
          </p>
          <h1 class="title">¡Podemos ayudar en esta búsqueda!</h1>
          <? endif ?>

        </div>
      </div>
    </section>
  </center>



  <section class="faq-section">
    <h2 data-aos="zoom-in">
      <?php if ($leanguage = "pt"): ?>
      Principais perguntas e informações
      <?php elseif ($leanguage = "en"): ?>
      Main questions and information
      <?php elseif ($leanguage = "es"): ?>
      Preguntas e información clave
      <? endif ?>
    </h2>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>
        <?php if ($leanguage = "pt"): ?>
        O que é desaparecimento?
        <?php elseif ($leanguage = "en"): ?>
        What is disappearance?
        <?php elseif ($leanguage = "es"): ?>
        ¿Qué es la desaparición?
        <? endif ?>
      </h3>
      <p>
        <?php if ($leanguage = "pt"): ?>
        Desaparecimento é o sumiço repentino de alguém, sem aviso prévio a familiares ou a terceiros. Uma pessoa é
        considerada desaparecida quando não pode ser localizada nos lugares que costuma frequentar, nem encontrada de
        qualquer outra forma.
        <?php elseif ($leanguage = "en"): ?>
        Disappearance is the sudden disappearance of someone, without prior notice to family members or third parties. A
        person is considered missing when they cannot be located in the places they usually frequent, nor found in any
        other way.
        <?php elseif ($leanguage = "es"): ?>
        Desaparición es la desaparición repentina de una persona, sin previo aviso a familiares o terceros. una persona
        es
        se considera desaparecida cuando no puede ser localizada en los lugares que habitualmente frecuenta, ni
        encontrada
        cualquier otra manera.
        <? endif ?>

      </p>
    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>
        <?php if ($leanguage = "pt"): ?>
        Quais motivos podem levar ao desaparecimento de alguem?
        <?php elseif ($leanguage = "en"): ?>
        What reasons can lead to someone disappearing?
        <?php elseif ($leanguage = "es"): ?>
        ¿Qué motivos podrían llevar a que alguien desaparezca?
        <? endif ?>

      </h3>
      <p>
        <?php if ($leanguage = "pt"): ?>
        Várias causas podem levar a essa desaparição, por exemplo, conflitos familiares, uso problemático de drogas,
        alcoolismo, transtorno mental, depressão, violência, dentre outras. O desaparecimento pode ser:

        </br> Voluntário, quando a pessoa se afasta por vontade própria e sem avisar. Isso pode acontecer por motivos
        diversos, como desentendimentos, medo, aflição, planos de vida diferentes, entre outros conflitos.
        </br> Involuntário, quando a pessoa é afastada do cotidiano por um evento sobre o qual não tem controle, como um
        acidente, um problema de saúde, um desastre natural;
        </br> Forçado, quando outras pessoas provocam o afastamento, sem a concordância da pessoa, como em um sequestro,
        ou pela ação do próprio Estado.
        <?php elseif ($leanguage = "en"): ?>
        Several causes can lead to this disappearance, such as family conflicts, problematic drug use,
        alcoholism, mental disorders, depression, violence, among others. The disappearance can be:

        </br> Voluntary, when the person leaves of their own free will and without warning. This can happen for various
        reasons, such as disagreements, fear, distress, different life plans, among other conflicts.
        </br> Involuntary, when the person is removed from their daily lives by an event over which they have no
        control, such as an accident, a health problem, a natural disaster;
        </br> Forced, when other people cause the removal, without the person's consent, such as in a kidnapping,
        or by the action of the State itself.
        <?php elseif ($leanguage = "es"): ?>
        Diversas causas pueden provocar esta desaparición, por ejemplo, conflictos familiares, consumo problemático de
        drogas,
        alcoholismo, trastorno mental, depresión, violencia, entre otros. La desaparición puede ser:

        </br> Voluntaria, cuando la persona se marcha voluntariamente y sin previo aviso. Esto puede suceder por razones
        situaciones diversas, como desacuerdos, miedo, angustia, diferentes planes de vida, entre otros conflictos.
        </br> Involuntario, cuando la persona es apartada de la vida diaria por un hecho sobre el cual no tiene control,
        como por ejemplo un
        accidente, un problema de salud, un desastre natural;
        </br> Forzado, cuando otras personas hacen que la persona se vaya, sin su consentimiento, como en un secuestro,
        o por la acción del propio Estado.
        <? endif ?>
      </p>

    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>
        <?php if ($leanguage = "pt"): ?>
        Por que agir rápido em caso de desaparecimento?
        <?php elseif ($leanguage = "en"): ?>
        Why act quickly in case of disappearance?
        <?php elseif ($leanguage = "es"): ?>
        ¿Por qué actuar rápidamente en caso de desaparición?
        <? endif ?>
      </h3>
      <p>
        <?php if ($leanguage = "pt"): ?>
        Normalmente, não estamos preparados para vivenciar o desaparecimento de algum ente querido. Ele acontece de
        repente e sem que se saiba sua causa. Quanto mais rápido você procurar ajuda, mais são as chances de reencontro,
        especialmente quando se trata de um desaparecimento forçado ou involuntário.

        <?php elseif ($leanguage = "en"): ?>
        We are usually not prepared to experience the disappearance of a loved one. It happens suddenly and without any
        known cause. The sooner you seek help, the greater the chances of being reunited, especially when it is a case
        of forced or involuntary disappearance.
        <?php elseif ($leanguage = "es"): ?>
        Normalmente, no estamos preparados para vivir la desaparición de un ser querido. le sucede a
        de repente y sin saber su causa. Cuanto más rápido busque ayuda, más probabilidades tendrá de reunirse.
        especialmente cuando se trata de una desaparición forzada o involuntaria.
        <? endif ?>
      </p>
    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>
        <?php if ($leanguage = "pt"): ?>
        O que fazer em uma situação de desaparecimento voluntário?
        <?php elseif ($leanguage = "en"): ?>
        Why act quickly in case of disappearance?
        <?php elseif ($leanguage = "es"): ?>
        ¿Qué hacer ante una situación de desaparición voluntaria?
        <? endif ?>
      </h3>
      <p>
        <?php if ($leanguage = "pt"): ?>
        Toda pessoa tem o direito de mudar de vida, independentemente do motivo. No entanto, quando uma pessoa decide,
        voluntariamente, se afastar de sua rotina ou do convívio com a família, é importante que ela comunique a decisão
        de se ausentar. O desaparecimento voluntário abala a rotina de outras pessoas e também do Poder Público, que
        deve se concentrar na busca de pessoas que desapareceram de forma involuntária ou forçada. É importante
        compreender que a pessoa que desapareceu por vontade própria tem o direito de, quando encontrada, não retornar
        ou, não reatar o vínculo familiar, desde que seja maior de idade e capaz de ser responsável por si. Nesses
        casos, o Poder Público deve apenas comunicar os familiares que o desaparecido foi encontrado e não quer ser
        localizado.
        <?php elseif ($leanguage = "en"): ?>
        Everyone has the right to change their life, regardless of the reason. However, when a person decides,
        voluntarily, to leave their routine or their family, it is important that they communicate their decision to
        leave. Voluntary disappearance disrupts the routine of other people and also of the Government, which must focus
        on the search for people who have disappeared involuntarily or forcibly. It is important to understand that a
        person who has disappeared of their own free will has the right, when found, not to return or not to reestablish
        family ties, as long as they are of legal age and capable of being responsible for themselves. In these cases,
        the Government must only inform the family members that the missing person has been found and does not wish to
        be located.
        <?php elseif ($leanguage = "es"): ?>
        Toda persona tiene derecho a cambiar de vida, independientemente del motivo. Sin embargo, cuando una persona
        decide,
        voluntariamente, para alejarse de su rutina o de su familia, es importante que le comunique la decisión
        estar ausente. La desaparición voluntaria trastoca la rutina de otras personas y también del Poder Público, lo
        que
        debería centrarse en encontrar personas que han desaparecido involuntariamente o por la fuerza. es importante
        entender que una persona que desapareció voluntariamente tiene derecho, cuando sea encontrada, a no regresar
        o, no renovar el vínculo familiar, siempre que sea mayor de edad y capaz de ser responsable de sí mismo. En
        estos
        En estos casos, las Autoridades Públicas sólo deberán informar a los familiares de que la persona desaparecida
        ha sido encontrada y no quiere ser encontrada.
        situado.
        <? endif ?>

      </p>
    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>
        <?php if ($leanguage = "pt"): ?>
        O que fazer em caso de desaparecimento de crianças, adolescentes e pessoas com transtorno mental?
        <?php elseif ($leanguage = "en"): ?>
        What to do if children, teenagers and people with mental disorders go missing?
        <?php elseif ($leanguage = "es"): ?>
        ¿Qué hacer si desaparecen niños, adolescentes y personas con trastornos mentales?
        <? endif ?>
      </h3>
      <p>
        <?php if ($leanguage = "pt"): ?>
        Para a lei, crianças, adolescentes e pessoas com transtorno mental desconhecem a gravidade de mudar de vida sem
        o apoio da família ou de pessoas próximas. Por isso, elas nunca são consideradas como casos de desaparecimento
        voluntário e devem imediatamente ser procuradas e reconduzidas a um local seguro. Ou seja, mesmo que ela tenha
        se esquecido de avisar aonde foi, tenha fugido ou se afastado por vontade própria, é dever do Poder Público
        procurá-la com a máxima urgência, sem esperar nem um minuto a mais. Se a criança, adolescente ou incapaz tiver
        desaparecido em razão de violência ou perseguição, ela deverá ser encaminhada a um conselho tutelar ou órgão
        competente.
        <?php elseif ($leanguage = "en"): ?>
        Según la ley, niños, adolescentes y personas con trastornos mentales desconocen la gravedad de cambiar sus vidas
        sin
        apoyo de familiares o personas cercanas a usted. Por lo tanto, nunca se consideran casos de personas
        desaparecidas.
        voluntario y debe ser buscado inmediatamente y llevado a un lugar seguro. Es decir, incluso si ella tiene
        Si olvidó decir adónde fue, si se escapó o se fue por su propia voluntad, es deber de las Autoridades Públicas
        búscalo con la máxima urgencia, sin esperar ni un minuto más. Si el niño, adolescente o persona discapacitada
        tiene
        desaparecido por violencia o persecución, deberá ser remitido a un consejo u órgano de tutela
        competente.
        <?php elseif ($leanguage = "es"): ?>
        Según la ley, niños, adolescentes y personas con trastornos mentales desconocen la gravedad de cambiar sus vidas
        sin
        apoyo de familiares o personas cercanas a usted. Por lo tanto, nunca se consideran casos de personas
        desaparecidas.
        voluntario y debe ser buscado inmediatamente y llevado a un lugar seguro. Es decir, incluso si ella tiene
        Si olvidó decir adónde fue, si se escapó o se fue por su propia voluntad, es deber de las Autoridades Públicas
        búscalo con la máxima urgencia, sin esperar ni un minuto más. Si el niño, adolescente o persona discapacitada
        tiene
        desaparecido por violencia o persecución, deberá ser remitido a un consejo u órgano de tutela
        competente.
        <? endif ?>

      </p>
    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">

      <?php if ($leanguage = "pt"): ?>
      <h3>
        O registro do BO só pode ser feito depois de passadas algumas horas?
      </h3>
      <p>Pelo contrário! Quanto mais rápido você iniciar sua busca, há mais possibilidades de localizar a pessoa
        desaparecida.</p>
      <?php elseif ($leanguage = "en"): ?>
      <h3>
        Can a police report only be filed after a few hours have passed?

      </h3>
      <p>On the contrary! The sooner you start your search, the more likely you are to find the missing person.</p>
      <?php elseif ($leanguage = "es"): ?>
      <h3>
        ¿El registro de BO sólo se puede realizar después de unas horas?
      </h3>
      <p>¡Al contrario! Cuanto más rápido comiences tu búsqueda, más posibilidades tendrás de localizar a la persona.
        desaparecido.</p>
      <? endif ?>

    </div>
  </section>
  <h1 class="tit">
    <?php if ($leanguage = "pt"): ?>
    SOBRE NÓS
    <?php elseif ($leanguage = "en"): ?>
    ABOUT US
    <?php elseif ($leanguage = "es"): ?>
    SOBRE NOSOTROS
    <? endif ?>
  </h1>
  <section class="about">

    <div class="about-content">
      <ul>
        <p>
          <?php if ($leanguage = "pt"): ?>

          O Busca Solidária surgiu em 2024 a partir de um projeto de TCC realizados por alunos da ETEC Parque da
          Juventude do curso de Desenvolvimento de Sistemas. Tem o objetivo de ajudar as pessoas que possuem entes
          queridos desaparecidos a encontrá-los, por meio de um banco de dados aberto ao público.
          <?php elseif ($leanguage = "en"): ?>
          Busca Solidária emerged in 2024 from a final project carried out by students from ETEC Parque da Juventude in
          the Systems Development course. Its objective is to help people who have missing loved ones find them, through
          a database open to the public.
          <?php elseif ($leanguage = "es"): ?>
          Busca Solidária surgió en 2024 a partir de un proyecto TCC realizado por estudiantes de ETEC Parque da
          Jóvenes en el curso de Desarrollo de Sistemas. Su objetivo es ayudar a las personas que tienen seres queridos.
          seres queridos desaparecidos para encontrarlos, a través de una base de datos abierta al público.
          <? endif ?>
        </p>
        <br />
        <p>
          <?php if ($leanguage = "pt"): ?>
          O Busca Solidária também visa conscientizar e sensibilizar os cidadãos quanto ao desaparecimento de pessoas,
          além de fornecer orientações quanto ao que deve ser feito ao se deparar com uma situação similar, servindo
          como uma plataforma auxiliar na busca por desaparecidos.
          <?php elseif ($leanguage = "en"): ?>
          Busca Solidária also aims to raise awareness and sensitize citizens regarding the disappearance of people,
          in addition to providing guidance on what should be done when faced with a similar situation, serving
          as an auxiliary platform in the search for missing persons.
          <?php elseif ($leanguage = "es"): ?>
          Busca Solidária también tiene como objetivo sensibilizar y sensibilizar a los ciudadanos sobre la desaparición
          de personas,
          además de brindar orientación sobre lo que se debe hacer ante una situación similar, sirviendo
          como plataforma auxiliar en la búsqueda de personas desaparecidas.
          <? endif ?>

        </p>
      </ul>
      <!-- <hr width="1" size="210"> -->
      <ul>
        <i class="fa-solid fa-users" style="color: #fff; font-size: 150px;"></i>
      </ul>
    </div>
  </section>

  <!-- INTEGRANTES -->
  <h1 class="tit">

    <?php if ($leanguage = "pt"): ?>
    <?php elseif ($leanguage = "en"): ?>
    <?php elseif ($leanguage = "es"): ?>
    <? endif ?>
    INTEGRANTES
  </h1>
  <section class="int">
    <div class="content-2">
      <ul class="ul1">
        <img src="./assets/images/henry.jpeg" alt="" class="henry">
        <h2>Henry</h2>
        <span class="detail">Desenvolvedor</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
      <ul class="ul2">
        <img src="./assets/images/thay.jpeg" alt="" class="thay">
        <h2>Thayssa</h2>
        <span class="detail">Desenvolvedora</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
      <ul class="ul3">
        <img src="./assets/images/soso.jpeg" alt="" class="soso">
        <h2>Sophia</h2>
        <span class="detail">Desenvolvedora</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
    </div>
    <div class="content-22">
      <ul></ul>
      <ul class="ul4">
        <img src="./assets/images/vitoria2.jpeg" alt="" class="vicky">
        <h2>Vitória</h2>
        <span class="detail">Desenvolvedora</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
      <ul class="ul5">
        <img src="./assets/images/rib.jpeg" alt="" class="rib">
        <h2>Ribeiro</h2>
        <span class="detail">Desenvolvedora</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
    </div>
  </section>

  <!-- video

<div class="video-wrapper">
    <iframe id="video-in" width="560" height="315"
      src="https://www.youtube-nocookie.com/embed/2ixfkddD7xs?si=O_poGJMyXCmqs5AA" title="YouTube video player"
      frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      allowfullscreen></iframe>
  </div> -->


  <!-- notificação -->
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

  <script src="./assets/javascript/carrossel.js" defer></script>
  <script src="./assets/javascript/politica.js"></script>
  <script src="./assets/javascript/header.js"></script>
  <script src="./assets/javascript/handle-form-user.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="./assets/javascript/carrossel.js" defer></script>
  <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <!-- AOS ANIMAÇÂO -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
  AOS.init();
  </script>


</body>

</html>
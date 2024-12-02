<?php

include './database/database-connection.php';
include './utils/get-user-id.php';
include './utils/select-language.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termos de Uso</title>
    <link rel="stylesheet" href="./assets/styles/header.css">
    <link rel="stylesheet" href="./assets/styles/tudo.css">
    <link rel="stylesheet" href="./assets/styles/footer.css">
    <link rel="stylesheet" href="./assets/styles/orient.css">
    <link rel="stylesheet" href="./assets/styles/termos.css">
    <link rel="icon" href="./assets/images/favicon.png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
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
    <!--comeco da nav-->
    <?php include './components/header.php'; ?>
    <!--fim da nav-->

    <?php include './components/select-language.php'; ?>

    <?php if ($language == "pt"): ?>
        <div class="containe">
            <div class="text-content">
                <h1>Termos e condições de uso </h1>
                <p>
                    Os Termos e Condições são essenciais para definir as regras de uso, proteger os direitos dos usuários e da plataforma, e garantir a conformidade com as leis. Eles asseguram transparência e segurança para ambas as partes.
            </div>
        </div>

        <!--FIM DA PRIMEIRA SECTION-->


        <section class="uso">
            <div class="container">
                <div class="list-uso">
                    <h2 class="number">1. Do objeto</h2>
                    <p class="description">A plataforma visa licenciar o uso de seu software, website, aplicativos e demais ativos de propriedade intelectual, fornecendo ferramentas para auxiliar e dinamizar o dia a dia dos seus usuários. A plataforma caracteriza-se pela prestação do seguinte serviço: Cadastro de pessoas desaparecidas, contando com dados e localização de usuários.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">2. Da aceitação</h2>
                    <p class="description">O presente Termo estabelece obrigações contratadas de livre e espontânea vontade, por tempo indeterminado, entre a plataforma e as pessoas físicas ou jurídicas, usuárias do site. Ao utilizar a plataforma o usuário aceita integralmente as presentes normas e compromete-se a observá-las, sob o risco de aplicação das penalidade cabíveis.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">3. Do acesso dos usuários</h2>
                    <p class="description">Serão utilizadas todas as soluções técnicas à disposição do responsável pela plataforma para permitir o acesso ao serviço 24 (vinte e quatro) horas por dia, 7 (sete) dias por semana. No entanto, a navegação na plataforma ou em alguma de suas páginas poderá ser interrompida, limitada ou suspensa para atualizações, modificações ou qualquer ação necessária ao seu bom funcionamento.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">4. Do cadastro</h2>
                    <p class="description">O acesso às funcionalidades da plataforma exigirá a realização de um cadastro prévio e, a depender dos serviços ou produtos escolhidos, o pagamento de determinado valor. Ao se cadastrar o usuário deverá informar dados completos, recentes e válidos, sendo de sua exclusiva responsabilidade manter referidos dados atualizados.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">5. Do suporte</h2>
                    <p class="description">Em caso de qualquer dúvida, sugestão ou problema com a utilização da plataforma, o usuário poderá entrar em contato com o suporte, através do email etecpj.ds.2024@gmail.com.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">6. Das responsabilidades</h2>
                    <p class="description">É de responsabilidade do usuário:
                        </br> a) defeitos ou vícios técnicos originados no próprio sistema do usuário;
                        </br> b) a correta utilização da plataforma, dos serviços ou produtos oferecidos, prezando pela boa convivência, pelo respeito e cordialidade entre os usuários;
                        </br> c) pelo cumprimento e respeito ao conjunto de regras disposto nesse Termo de Condições Geral de Uso, na respectiva Política de Privacidade e na legislação nacional e internacional;
                        </br> d) pela proteção aos dados de acesso à sua conta/perfil (login e senha). </br>


                        É de responsabilidade da plataforma www.buscasolidária.com.br:
                        </br>a) indicar as características do serviço ou produto;
                        </br>b) os defeitos e vícios encontrados no serviço ou produto oferecido desde que lhe tenha dado causa;
                        </br>c) as informações que foram por ele divulgadas, sendo que os comentários ou informações divulgadas por usuários são de inteira responsabilidade dos próprios usuários;
                        </br>d) os conteúdos ou atividades ilícitas praticadas através da sua plataforma.

                        A plataforma não se responsabiliza por links externos contidos em seu sistema que possam redirecionar o usuário à ambiente externo a sua rede.
                        Não poderão ser incluídos links externos ou páginas que sirvam para fins comerciais ou publicitários ou quaisquer informações ilícitas, violentas, polêmicas, pornográficas, xenofóbicas, discriminatórias ou ofensivas.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">7. Dos direitos autorais </h2>
                    <p class="description">O presente Termo de Uso concede aos usuários uma licença não exclusiva, não transferível e não sublicenciável, para acessar e fazer uso da plataforma e dos serviços e produtos por ela disponibilizados.
                        A estrutura do site ou aplicativo, as marcas, logotipos, nomes comerciais, layouts, gráficos e design de interface, imagens, ilustrações, fotografias, apresentações, vídeos, conteúdos escritos e de som e áudio, programas de computador, banco de dados, arquivos de transmissão e quaisquer outras informações e direitos de propriedade intelectual de Sophia Cobianchi Figueiredo, observados os termos da Lei da Propriedade Industrial (Lei nº 9.279/96), Lei de Direitos Autorais (Lei n° 9.610/98) e Lei do Software (Lei n° 9.609/98), estão devidamente reservados.
                        Este Termo de Uso não cede ou transfere ao usuário qualquer direito, de modo que o acesso não gera qualquer direito de propriedade intelectual ao usuário, exceto pela licença limitada ora concedida.
                        O uso da plataforma pelo usuário é pessoal, individual e intransferível, sendo vedado qualquer uso não autorizado, comercial ou não-comercial. Tais usos consistirão em violação dos direitos de propriedade intelectual de Sophia Cobianchi Figueiredo, puníveis nos termos da legislação aplicável.
                    </p>
                </div>


                <div class="list-uso">
                    <h2 class="number">8. Das sanções </h2>
                    <p class="description">
                        Sem prejuízo das demais medidas legais cabíveis, Sophia Cobianchi Figueiredo poderá, a qualquer momento, advertir, suspender ou cancelar a conta do usuário:
                        </br> a) que violar qualquer dispositivo do presente Termo;
                        </br> b) que descumprir os seus deveres de usuário;
                        </br> c) que tiver qualquer comportamento fraudulento, doloso ou que ofenda a terceiros.</p>
                </div>

                <div class="list-uso">
                    <h2 class="number">9. Da rescisão </h2>
                    <p class="description">
                        A não observância das obrigações pactuadas neste Termo de Uso ou da legislação aplicável poderá, sem prévio aviso, ensejar a imediata rescisão unilateral por parte de Sophia Cobianchi Figueiredo e o bloqueio de todos os serviços prestados ao usuário.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">10. Das alterações </h2>
                    <p class="description">
                        Os itens descritos no presente instrumento poderão sofrer alterações, unilateralmente e a qualquer tempo, por parte de Sophia Cobianchi Figueiredo, para adequar ou modificar os serviços, bem como para atender novas exigências legais. As alterações serão veiculadas pelo site www.buscasolidária.com.br e o usuário poderá optar por aceitar o novo conteúdo ou por cancelar o uso dos serviços, caso seja assinante de algum serviço.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">11. Da política de privacidade</h2>
                    <p class="description">
                        Além do presente Termo, o usuário deverá consentir com as disposições contidas na respectiva Política de Privacidade a ser apresentada a todos os interessados dentro da interface da plataforma.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">12. Do foro</h2>
                    <p class="description">
                        Para a solução de controvérsias decorrentes do presente instrumento será aplicado integralmente o Direito brasileiro.
                        Os eventuais litígios deverão ser apresentados no foro da comarca em que se encontra a sede da empresa. </p>
                </div>
        </section>
    <?php elseif ($language == "es"): ?>
        <div class="containe">
            <div class="text-content">
                <h1>Términos y condiciones de uso</h1>
                <p>Los términos y condiciones son esenciales para definir las reglas de uso, proteger a los usuarios y los derechos de la plataforma, y garantizar el cumplimiento de las leyes. Garantizan la transparencia y la seguridad para ambas partes.</p>
            </div>
        </div>

        <!-- FIN DE LA PRIMERA SECCIÓN -->

        <section class="uso">
            <div class="container">
                <div class="list-uso">
                    <h2 class="number">1. Del objeto</h2>
                    <p class="description">La plataforma busca licenciar el uso de su software, sitio web, aplicaciones y otros activos de propiedad intelectual, proporcionando herramientas para ayudar y dinamizar el día a día de sus usuarios. La plataforma se caracteriza por la prestación del siguiente servicio: Registro de personas desaparecidas, contando con datos y ubicación de usuarios.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">2. De la aceptación</h2>
                    <p class="description">El presente Término establece obligaciones contratadas de forma libre y espontánea, por tiempo indefinido, entre la plataforma y las personas físicas o jurídicas, usuarias del sitio. Al utilizar la plataforma, el usuario acepta íntegramente las presentes normas y se compromete a observarlas, bajo el riesgo de la aplicación de las sanciones correspondientes.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">3. Del acceso de los usuarios</h2>
                    <p class="description">Se utilizarán todas las soluciones técnicas a disposición del responsable de la plataforma para permitir el acceso al servicio 24 (veinticuatro) horas al día, 7 (siete) días a la semana. Sin embargo, la navegación en la plataforma o en alguna de sus páginas podrá ser interrumpida, limitada o suspendida para actualizaciones, modificaciones o cualquier acción necesaria para su buen funcionamiento.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">4. Del registro</h2>
                    <p class="description">El acceso a las funcionalidades de la plataforma requerirá la realización de un registro previo y, dependiendo de los servicios o productos elegidos, el pago de un valor determinado. Al registrarse, el usuario deberá proporcionar datos completos, recientes y válidos, siendo de su exclusiva responsabilidad mantener dichos datos actualizados.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">5. Del soporte</h2>
                    <p class="description">En caso de cualquier duda, sugerencia o problema con el uso de la plataforma, el usuario podrá ponerse en contacto con el soporte, a través del correo electrónico etecpj.ds.2024@gmail.com.</p>
                </div>
                <div class="list-uso">
                    <h2 class="number">6. De las responsabilidades</h2>
                    <p class="description">Es responsabilidad del usuario:
                        </br> a) defectos o fallos técnicos originados en el propio sistema del usuario;
                        </br> b) el correcto uso de la plataforma, de los servicios o productos ofrecidos, velando por la buena convivencia, el respeto y la cordialidad entre los usuarios;
                        </br> c) el cumplimiento y respeto del conjunto de reglas dispuestas en este Término de Condiciones Generales de Uso, en la respectiva Política de Privacidad y en la legislación nacional e internacional;
                        </br> d) la protección de los datos de acceso a su cuenta/perfil (login y contraseña). </br>

                        Es responsabilidad de la plataforma www.buscasolidaria.com.br:
                        </br> a) indicar las características del servicio o producto;
                        </br> b) los defectos y fallos encontrados en el servicio o producto ofrecido siempre que sea su causa;
                        </br> c) la información que haya sido divulgada por ella, siendo que los comentarios o información divulgada por usuarios son responsabilidad exclusiva de los propios usuarios;
                        </br> d) los contenidos o actividades ilícitas realizadas a través de su plataforma.

                        La plataforma no se responsabiliza por los enlaces externos contenidos en su sistema que puedan redirigir al usuario a un ambiente externo a su red.
                        No se podrán incluir enlaces externos o páginas que sirvan para fines comerciales o publicitarios o cualquier información ilícita, violenta, polémica, pornográfica, xenófoba, discriminatoria u ofensiva.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">7. De los derechos de autor</h2>
                    <p class="description">El presente Término de Uso concede a los usuarios una licencia no exclusiva, no transferible y no sublicenciable, para acceder y hacer uso de la plataforma y de los servicios y productos que ofrece.
                        La estructura del sitio o aplicación, las marcas, logotipos, nombres comerciales, layouts, gráficos y diseño de interfaz, imágenes, ilustraciones, fotografías, presentaciones, vídeos, contenidos escritos y de sonido y audio, programas de ordenador, bases de datos, archivos de transmisión y cualquier otra información y derechos de propiedad intelectual de Sophia Cobianchi Figueiredo, observados los términos de la Ley de Propiedad Industrial (Ley nº 9.279/96), Ley de Derechos de Autor (Ley nº 9.610/98) y Ley de Software (Ley nº 9.609/98), están debidamente reservados.
                        Este Término de Uso no cede ni transfiere al usuario ningún derecho, de modo que el acceso no genera ningún derecho de propiedad intelectual al usuario, excepto por la licencia limitada aquí concedida.
                        El uso de la plataforma por parte del usuario es personal, individual e intransferible, estando prohibido cualquier uso no autorizado, comercial o no comercial. Dichos usos constituirán una violación de los derechos de propiedad intelectual de Sophia Cobianchi Figueiredo, punibles según la legislación aplicable.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">8. De las sanciones</h2>
                    <p class="description">
                        Sin perjuicio de las demás medidas legales aplicables, Sophia Cobianchi Figueiredo podrá, en cualquier momento, advertir, suspender o cancelar la cuenta del usuario:
                        </br> a) que viole cualquier disposición de este Término;
                        </br> b) que incumpla sus deberes como usuario;
                        </br> c) que tenga cualquier comportamiento fraudulento, doloso o que ofenda a terceros.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">9. De la rescisión</h2>
                    <p class="description">
                        El incumplimiento de las obligaciones pactadas en este Término de Uso o de la legislación aplicable podrá, sin previo aviso, dar lugar a la inmediata rescisión unilateral por parte de Sophia Cobianchi Figueiredo y el bloqueo de todos los servicios prestados al usuario.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">10. De las modificaciones</h2>
                    <p class="description">
                        Los ítems descritos en el presente instrumento podrán ser modificados, unilateralmente y en cualquier momento, por parte de Sophia Cobianchi Figueiredo, para adecuar o modificar los servicios, así como para cumplir con nuevas exigencias legales. Las modificaciones serán publicadas en el sitio www.buscasolidaria.com.br y el usuario podrá optar por aceptar el nuevo contenido o cancelar el uso de los servicios, en caso de ser suscriptor de algún servicio.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">11. De la política de privacidad</h2>
                    <p class="description">
                        Además del presente Término, el usuario deberá consentir con las disposiciones contenidas en la respectiva Política de Privacidad que se presentará a todos los interesados dentro de la interfaz de la plataforma.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">12. Del fuero</h2>
                    <p class="description">
                        Para la resolución de controversias derivadas del presente instrumento se aplicará íntegramente el Derecho brasileño.
                        Los eventuales litigios deberán presentarse en el fuero de la comarca donde se encuentra la sede de la empresa.
                    </p>
                </div>
            </div>
        </section>

    <?php elseif ($language == "en"): ?>
        <div class="containe">
            <div class="text-content">
                <h1>Terms and conditions of use </h1>
                <p>Terms and conditions are essential for defining the rules of use, protecting users and platform rights, and ensuring compliance with laws.They ensure transparency and security to both parties.
            </div>
        </div>

        <!--FIM DA PRIMEIRA SECTION-->


        <section class="uso">
            <div class="container">
                <div class="list-uso">
                    <h2 class="number">1. Of the object</h2>
                    <p class="description">The platform aims to license the use of its software, website, applications and other intellectual property assets, providing tools to assist and streamline the daily lives of its users.The platform is characterized by the provision of the following service: Missing Persons Registration, with data and user location. </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">2. Acceptance</h2>
                    <p class="description">This term establishes contracted obligations of free and spontaneous will, indefinitely, between the platform and individuals or legal entities, users of the site.By using the platform the user fully accepts the present standards and undertakes to observe them, at the risk of applying the appropriate penalty. </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">3. Users Access</h2>
                    <p class="description">All technical solutions will be used at the disposal of the person responsible for the platform to allow access to service 24 (twenty -four) hours a day, 7 (seven) days a week.However, navigation on the platform or any of its pages may be interrupted, limited or suspended for updates, modifications or any action necessary for its proper operation. </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">4. Registration</h2>
                    <p class="description">Access to platform functionality will require a prior registration and, depending on the chosen services or products, the payment of a certain amount.When registering the user must inform complete, recent and valid data, and their exclusive responsibility keeps referred to updated data. </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">5. Support</h2>
                    <p class="description">In case of any questions, suggestion or problem with the use of the platform, the user can contact the support through EtecPJ.DS.DS.2024@gmail.com. </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">6. Responsibilities</h2>
                    <p class="description">It is the responsibility of the user:
                        </br> a) Defects or technical addictions originated in the user's own system;
                        </br> b) the correct use of the platform, the services or products offered, valuing the good coexistence, respect and cordiality among users;
                        </br> c) for compliance and respect for the set of rules provided for in this general conditions of use, the respective privacy policy and in national and international legislation;
                        </br> d) Protecting access data to your account/profile (login and password).</br>


                        It is the responsibility of the platform www.buscasolidária.com.br:
                        </br> a) Indicate the characteristics of the service or product;
                        </br> b) defects and defects found in the service or product offered provided it has caused it;
                        </br> c) The information that was released by him, and the comments or information released by users are the sole responsibility of the users themselves;
                        </br> d) The illicit content or activities practiced through your platform.

                        The platform is not responsible for external links contained in your system that can redirect the user to the external environment to your network.
                        No external links or pages that serve for commercial or advertising purposes or any illicit, violent, controversial, pornographic, xenophobic, discriminatory or offensive information.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">7. Copyright</h2>
                    <p class="description">This term of use gives users a non -exclusive, non -transferable and non -sublicensible license, to access and make use of the platform and services and products available by it.
                        The site or application structure, brands, logos, trade names, layouts, graphics and interface design, images, illustrations, photographs, presentations, videos, written and sound and audio content, computer programs, databases, filesTransmission and any other information and intellectual property rights of Sophia Cobiachi Figueiredo, observing the terms of the Industrial Property Law (Law No. 9,279/96), Copyright Law (Law No. 9.610/98) and Software Law (LawNo. 9.609/98), are properly reserved.
                        This term of use does not give in or transfer to the user, so that access does not generate any intellectual property rights to the user, except for the limited license granted.
                        The use of the platform by the user is personal, individual and non-transferable, and any unauthorized, commercial or non-commercial use is prohibited.Such uses will consist of violation of the intellectual property rights of Sophia Cobianchi Figueiredo, punishable under the applicable legislation.</p>
                </div>


                <div class="list-uso">
                    <h2 class="number">8. Sanctions </h2>
                    <p class="description">
                        Without prejudice to other appropriate legal measures, Sophia Cobianchi Figueiredo may, at any time, warn, suspend or cancel the user's account:
                        </br> a) to violate any device of this term;
                        </br> b) to breach your user duties;
                        </br> c) who has any fraudulent, willful behavior or who offends third parties. </p>
                </div>

                <div class="list-uso">
                    <h2 class="number">9.Termination </h2>
                    <p class="description">
                        Failure to comply with the obligations agreed upon in this Term of Use or applicable legislation may, without prior notice, give rise to unilateral termination by Sophia Cobianchi Figueiredo and the blockade of all services provided to the user.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">10. Das alterações </h2>
                    <p class="description">
                        The items described in this instrument may change unilaterally and at any time by Sophia Cobianchi Figueiredo, to adapt or modify services, as well as to meet new legal requirements.Changes will be conveyed through the website www.buscasolidária.com.br and the user may choose to accept the new content or to cancel the use of services, if you are subscribing to any service. </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">11. Privacy Policy</h2>
                    <p class="description">
                        In addition to this term, the user must consent to the provisions contained in the respective privacy policy to be presented to all interested parties within the platform interface.
                    </p>
                </div>
                <div class="list-uso">
                    <h2 class="number">12. Forum</h2>
                    <p class="description">
                        For the solution of disputes arising from this instrument will be applied fully Brazilian law.
                        Any disputes should be presented at the district forum where the company's headquarters is located. </p>
                </div>
        </section>
    <?php endif; ?>





    <!--rodapé-->
    <?php include './components/footer.php'; ?>

    <!-- notificação -->

    <?php
    include './components/sonner.php'; ?>

    <!-- vlibras -->
    <?php include './components/libras.php' ?>

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
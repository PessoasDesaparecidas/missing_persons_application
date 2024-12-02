<?php
include './utils/protect-page-route.php';
include './database/missings-repository.php';
include './utils/get-missing-id.php';
include './utils/sonner.php';
include './utils/select-language.php';

$missing = get_missing_by_id($connection, get_missing_id());

if ($missing["user_id"] != get_user_id()) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previousPage = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

        if ($previousPage) {
            sonner('error', 'Você não tem permissão para acessar essa página');
            header("Location: $previousPage");
            exit;
        }
    }

    sonner('error', 'Você não tem permissão para acessar essa página');
    header("Location:./index.php");
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/missing-cadastre.css">
    <link rel="icon" href="./assets/images/favicon.png">
    <title>Atualizar desaparecido</title>
    <style>
        .input-group2 {
            grid-template-columns: 1fr 1fr;
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
    <?php include "./components/select-language.php"; ?>

    <div class="container">
        <div class="form-image">
            <style>
                svg#freepik_stories-emails:not(.animated) .animable {
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el9mcbvsgzyl9 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0s;
                }

                svg#freepik_stories-emails.animated #elv6wvaazsg6a {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.02978723404255319s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #ele21tpcp1o38 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.05957446808510638s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #eljz52mjrq1dp {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.08936170212765956s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elu3ubqa3hcea {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.11914893617021276s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el4nmewvmklhc {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.14893617021276595s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elnhca4fmmcvn {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.17872340425531913s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #eljerstql2ms {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.20851063829787234s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #ely41ung8r8w {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.23829787234042552s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elg9z357a6a4f {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.2680851063829787s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elfv1ywyynw7 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.2978723404255319s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el6400t8wvb6 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.3276595744680851s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el72z4sdlbjks {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.35744680851063826s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elqqppk20g89r {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.38723404255319144s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elhqoek9mdv7s {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.41702127659574467s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el39e3yoe560j {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.44680851063829785s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elwb4evnn6f {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.47659574468085103s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el0t7m3bqy6xbg {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.5063829787234042s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elfoydq10w9i {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.5361702127659574s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #eljztacm2tyqp {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.5659574468085106s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elo09frwljl59 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.5957446808510638s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el60w2na9noih {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.6255319148936169s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elkoqif185oyl {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.6553191489361702s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el5tadmvrntju {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.6851063829787234s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el58ficxm7xu {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.7148936170212765s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elj2j312r32t7 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.7446808510638298s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elh3x6ojagb0l {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.7744680851063829s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elkubp95hy7gp {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.8042553191489361s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el7qry9kz77pb {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.8340425531914893s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elnprzllaha4q {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.8638297872340425s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elc3mdinahjqd {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.8936170212765957s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elttqm5cktddp {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.9234042553191488s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #ellky8wvjssg {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.9531914893617021s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #eldwb2cmkrfpt {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0.9829787234042553s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #eldx83rvgu6x7 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.0127659574468084s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elbzp9hvvjc3o {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.0425531914893615s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #ele4s2rfwoc75 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.0723404255319149s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el2lyr6h1jcq2 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.102127659574468s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el25zvwl4ntpu {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.1319148936170211s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elabj5qtsj5bv {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.1617021276595745s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el8v5x85e7zei {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.1914893617021276s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #eltifqm9cnsii {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.2212765957446807s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elyz5oo0bbx6t {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.2510638297872338s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elio26i7dcchq {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.2808510638297872s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #ellha1wi8qek {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.3106382978723403s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #el6s7wm81lix7 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.3404255319148934s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #elq69ncrel6mi {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 1.3702127659574468s;
                    opacity: 0;
                }

                svg#freepik_stories-emails.animated #freepik--background-complete--inject-128 {
                    animation: 1.4s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) slideUp;
                    animation-delay: 0s;
                }

                svg#freepik_stories-emails.animated #freepik--Email--inject-128 {
                    animation: 3s Infinite linear floating;
                    animation-delay: 0s;
                }

                svg#freepik_stories-emails.animated #freepik--Character--inject-128 {
                    animation: 1s 1 forwards cubic-bezier(0.36, -0.01, 0.5, 1.38) fadeIn;
                    animation-delay: 0s;
                }

                @keyframes slideUp {
                    0% {
                        opacity: 0;
                        transform: translateY(30px);
                    }

                    100% {
                        opacity: 1;
                        transform: inherit;
                    }
                }

                @keyframes floating {
                    0% {
                        opacity: 1;
                        transform: translateY(0px);
                    }

                    50% {
                        transform: translateY(-10px);
                    }

                    100% {
                        opacity: 1;
                        transform: translateY(0px);
                    }
                }

                @keyframes fadeIn {
                    0% {
                        opacity: 0;
                    }

                    100% {
                        opacity: 1;
                    }
                }
            </style>
            <svg
                class="animated"
                id="freepik_stories-emails"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 500 500"
                version="1.1"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                xmlns:svgjs="http://svgjs.com/svgjs">
                <g
                    id="freepik--background-complete--inject-128"
                    class="animable"
                    style="transform-origin: 250px 226.87px">
                    <rect
                        y="382.4"
                        width="500"
                        height="0.25"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 250px 382.525px;
              "
                        id="el9mcbvsgzyl9"
                        class="animable"></rect>
                    <rect
                        x="102.02"
                        y="398.49"
                        width="33.12"
                        height="0.25"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 118.58px 398.615px;
              "
                        id="elv6wvaazsg6a"
                        class="animable"></rect>
                    <rect
                        x="171.14"
                        y="390.92"
                        width="43.55"
                        height="0.25"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 192.915px 391.045px;
              "
                        id="ele21tpcp1o38"
                        class="animable"></rect>
                    <rect
                        x="52.46"
                        y="389.21"
                        width="48.56"
                        height="0.25"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 76.74px 389.335px;
              "
                        id="eljz52mjrq1dp"
                        class="animable"></rect>
                    <rect
                        x="247.61"
                        y="392.59"
                        width="34.29"
                        height="0.25"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 264.755px 392.715px;
              "
                        id="elu3ubqa3hcea"
                        class="animable"></rect>
                    <rect
                        x="442.46"
                        y="392.59"
                        width="7.44"
                        height="0.25"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 446.18px 392.715px;
              "
                        id="el4nmewvmklhc"
                        class="animable"></rect>
                    <rect
                        x="290.8"
                        y="392.59"
                        width="48.57"
                        height="0.25"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 315.085px 392.715px;
              "
                        id="elnhca4fmmcvn"
                        class="animable"></rect>
                    <rect
                        x="326.62"
                        y="396.81"
                        width="93.68"
                        height="0.25"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 373.46px 396.935px;
              "
                        id="eljerstql2ms"
                        class="animable"></rect>
                    <path
                        d="M237,337.8H43.91a5.71,5.71,0,0,1-5.7-5.71V60.66A5.71,5.71,0,0,1,43.91,55H237a5.71,5.71,0,0,1,5.71,5.71V332.09A5.71,5.71,0,0,1,237,337.8ZM43.91,55.2a5.46,5.46,0,0,0-5.45,5.46V332.09a5.46,5.46,0,0,0,5.45,5.46H237a5.47,5.47,0,0,0,5.46-5.46V60.66A5.47,5.47,0,0,0,237,55.2Z"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 140.46px 196.4px;
              "
                        id="ely41ung8r8w"
                        class="animable"></path>
                    <path
                        d="M453.31,337.8H260.21a5.72,5.72,0,0,1-5.71-5.71V60.66A5.72,5.72,0,0,1,260.21,55h193.1A5.71,5.71,0,0,1,459,60.66V332.09A5.71,5.71,0,0,1,453.31,337.8ZM260.21,55.2a5.47,5.47,0,0,0-5.46,5.46V332.09a5.47,5.47,0,0,0,5.46,5.46h193.1a5.47,5.47,0,0,0,5.46-5.46V60.66a5.47,5.47,0,0,0-5.46-5.46Z"
                        style="
                fill: rgb(235, 235, 235);
                transform-origin: 356.75px 196.4px;
              "
                        id="elg9z357a6a4f"
                        class="animable"></path>
                    <g id="elfv1ywyynw7">
                        <rect
                            x="201.66"
                            y="275.65"
                            width="8.86"
                            height="100.27"
                            style="
                  fill: rgb(240, 240, 240);
                  transform-origin: 206.09px 325.785px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="el6400t8wvb6">
                        <rect
                            x="71.48"
                            y="375.92"
                            width="135.64"
                            height="6.35"
                            style="
                  fill: rgb(240, 240, 240);
                  transform-origin: 139.3px 379.095px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <rect
                        x="68.08"
                        y="275.65"
                        width="133.58"
                        height="100.27"
                        style="
                fill: rgb(245, 245, 245);
                transform-origin: 134.87px 325.785px;
              "
                        id="el72z4sdlbjks"
                        class="animable"></rect>
                    <rect
                        x="75.04"
                        y="287.99"
                        width="119.65"
                        height="32.88"
                        rx="6.24"
                        style="
                fill: rgb(240, 240, 240);
                transform-origin: 134.865px 304.43px;
              "
                        id="elqqppk20g89r"
                        class="animable"></rect>
                    <path
                        d="M81.28,330.69H188.46a6.24,6.24,0,0,1,6.24,6.24v20.41a6.23,6.23,0,0,1-6.23,6.23H81.28A6.24,6.24,0,0,1,75,357.34V336.93A6.24,6.24,0,0,1,81.28,330.69Z"
                        style="
                fill: rgb(240, 240, 240);
                transform-origin: 134.85px 347.13px;
              "
                        id="elhqoek9mdv7s"
                        class="animable"></path>
                    <g id="el39e3yoe560j">
                        <rect
                            x="97.56"
                            y="302.18"
                            width="74.62"
                            height="4.51"
                            rx="1.97"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 134.87px 304.435px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="elwb4evnn6f">
                        <rect
                            x="97.56"
                            y="344.88"
                            width="74.62"
                            height="4.51"
                            rx="1.97"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 134.87px 347.135px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="el0t7m3bqy6xbg">
                        <rect
                            x="386.46"
                            y="169.7"
                            width="35.77"
                            height="205.74"
                            style="
                  fill: rgb(240, 240, 240);
                  transform-origin: 404.345px 272.57px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="elfoydq10w9i">
                        <rect
                            x="278.01"
                            y="375.45"
                            width="137.35"
                            height="6.95"
                            style="
                  fill: rgb(240, 240, 240);
                  transform-origin: 346.685px 378.925px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <rect
                        x="271.14"
                        y="169.7"
                        width="115.32"
                        height="205.74"
                        style="
                fill: rgb(245, 245, 245);
                transform-origin: 328.8px 272.57px;
              "
                        id="eljztacm2tyqp"
                        class="animable"></rect>
                    <rect
                        x="285.2"
                        y="283.79"
                        width="87.2"
                        height="35.98"
                        rx="5.95"
                        style="
                fill: rgb(240, 240, 240);
                transform-origin: 328.8px 301.78px;
              "
                        id="elo09frwljl59"
                        class="animable"></rect>
                    <rect
                        x="285.2"
                        y="326.34"
                        width="87.2"
                        height="35.98"
                        rx="5.95"
                        style="
                fill: rgb(240, 240, 240);
                transform-origin: 328.8px 344.33px;
              "
                        id="el60w2na9noih"
                        class="animable"></rect>
                    <rect
                        x="285.2"
                        y="182.83"
                        width="87.2"
                        height="94.4"
                        rx="5.95"
                        style="
                fill: rgb(240, 240, 240);
                transform-origin: 328.8px 230.03px;
              "
                        id="elkoqif185oyl"
                        class="animable"></rect>
                    <g id="el5tadmvrntju">
                        <rect
                            x="266.38"
                            y="163.76"
                            width="120.09"
                            height="5.95"
                            style="
                  fill: rgb(240, 240, 240);
                  transform-origin: 326.425px 166.735px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <rect
                        x="386.46"
                        y="163.76"
                        width="40.77"
                        height="5.95"
                        style="
                fill: rgb(230, 230, 230);
                transform-origin: 406.845px 166.735px;
              "
                        id="el58ficxm7xu"
                        class="animable"></rect>
                    <rect
                        x="337.3"
                        y="133.54"
                        width="29.69"
                        height="30.21"
                        style="
                fill: rgb(240, 240, 240);
                transform-origin: 352.145px 148.645px;
              "
                        id="elj2j312r32t7"
                        class="animable"></rect>
                    <g id="elh3x6ojagb0l">
                        <rect
                            x="284.62"
                            y="133.54"
                            width="52.67"
                            height="30.21"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 310.955px 148.645px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="elkubp95hy7gp">
                        <rect
                            x="284.31"
                            y="138.1"
                            width="82.68"
                            height="2.44"
                            style="
                  fill: rgb(230, 230, 230);
                  opacity: 0.7;
                  mix-blend-mode: multiply;
                  transform-origin: 325.65px 139.32px;
                "
                            class="animable"></rect>
                    </g>
                    <rect
                        x="337.3"
                        y="132.07"
                        width="31.33"
                        height="7.06"
                        style="
                fill: rgb(240, 240, 240);
                transform-origin: 352.965px 135.6px;
              "
                        id="el7qry9kz77pb"
                        class="animable"></rect>
                    <g id="elnprzllaha4q">
                        <rect
                            x="282.99"
                            y="132.07"
                            width="54.31"
                            height="7.06"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 310.145px 135.6px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <rect
                        x="385.53"
                        y="144.37"
                        width="19.05"
                        height="19.39"
                        style="
                fill: rgb(240, 240, 240);
                transform-origin: 395.055px 154.065px;
              "
                        id="elc3mdinahjqd"
                        class="animable"></rect>
                    <g id="elttqm5cktddp">
                        <rect
                            x="351.72"
                            y="144.37"
                            width="33.8"
                            height="19.39"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 368.62px 154.065px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="ellky8wvjssg">
                        <rect
                            x="351.53"
                            y="147.29"
                            width="53.06"
                            height="1.57"
                            style="
                  fill: rgb(230, 230, 230);
                  opacity: 0.7;
                  mix-blend-mode: multiply;
                  transform-origin: 378.06px 148.075px;
                "
                            class="animable"></rect>
                    </g>
                    <rect
                        x="385.53"
                        y="143.42"
                        width="20.11"
                        height="4.53"
                        style="
                fill: rgb(240, 240, 240);
                transform-origin: 395.585px 145.685px;
              "
                        id="eldwb2cmkrfpt"
                        class="animable"></rect>
                    <g id="eldx83rvgu6x7">
                        <rect
                            x="350.67"
                            y="143.42"
                            width="34.86"
                            height="4.53"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 368.1px 145.685px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="elbzp9hvvjc3o">
                        <rect
                            x="128.06"
                            y="76.24"
                            width="38.26"
                            height="111.66"
                            style="
                  fill: rgb(240, 240, 240);
                  transform-origin: 147.19px 132.07px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="ele4s2rfwoc75">
                        <rect
                            x="119.85"
                            y="76.24"
                            width="44"
                            height="111.66"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 141.85px 132.07px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="el2lyr6h1jcq2">
                        <rect
                            x="90.41"
                            y="113.75"
                            width="102.88"
                            height="36.63"
                            style="
                  fill: rgb(255, 255, 255);
                  transform-origin: 141.85px 132.065px;
                  transform: rotate(-90deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="el25zvwl4ntpu">
                        <rect
                            x="101.78"
                            y="122.63"
                            width="80.14"
                            height="18.87"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 141.85px 132.065px;
                  transform: rotate(-90deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="elabj5qtsj5bv">
                        <rect
                            x="73.08"
                            y="100.29"
                            width="38.26"
                            height="111.66"
                            style="
                  fill: rgb(240, 240, 240);
                  transform-origin: 92.21px 156.12px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="el8v5x85e7zei">
                        <rect
                            x="64.86"
                            y="100.29"
                            width="44"
                            height="111.66"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 86.86px 156.12px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="eltifqm9cnsii">
                        <rect
                            x="35.42"
                            y="137.8"
                            width="102.88"
                            height="36.63"
                            style="
                  fill: rgb(255, 255, 255);
                  transform-origin: 86.86px 156.115px;
                  transform: rotate(-90deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="elyz5oo0bbx6t">
                        <rect
                            x="46.79"
                            y="146.68"
                            width="80.15"
                            height="18.87"
                            rx="7.54"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 86.865px 156.115px;
                  transform: rotate(-90deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="elio26i7dcchq">
                        <rect
                            x="181.35"
                            y="116.31"
                            width="38.26"
                            height="111.66"
                            style="
                  fill: rgb(240, 240, 240);
                  transform-origin: 200.48px 172.14px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="ellha1wi8qek">
                        <rect
                            x="173.13"
                            y="116.31"
                            width="44"
                            height="111.66"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 195.13px 172.14px;
                  transform: rotate(180deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="el6s7wm81lix7">
                        <rect
                            x="143.69"
                            y="153.82"
                            width="102.88"
                            height="36.63"
                            style="
                  fill: rgb(255, 255, 255);
                  transform-origin: 195.13px 172.135px;
                  transform: rotate(-90deg);
                "
                            class="animable"></rect>
                    </g>
                    <g id="elq69ncrel6mi">
                        <rect
                            x="155.06"
                            y="162.7"
                            width="80.15"
                            height="18.87"
                            rx="7.54"
                            style="
                  fill: rgb(245, 245, 245);
                  transform-origin: 195.135px 172.135px;
                  transform: rotate(-90deg);
                "
                            class="animable"></rect>
                    </g>
                </g>
                <g
                    id="freepik--Shadow--inject-128"
                    class="animable"
                    style="transform-origin: 250px 416.24px">
                    <ellipse
                        id="frepik--path--inject-128"
                        cx="250"
                        cy="416.24"
                        rx="193.89"
                        ry="11.32"
                        style="fill: rgb(245, 245, 245); transform-origin: 250px 416.24px"
                        class="animable"></ellipse>
                </g>
                <g
                    id="freepik--Email--inject-128"
                    class="animable animator-active"
                    style="transform-origin: 269.905px 197.42px">
                    <path
                        d="M382.12,300.38H147.72a10.2,10.2,0,0,1-10.25-10.77l8.87-181.35a11.47,11.47,0,0,1,11.3-10.77H392a10.19,10.19,0,0,1,10.25,10.77l-8.87,181.35A11.47,11.47,0,0,1,382.12,300.38Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 269.86px 198.935px;
              "
                        id="elapwnuh01a8o"
                        class="animable"></path>
                    <g id="eliuzez6ot88m">
                        <path
                            d="M382.12,300.38H147.72a10.2,10.2,0,0,1-10.25-10.77l8.87-181.35a11.47,11.47,0,0,1,11.3-10.77H392a10.19,10.19,0,0,1,10.25,10.77l-8.87,181.35A11.47,11.47,0,0,1,382.12,300.38Z"
                            style="
                  fill: rgb(255, 255, 255);
                  opacity: 0.8;
                  transform-origin: 269.86px 198.935px;
                "
                            class="animable"></path>
                    </g>
                    <rect
                        x="215"
                        y="94.34"
                        width="4.79"
                        height="0.9"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 217.395px 94.79px;
              "
                        id="eltjza2gurz6"
                        class="animable"></rect>
                    <rect
                        x="190.01"
                        y="94.34"
                        width="19.6"
                        height="0.9"
                        style="fill: rgb(197, 63, 63); transform-origin: 199.81px 94.79px"
                        id="el86kenuygk2y"
                        class="animable"></rect>
                    <path
                        d="M392,97.49H157.64a11.47,11.47,0,0,0-11.3,10.77h256A10.19,10.19,0,0,0,392,97.49Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 274.348px 102.874px;
              "
                        id="elnveegl8xj5c"
                        class="animable"></path>
                    <path
                        d="M389.5,127.11H157.29a2.72,2.72,0,0,1-2.75-2.89l.29-5.89a3.07,3.07,0,0,1,3-2.89H390.07a2.73,2.73,0,0,1,2.75,2.89l-.29,5.89A3.07,3.07,0,0,1,389.5,127.11Z"
                        style="
                fill: rgb(255, 255, 255);
                transform-origin: 273.68px 121.275px;
              "
                        id="elzniv8zupr7l"
                        class="animable"></path>
                    <g id="elp34ahtal2co">
                        <path
                            d="M225.24,124.32h-62.9a1.43,1.43,0,0,1-1.44-1.51l.15-3.07a1.6,1.6,0,0,1,1.58-1.5h62.91a1.42,1.42,0,0,1,1.43,1.5l-.15,3.07A1.6,1.6,0,0,1,225.24,124.32Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.3;
                  transform-origin: 193.935px 121.28px;
                "
                            class="animable"></path>
                    </g>
                    <path
                        d="M388.61,145.15H156.41a2.73,2.73,0,0,1-2.75-2.9l.29-5.88a3.06,3.06,0,0,1,3-2.89h232.2a2.74,2.74,0,0,1,2.76,2.89l-.29,5.88A3.08,3.08,0,0,1,388.61,145.15Z"
                        style="
                fill: rgb(255, 255, 255);
                transform-origin: 272.784px 139.315px;
              "
                        id="eldtpuyqbv3x7"
                        class="animable"></path>
                    <g id="el12hy8r0ectkg">
                        <path
                            d="M234.59,142.35H161.45a1.42,1.42,0,0,1-1.43-1.5l.15-3.07a1.6,1.6,0,0,1,1.58-1.51h73.14a1.41,1.41,0,0,1,1.43,1.51l-.15,3.07A1.59,1.59,0,0,1,234.59,142.35Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.3;
                  transform-origin: 198.171px 139.31px;
                "
                            class="animable"></path>
                    </g>
                    <path
                        d="M385,282.9H152.78A2.74,2.74,0,0,1,150,280l6.06-123.74a3.06,3.06,0,0,1,3-2.89h232.2a2.74,2.74,0,0,1,2.76,2.89L388,280A3.06,3.06,0,0,1,385,282.9Z"
                        style="
                fill: rgb(255, 255, 255);
                transform-origin: 272.01px 218.135px;
              "
                        id="el404jyvp1iib"
                        class="animable"></path>
                    <g id="el5hnuz62bt4p">
                        <path
                            d="M201.6,162.74h-41a1.42,1.42,0,0,1-1.43-1.51l.15-3.07a1.6,1.6,0,0,1,1.58-1.51h41a1.43,1.43,0,0,1,1.44,1.51l-.15,3.07A1.6,1.6,0,0,1,201.6,162.74Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.3;
                  transform-origin: 181.255px 159.695px;
                "
                            class="animable"></path>
                    </g>
                    <g id="el4uewd5c3ztt">
                        <path
                            d="M279.4,175.18H159.88a1.41,1.41,0,0,1-1.43-1.5l.15-3.07a1.6,1.6,0,0,1,1.58-1.51H279.7a1.43,1.43,0,0,1,1.44,1.51l-.15,3.07A1.6,1.6,0,0,1,279.4,175.18Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.3;
                  transform-origin: 219.795px 172.14px;
                "
                            class="animable"></path>
                    </g>
                    <g id="elk9w6mfztq">
                        <path
                            d="M257.16,184.45H159.43a1.42,1.42,0,0,1-1.43-1.51l.15-3.07a1.6,1.6,0,0,1,1.58-1.5h97.73a1.42,1.42,0,0,1,1.43,1.5l-.15,3.07A1.6,1.6,0,0,1,257.16,184.45Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.3;
                  transform-origin: 208.445px 181.41px;
                "
                            class="animable"></path>
                    </g>
                    <path
                        d="M363.45,293.65h17.2a3.83,3.83,0,0,0,3.77-3.59h0a3.39,3.39,0,0,0-3.41-3.59H363.8a3.82,3.82,0,0,0-3.77,3.59h0A3.4,3.4,0,0,0,363.45,293.65Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 372.225px 290.06px;
              "
                        id="elzteq84xj3"
                        class="animable"></path>
                    <g id="elnwgiwvi1dv">
                        <path
                            d="M344.09,290.06a2.54,2.54,0,0,0,2.56,2.69,2.85,2.85,0,0,0,2.83-2.69,2.54,2.54,0,0,0-2.56-2.69A2.86,2.86,0,0,0,344.09,290.06Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.4;
                  transform-origin: 346.785px 290.06px;
                "
                            class="animable"></path>
                    </g>
                    <g id="elqn5i7cg5h3">
                        <path
                            d="M331.37,290.06a2.54,2.54,0,0,0,2.56,2.69,2.86,2.86,0,0,0,2.83-2.69,2.54,2.54,0,0,0-2.57-2.69A2.85,2.85,0,0,0,331.37,290.06Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.4;
                  transform-origin: 334.065px 290.06px;
                "
                            class="animable"></path>
                    </g>
                    <g id="el6yw863rvqvh">
                        <path
                            d="M318.64,290.06a2.54,2.54,0,0,0,2.57,2.69,2.85,2.85,0,0,0,2.82-2.69,2.54,2.54,0,0,0-2.56-2.69A2.86,2.86,0,0,0,318.64,290.06Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.4;
                  transform-origin: 321.335px 290.06px;
                "
                            class="animable"></path>
                    </g>
                    <g id="eltuud75bwfoe">
                        <path
                            d="M267,271.85l0-.6.1-2.22c.06-1.48,0-2.95,0-4.43-.06-2.94-.23-5.87-.56-8.75s-.77-5.76-1.36-8.59c-.16-.72-.31-1.44-.49-2.15l2.44-2s-3.95-13.74-8-14.74l-.09,0a4.5,4.5,0,0,0-.81-.11A116.63,116.63,0,0,0,242,227.12c-3.11-3-2.63-9.05-1.51-14.44.2-.33.39-.66.56-1A23.29,23.29,0,0,0,250.64,199c2.47.57,6.19.54,10.77-2.24a13,13,0,0,1-4.92.23,10.54,10.54,0,0,0,6.65-10,7.73,7.73,0,0,0-9.09-7.66,9.94,9.94,0,0,0-6.3,4h-.4a8.87,8.87,0,0,0-5.35-1.71c-4.81-6.14-25.69-4.45-29.09,3.77-1.81,4.38-.62,7,1.4,8.48a18.3,18.3,0,0,0-.58,4.63,6.6,6.6,0,0,0-.74.69.46.46,0,0,0,0,.67.45.45,0,0,0,.45.06.54.54,0,0,0,.22-.15l.1-.09a16.68,16.68,0,0,0,1,4.68,32.68,32.68,0,0,0,1.75,10.12c2,5.64,7.53,7.88,13,6.63,0,.4.06.8.06,1.2h0c0,2.68-1.34,4.51-6.32,6-2.72.4-5.57.94-8.14,1.47a13.14,13.14,0,0,0-7.85,5.16c-3.81,4.1-8.56,17.12-8.56,17.12l3.13,1.7c-.34,1.32-.68,2.64-1,4a1.09,1.09,0,0,0-.05.17H178.36a5.31,5.31,0,0,0-5.34,5.64l.55,10.23a1.5,1.5,0,0,0-.25.19l-1.88,1.76.43,8.93a14.31,14.31,0,0,0,2.35,1.24l.26,5a5.75,5.75,0,0,0,.43,1.85c-11,1-17.08,3.79-18.58,7.73H247a54.85,54.85,0,0,0,.68-9l.86-.05c.47,0,.83-.34.71-.61l-.8-3.58a.67.67,0,0,0-.65-.27h-.05c0-1.08.08-2.15.12-3.2a36.89,36.89,0,0,0,7.7-.69,19.1,19.1,0,0,0,5.58-2,13,13,0,0,0,3-2.42,10.81,10.81,0,0,0,2.22-3.75,10.12,10.12,0,0,0,.47-2C267,272.46,267,272.16,267,271.85Zm-9.3,1.26a1.25,1.25,0,0,1-.45.45,9.26,9.26,0,0,1-2.69,1.19,32.08,32.08,0,0,1-6.14,1.12,141.69,141.69,0,0,1,3-18.52c.13-.59.27-1.2.41-1.81.06-.25.11-.5.17-.76s.16-.66.24-1c.39.61.64,1,.64,1l2.59-2.1c.38,1.88.75,3.78,1,5.71.36,2.61.66,5.25.88,7.9.07,1.33.19,2.66.23,4l.09,2.74S257.72,273,257.69,273.11Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.1;
                  transform-origin: 211.73px 239.213px;
                "
                            class="animable"></path>
                    </g>
                </g>
                <g
                    id="freepik--Character--inject-128"
                    class="animable"
                    style="transform-origin: 195.791px 296.896px">
                    <path
                        d="M264.06,331.85H165.78a1.4,1.4,0,0,1-1.35-1.78l0-.11c1.94-7,9.17-12.6,16.12-12.6h86.75a1.4,1.4,0,0,1,1.34,1.78l-3.28,11.69A1.38,1.38,0,0,1,264.06,331.85Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 216.535px 324.605px;
              "
                        id="el3gq1pk4t56q"
                        class="animable"></path>
                    <polygon
                        points="265.97 416.24 269.88 416.24 255.22 331.85 251.31 331.85 265.97 416.24"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 260.595px 374.045px;
              "
                        id="elim2giiy5ntp"
                        class="animable"></polygon>
                    <g id="elswrx70kf1ql">
                        <polygon
                            points="265.97 416.24 269.88 416.24 255.22 331.85 251.31 331.85 265.97 416.24"
                            style="
                  fill: rgb(255, 255, 255);
                  opacity: 0.6;
                  transform-origin: 260.595px 374.045px;
                "
                            class="animable"></polygon>
                    </g>
                    <polygon
                        points="243.98 416.24 247.89 416.24 240.56 331.85 236.65 331.85 243.98 416.24"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 242.27px 374.045px;
              "
                        id="elpic5ra3kebe"
                        class="animable"></polygon>
                    <g id="els45l1mkqbh">
                        <polygon
                            points="243.98 416.24 247.89 416.24 240.56 331.85 236.65 331.85 243.98 416.24"
                            style="
                  fill: rgb(255, 255, 255);
                  opacity: 0.6;
                  transform-origin: 242.27px 374.045px;
                "
                            class="animable"></polygon>
                    </g>
                    <polygon
                        points="165.84 416.24 161.93 416.24 176.59 331.85 180.5 331.85 165.84 416.24"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 171.215px 374.045px;
              "
                        id="elktiodffftef"
                        class="animable"></polygon>
                    <g id="elb3dq0c9uxlp">
                        <polygon
                            points="165.84 416.24 161.93 416.24 176.59 331.85 180.5 331.85 165.84 416.24"
                            style="
                  fill: rgb(255, 255, 255);
                  opacity: 0.6;
                  transform-origin: 171.215px 374.045px;
                "
                            class="animable"></polygon>
                    </g>
                    <polygon
                        points="187.83 416.24 183.92 416.24 191.26 331.85 195.16 331.85 187.83 416.24"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 189.54px 374.045px;
              "
                        id="elpj5hmz9mqbb"
                        class="animable"></polygon>
                    <g id="elypww8tjv5ph">
                        <polygon
                            points="187.83 416.24 183.92 416.24 191.26 331.85 195.16 331.85 187.83 416.24"
                            style="
                  fill: rgb(255, 255, 255);
                  opacity: 0.6;
                  transform-origin: 189.54px 374.045px;
                "
                            class="animable"></polygon>
                    </g>
                    <g id="elm93vz3wgzkn">
                        <ellipse
                            cx="234.38"
                            cy="188.39"
                            rx="8.68"
                            ry="9.2"
                            style="
                  fill: rgb(38, 50, 56);
                  transform-origin: 234.38px 188.39px;
                  transform: rotate(-9.42deg);
                "
                            class="animable"></ellipse>
                    </g>
                    <path
                        d="M228.45,197.57s6.13,4.4,14-.8c-4.11,1.09-8.66-.65-8.66-.65Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 235.45px 197.714px;
              "
                        id="elprglo5xsn4p"
                        class="animable"></path>
                    <path
                        d="M234,190.12c.73,4.38-1.84,8.46-5.73,9.1s-7.63-2.38-8.36-6.76,1.84-8.46,5.73-9.11S233.25,185.74,234,190.12Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 226.955px 191.284px;
              "
                        id="elup2w483j6ob"
                        class="animable"></path>
                    <path
                        d="M220.11,213.56c7.78-2.05,17.22-15,8.84-27.82-3.17,0-11.85,2.93-11.85,2.93Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 224.663px 199.65px;
              "
                        id="elo422f2wqnhh"
                        class="animable"></path>
                    <path
                        d="M199.87,183.82c-6,5.33-8.88,19.77,4.64,28.81,2.83-1.43,9.27-7.95,9.27-7.95Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 204.317px 198.225px;
              "
                        id="elifkiy5cfw7k"
                        class="animable"></path>
                    <path
                        d="M201.6,243.41c0,1.46-.11,2.72-.22,4.05s-.23,2.63-.38,3.93c-.27,2.62-.63,5.21-1.06,7.8a155.34,155.34,0,0,1-3.35,15.34l-1.09,3.78-1.2,3.75a11.33,11.33,0,0,1-8.42,7.82,19.46,19.46,0,0,1-9.31-.44,30.05,30.05,0,0,1-4-1.36,31.55,31.55,0,0,1-3.75-1.83l2-4.68c1.07.21,2.31.47,3.46.63s2.33.29,3.46.34a13.92,13.92,0,0,0,5.82-.68,2.9,2.9,0,0,0,1.33-1,2.72,2.72,0,0,0,.3-.59c0-.11.08-.24.12-.37a1.42,1.42,0,0,0,0-.22l.08-.3.91-3.58.83-3.61c1.06-4.82,1.92-9.69,2.62-14.58.36-2.44.66-4.89.94-7.34.13-1.22.25-2.45.35-3.66s.21-2.48.27-3.56Z"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 185.21px 266.649px;
              "
                        id="elvlo1pv80wz"
                        class="animable"></path>
                    <path
                        d="M194.37,233.88C190.72,236.1,187,252,187,252l15.73,8s6.7-17.14,3.58-21.72C203,233.45,199.68,230.63,194.37,233.88Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 197.069px 246.242px;
              "
                        id="eledkzyxvt2gt"
                        class="animable"></path>
                    <g id="elcv84hdpkzsp">
                        <path
                            d="M191.32,245.81a16.08,16.08,0,0,0,.06,8.38L202.71,260s3.91-10,4.36-16.78C203.06,239.23,193.85,238.73,191.32,245.81Z"
                            style="opacity: 0.2; transform-origin: 198.932px 250.163px"
                            class="animable"></path>
                    </g>
                    <path
                        d="M172.78,282.23l-10.13-6.62,1.59,8.93s3.69,2.31,6,1.8Z"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 167.715px 281.012px;
              "
                        id="el9jewod9kfv8"
                        class="animable"></path>
                    <path
                        d="M191.8,241.25c.58,8.84,2.5,24.66,8.24,50.69l40.67-2.4c-1.66-16.51-2.28-26.72,3.63-61.16a120.66,120.66,0,0,0-17.4-1.26,131.26,131.26,0,0,0-18.48,1.09c-2.66.4-5.43.94-7.94,1.47A11.06,11.06,0,0,0,191.8,241.25Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 218.057px 259.526px;
              "
                        id="elxg155qc2bk"
                        class="animable"></path>
                    <g id="el29okqvdaj9g">
                        <path
                            d="M211.34,236s4,5.06,9.44,6.7,7-9.47,6.16-15.57C221.9,225.87,211.34,236,211.34,236Z"
                            style="opacity: 0.2; transform-origin: 219.247px 234.942px"
                            class="animable"></path>
                    </g>
                    <path
                        d="M211.34,236s4.51,4.53,10,6.16,6.46-8.93,5.64-15C221.9,225.87,211.34,236,211.34,236Z"
                        style="
                fill: rgb(255, 255, 255);
                transform-origin: 219.288px 234.688px;
              "
                        id="elfjdi6413rmg"
                        class="animable"></path>
                    <g id="elr33evf5651">
                        <path
                            d="M211.34,236a14.21,14.21,0,0,1-7.46,6.16c-5.33,2,.35-11.72,4.58-13.94C213.5,227,211.34,236,211.34,236Z"
                            style="opacity: 0.2; transform-origin: 206.758px 235.232px"
                            class="animable"></path>
                    </g>
                    <path
                        d="M211.34,236a14,14,0,0,1-7.74,5.51c-5.44,1.63.63-11.07,4.86-13.29C213.5,227,211.34,236,211.34,236Z"
                        style="
                fill: rgb(255, 255, 255);
                transform-origin: 206.622px 234.88px;
              "
                        id="el160kqv3bfyx"
                        class="animable"></path>
                    <path
                        d="M241.18,287.12l1.26,3.58c.15.27-.16.58-.63.61l-41.87,2.47c-.36,0-.68-.14-.72-.37l-.58-3.62c0-.25.27-.48.67-.51l41.19-2.43A.75.75,0,0,1,241.18,287.12Z"
                        style="
                fill: rgb(255, 255, 255);
                transform-origin: 220.559px 290.312px;
              "
                        id="el0773vma00enb"
                        class="animable"></path>
                    <path
                        d="M235.78,292.06l1.11-.06c.22,0,.38-.14.35-.28l-.79-4.7c0-.14-.22-.24-.44-.22l-1.11.06c-.22,0-.38.14-.35.27l.79,4.7C235.37,292,235.56,292.07,235.78,292.06Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 235.895px 289.429px;
              "
                        id="el0efs4461t94"
                        class="animable"></path>
                    <path
                        d="M203.07,294l1.1-.07c.22,0,.38-.13.36-.27l-.8-4.7c0-.14-.22-.24-.44-.23l-1.11.07c-.22,0-.38.14-.35.27l.79,4.7C202.65,293.9,202.85,294,203.07,294Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 203.179px 291.365px;
              "
                        id="elm1jbuy7b7pi"
                        class="animable"></path>
                    <path
                        d="M219.36,293l1.1-.07c.22,0,.38-.13.36-.27L220,288c0-.14-.22-.24-.44-.23l-1.1.07c-.22,0-.38.14-.36.27l.79,4.7C218.94,292.94,219.14,293,219.36,293Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 219.46px 290.385px;
              "
                        id="ele3gorp8ioc5"
                        class="animable"></path>
                    <g id="elexhfyyf0k08">
                        <path
                            d="M243.45,233.7a16.15,16.15,0,0,0-7.87,8.15c-1.81,4.56,3.42,13.63,4.67,15.67C240.83,251.11,241.86,243.45,243.45,233.7Z"
                            style="opacity: 0.2; transform-origin: 239.327px 245.61px"
                            class="animable"></path>
                    </g>
                    <path
                        d="M224,208.66c-.81,6-1.47,14.74,2.93,18.46a57.23,57.23,0,0,0-15.54,15c-7.09-9.37-2.94-13.94-2.94-13.94,6.54-2,6.21-4.65,4.78-9.2Z"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 217.086px 225.39px;
              "
                        id="elo7t0vca4tc8"
                        class="animable"></path>
                    <g id="elsy7f14mik7g">
                        <path
                            d="M219.62,212.89,213.25,219a19,19,0,0,1,.76,3.24c2.51-.51,6.36-2.91,6.75-5.69C220.94,215.24,219.87,213.49,219.62,212.89Z"
                            style="opacity: 0.2; transform-origin: 217.015px 217.565px"
                            class="animable"></path>
                    </g>
                    <path
                        d="M223.81,194.62c1.58,9.83,2.45,13.95-1.33,20-5.69,9.14-18.11,8.93-22.59-.23-4-8.25-5.94-22.94,2.68-28.93A13.59,13.59,0,0,1,223.81,194.62Z"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 210.826px 202.186px;
              "
                        id="el4j175tsayn"
                        class="animable"></path>
                    <path
                        d="M221.11,181.56c-10-7.17-34.68-4.13-30.89,4.18,4.56,10,12.39,10.26,12.39,10.26s-3.12-1.5-3.05-3.5c7.33-2.28,12.94,2.33,16.11-.68-1.39,5.68,7.72,11.05,7.72,11.05a24,24,0,0,0,6-8C231.55,189.93,229.83,181.83,221.11,181.56Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 210.031px 190.203px;
              "
                        id="eltwaxpigadoo"
                        class="animable"></path>
                    <path
                        d="M208.92,200.66c.17.79-.1,1.52-.62,1.64s-1.07-.43-1.25-1.22.1-1.53.61-1.64S208.74,199.87,208.92,200.66Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 207.983px 200.871px;
              "
                        id="ell89c0l51s3"
                        class="animable"></path>
                    <path
                        d="M200,202.66c.18.79-.1,1.52-.61,1.64s-1.08-.43-1.26-1.22.1-1.52.62-1.64S199.82,201.87,200,202.66Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 199.065px 202.87px;
              "
                        id="elsr5e7vr947h"
                        class="animable"></path>
                    <path
                        d="M199,201.43l-2-.12S198.26,202.57,199,201.43Z"
                        style="fill: rgb(38, 50, 56); transform-origin: 198px 201.609px"
                        id="el9c36otoj26"
                        class="animable"></path>
                    <path
                        d="M203.06,203.47a21.41,21.41,0,0,1-1.68,5.67,3.46,3.46,0,0,0,2.93-.11Z"
                        style="
                fill: rgb(255, 86, 82);
                transform-origin: 202.845px 206.442px;
              "
                        id="el6medefd342"
                        class="animable"></path>
                    <path
                        d="M209.31,211.16a7.25,7.25,0,0,1-1.14.35.24.24,0,1,1-.11-.47,6.41,6.41,0,0,0,4.55-3.58.24.24,0,0,1,.31-.14.23.23,0,0,1,.14.3A6.65,6.65,0,0,1,209.31,211.16Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 210.474px 209.41px;
              "
                        id="elocnzzyi9z1g"
                        class="animable"></path>
                    <path
                        d="M227.6,202.23a7.27,7.27,0,0,1-2.9,4.74c-2.08,1.49-4-.16-4.13-2.57-.14-2.17.78-5.56,3.21-6.09A3.27,3.27,0,0,1,227.6,202.23Z"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 224.117px 202.893px;
              "
                        id="el0z62pld0six9"
                        class="animable"></path>
                    <path
                        d="M210.28,196.39a.46.46,0,0,1-.52-.2c-1.19-1.85-4-2-4-2a.47.47,0,0,1-.46-.49.48.48,0,0,1,.5-.46c.13,0,3.35.17,4.8,2.43a.47.47,0,0,1-.14.65A.42.42,0,0,1,210.28,196.39Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 207.987px 194.824px;
              "
                        id="elbueooxhpter"
                        class="animable"></path>
                    <path
                        d="M194.91,199.86a.47.47,0,0,1-.55-.73,4.71,4.71,0,0,1,3.9-1.91.47.47,0,0,1,.43.51.49.49,0,0,1-.51.44,3.73,3.73,0,0,0-3.07,1.54A.43.43,0,0,1,194.91,199.86Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 196.472px 198.559px;
              "
                        id="ellnwgk7ed78h"
                        class="animable"></path>
                    <polygon
                        points="149.24 407.38 140.39 403.46 148.99 380.92 157.83 384.84 149.24 407.38"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 149.11px 394.15px;
              "
                        id="elxp1kaggu3e9"
                        class="animable"></polygon>
                    <path
                        d="M140.05,401.59l10.68,3.62a.8.8,0,0,1,.54.91L149.62,415a1.62,1.62,0,0,1-2.1,1.17c-3.7-1.33-5.42-2.15-10.11-3.75-2.89-1-9-2-13-3.35s-2.86-5.37-1.08-5.16c8,.93,11.74-1,15-2.25A2.6,2.6,0,0,1,140.05,401.59Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 136.493px 408.866px;
              "
                        id="el93qfw0w192s"
                        class="animable"></path>
                    <g id="el0hsdqiox6fmi">
                        <g
                            style="opacity: 0.2; transform-origin: 150.845px 389.02px"
                            class="animable">
                            <polygon
                                points="157.83 384.85 148.98 380.93 143.86 394.38 153.16 397.11 157.83 384.85"
                                id="elpfnnu3bz2ip"
                                class="animable"
                                style="transform-origin: 150.845px 389.02px"></polygon>
                        </g>
                    </g>
                    <path
                        d="M219.47,290.8s-54.6,3.92-56.75,22.44c-3.67,31.51-19,75.05-19,75.05L156,393.51s22.78-41.93,29.12-69.29c10.57-6,63.24,15.44,55.55-34.68Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 192.577px 341.525px;
              "
                        id="elffgk3oz0gsb"
                        class="animable"></path>
                    <polygon
                        points="157.38 395.32 141.16 390.35 142.32 384.37 160.34 389.71 157.38 395.32"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 150.75px 389.845px;
              "
                        id="el15jah72rv6y"
                        class="animable"></polygon>
                    <path
                        d="M134.66,401.14l-.06-.1a1.35,1.35,0,0,1,0-1.32.77.77,0,0,1,.66-.48c1.28-.13,3.53,2.71,3.78,3a.21.21,0,0,1,0,.26.23.23,0,0,1-.23.12C137.58,402.54,135.36,402.18,134.66,401.14Zm3.68,1c-.94-1.11-2.33-2.48-3-2.41a.34.34,0,0,0-.29.22.9.9,0,0,0,0,.88C135.34,401.42,136.57,401.89,138.34,402.12Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 136.756px 400.929px;
              "
                        id="elkagj4hyffam"
                        class="animable"></path>
                    <path
                        d="M138.48,402.28c-.69-1-1.48-3.26-1-4.16a.84.84,0,0,1,1-.37,1.24,1.24,0,0,1,.85.63c.73,1.26-.19,4-.23,4.12a.22.22,0,0,1-.18.15.23.23,0,0,1-.22-.07A2.89,2.89,0,0,1,138.48,402.28Zm.41-3.73a.73.73,0,0,0-.49-.33c-.3-.06-.41,0-.47.14-.35.61.21,2.52.87,3.54.25-.93.56-2.53.13-3.29Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 138.472px 400.18px;
              "
                        id="eldwd7sohl01f"
                        class="animable"></path>
                    <polygon
                        points="175 379.05 166.71 384.04 153.2 364.05 161.49 359.06 175 379.05"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 164.1px 371.55px;
              "
                        id="el3e5ucnjykhe"
                        class="animable"></polygon>
                    <path
                        d="M165,383.24l9.1-6.66a.8.8,0,0,1,1,.09l6.3,6.44a1.61,1.61,0,0,1-.25,2.39c-3.21,2.26-4.87,3.19-8.87,6.12-2.46,1.8-6.83,6.25-10.23,8.73s-6-.74-4.85-2.08c5.35-6,5.94-10.18,6.76-13.54A2.63,2.63,0,0,1,165,383.24Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 169.371px 388.854px;
              "
                        id="el6802wc3rolf"
                        class="animable"></path>
                    <g id="eljdn643fn6zo">
                        <g
                            style="opacity: 0.2; transform-origin: 161.02px 367.525px"
                            class="animable">
                            <polygon
                                points="161.49 359.07 153.2 364.06 161.26 375.98 168.84 369.93 161.49 359.07"
                                id="elp17gxtdhe4l"
                                class="animable"
                                style="transform-origin: 161.02px 367.525px"></polygon>
                        </g>
                    </g>
                    <path
                        d="M195,291.94s-57.65-2.65-61,15.69c-5.71,31.21,22.18,65,22.18,65l11.36-7.08s-8.59-24-11.86-45.48c10.94-5.28,69.72,21.27,65.3-29.24Z"
                        style="
                fill: rgb(38, 50, 56);
                transform-origin: 177.223px 331.73px;
              "
                        id="ellpr38hzek3c"
                        class="animable"></path>
                    <g id="el04cn6wz75qrj">
                        <path
                            d="M175.93,300.22a6.22,6.22,0,0,0-2.68.61c-6.66,3.14-11.58,7.19-12.4,12.41-.31,2-.67,4-1.07,6.07.66,0,1.36,0,2.11,0,.32-2.07.6-4.11.83-6.1.64-5.56,6-9.8,13.21-13Z"
                            style="opacity: 0.2; transform-origin: 167.855px 309.76px"
                            class="animable"></path>
                    </g>
                    <polygon
                        points="169.81 365.45 156.41 375.88 152.19 371.48 166.92 359.81 169.81 365.45"
                        style="fill: rgb(197, 63, 63); transform-origin: 161px 367.845px"
                        id="elhlsr0sxt859"
                        class="animable"></polygon>
                    <path
                        d="M161.51,387.39h-.12a1.36,1.36,0,0,1-1.06-.79.82.82,0,0,1,0-.82c.64-1.11,4.26-1.32,4.67-1.35a.23.23,0,0,1,.22.14.25.25,0,0,1,0,.26C164.33,385.81,162.76,387.42,161.51,387.39Zm2.92-2.44c-1.45.13-3.37.48-3.7,1.07a.33.33,0,0,0,0,.36.87.87,0,0,0,.69.53C162.13,387,163.22,386.26,164.43,385Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 162.738px 385.91px;
              "
                        id="elpjf4hyutcv8"
                        class="animable"></path>
                    <path
                        d="M164.64,384.92c-1.24,0-3.52-.66-3.95-1.6a.82.82,0,0,1,.25-1,1.27,1.27,0,0,1,1-.34c1.45.14,3.17,2.46,3.24,2.56a.26.26,0,0,1,0,.24.27.27,0,0,1-.19.14A2.31,2.31,0,0,1,164.64,384.92Zm-2.82-2.48a.77.77,0,0,0-.55.22c-.23.21-.2.35-.15.46.29.64,2.17,1.28,3.39,1.33-.61-.75-1.75-1.92-2.61-2Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 162.912px 383.45px;
              "
                        id="elo5clfibdg6"
                        class="animable"></path>
                    <path
                        d="M207.9,199.43l-2-.12S207.19,200.57,207.9,199.43Z"
                        style="fill: rgb(38, 50, 56); transform-origin: 206.9px 199.609px"
                        id="elrdisc5jgzs"
                        class="animable"></path>
                    <path
                        d="M226.67,277.16,217,272.25l2.33,9.94s6.2,1.73,9.09-1.28Z"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 222.71px 277.467px;
              "
                        id="elkxylhg4fup"
                        class="animable"></path>
                    <path
                        d="M249.33,238.76c.42.83.71,1.47,1,2.18s.59,1.4.87,2.1c.56,1.4,1.08,2.81,1.57,4.22.95,2.83,1.75,5.7,2.46,8.59s1.24,5.81,1.69,8.75c.2,1.48.41,2.95.54,4.43l.19,2.22.05.6c0,.31,0,.61,0,.93a10.59,10.59,0,0,1-.21,2,9.12,9.12,0,0,1-1.75,3.75,10.45,10.45,0,0,1-2.72,2.42,16.82,16.82,0,0,1-5.31,2,38.51,38.51,0,0,1-9.43.66A84.63,84.63,0,0,1,220.87,281l.86-5a127.53,127.53,0,0,0,16.47,0,34,34,0,0,0,7.46-1.26,8.15,8.15,0,0,0,2.54-1.19,1.06,1.06,0,0,0,.39-.45c0-.09,0-.06,0-.1l-.44-2.74c-.22-1.34-.5-2.67-.74-4-.56-2.65-1.21-5.29-1.9-7.9s-1.55-5.19-2.45-7.73c-.44-1.28-.91-2.54-1.4-3.78l-.75-1.84c-.24-.58-.53-1.25-.73-1.69Z"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 239.285px 261.212px;
              "
                        id="el7z3bjcnnzho"
                        class="animable"></path>
                    <path
                        d="M244.34,228.38c4.15,1,9.87,14.74,9.87,14.74l-12.82,11.64S232.61,244,234,238.62C235.47,233,239.61,227.24,244.34,228.38Z"
                        style="
                fill: rgb(197, 63, 63);
                transform-origin: 244.03px 241.497px;
              "
                        id="el64qprrav6se"
                        class="animable"></path>
                    <polygon
                        points="208.73 273.88 211.13 282.09 219.34 282.19 217.01 272.25 208.73 273.88"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 214.035px 277.22px;
              "
                        id="eldi3rn5a1naa"
                        class="animable"></polygon>
                    <path
                        d="M216.38,296.44h-42a7.11,7.11,0,0,1-6.67-5.64l-5-27.37a4.58,4.58,0,0,1,4.61-5.64h42.05a7.11,7.11,0,0,1,6.67,5.64l5,27.37A4.58,4.58,0,0,1,216.38,296.44Z"
                        style="
                fill: rgb(255, 255, 255);
                transform-origin: 191.875px 277.116px;
              "
                        id="eldi1twpatt9f"
                        class="animable"></path>
                    <g id="el91busk4maa4">
                        <path
                            d="M215.63,296.44h-41.3a7.11,7.11,0,0,1-6.67-5.64l-5-27.37a4.58,4.58,0,0,1,4.61-5.64h41.3a7.11,7.11,0,0,1,6.67,5.64l5,27.37A4.58,4.58,0,0,1,215.63,296.44Z"
                            style="
                  fill: rgb(197, 63, 63);
                  opacity: 0.5;
                  transform-origin: 191.45px 277.115px;
                "
                            class="animable"></path>
                    </g>
                    <path
                        d="M162.65,275.61l1.59,8.93,3.48-3.26-.94-6.65a1.44,1.44,0,0,0-2.48-.78Z"
                        style="
                fill: rgb(255, 139, 123);
                transform-origin: 165.185px 278.965px;
              "
                        id="el31r5vfzuqw6"
                        class="animable"></path>
                </g>
                <defs>
                    <filter id="active" height="200%">
                        <feMorphology
                            in="SourceAlpha"
                            result="DILATED"
                            operator="dilate"
                            radius="2"></feMorphology>
                        <feFlood
                            flood-color="#32DFEC"
                            flood-opacity="1"
                            result="PINK"></feFlood>
                        <feComposite
                            in="PINK"
                            in2="DILATED"
                            operator="in"
                            result="OUTLINE"></feComposite>
                        <feMerge>
                            <feMergeNode in="OUTLINE"></feMergeNode>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                        </feMerge>
                    </filter>
                    <filter id="hover" height="200%">
                        <feMorphology
                            in="SourceAlpha"
                            result="DILATED"
                            operator="dilate"
                            radius="2"></feMorphology>
                        <feFlood
                            flood-color="#ff0000"
                            flood-opacity="0.5"
                            result="PINK"></feFlood>
                        <feComposite
                            in="PINK"
                            in2="DILATED"
                            operator="in"
                            result="OUTLINE"></feComposite>
                        <feMerge>
                            <feMergeNode in="OUTLINE"></feMergeNode>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                        </feMerge>
                        <feColorMatrix
                            type="matrix"
                            values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>
                    </filter>
                </defs>
            </svg>
        </div>
        <div class="form">
            <form action="./missing-update.action.php?missing-id=<?php echo $missing["missing_person_id"] ?>" method="POST" class="form-register-missing"
                enctype="multipart/form-data" id="form">
                <div class="form-header">
                    <div class="title">
                        <h1><?php echo $missing["missing_person_name"] ?></h1>
                    </div>
                    <button class="btn-previous-state-form" id="btn-previous-state-form" type="button">
                        <-voltar </button>
                </div>
                <section id="form-state-one">
                    <div class="input-group">
                        <div class="input-box">
                            <label for="missing_person_name">
                                <?php if ($language == "pt"): ?>
                                    Nome
                                <?php elseif ($language == "es"): ?>
                                    Nome
                                <?php elseif ($language == "en"): ?>
                                    Nome
                                <?php endif; ?>
                            </label>
                            <input id="missing_person_name" type="text" name="missing_person_name"
                                placeholder="Digite o username completo do desaparecido" value="<?php echo $missing["missing_person_name"] ?>">
                        </div>

                        <div class="input-box">
                            <label for="missing_person_age"> <?php if ($language == "pt"): ?>
                                    Idade do Desaparecido
                                <?php elseif ($language == "es"): ?>
                                    Idade do Desaparecido
                                <?php elseif ($language == "en"): ?>
                                    Idade do Desaparecido
                                <?php endif; ?> </label>
                            <input id="missing_person_age" type="text" name="missing_person_age"
                                placeholder="Digite a idade atual do desaparecido" value="<?php echo $missing["missing_person_age"] ?>">
                        </div>

                        <div class="input-box">
                            <label for="missing_person_note"> <?php if ($language == "pt"): ?>
                                    Caracteristicas do desaparecido
                                <?php elseif ($language == "es"): ?>
                                    Caracteristicas do desaparecido
                                <?php elseif ($language == "en"): ?>
                                    Caracteristicas do desaparecido
                                <?php endif; ?> </label>
                            <input id="missing_person_note" type="text" name="missing_person_note"
                                placeholder="Digite as caraceristicas do desaparecido" value="<?php echo $missing["missing_person_note"] ?>">
                        </div>

                        <div class="input-box">
                            <label for="missing_person_contact">
                                <?php if ($language == "pt"): ?>
                                    Telefone para contato
                                <?php elseif ($language == "es"): ?>
                                    Telefone para contato
                                <?php elseif ($language == "en"): ?>
                                    Telefone para contato
                                <?php endif; ?> </label>
                            <input id="missing_person_contact" type="tel" name="missing_person_contact" placeholder="(xx) xxxxx-xxxx"
                                minlength="11" maxlength="15" value="<?php echo $missing["missing_person_contact"] ?>">
                        </div>

                        <div class="input-box">
                            <label for="missing_date">
                                <?php if ($language == "pt"): ?>
                                    Foi visto por último em
                                <?php elseif ($language == "es"): ?>
                                    Foi visto por último em
                                <?php elseif ($language == "en"): ?>
                                    Foi visto por último em
                                <?php endif; ?> </label>
                            <input id="missing_date" type="datetime-local" name="missing_date" value="<?php echo $missing["missing_date"] ?>">
                        </div>

                        <div class="input-box">
                            <label for="missing_location"> <?php if ($language == "pt"): ?>
                                    ultima vez foi visto
                                <?php elseif ($language == "es"): ?>
                                    ultima vez foi visto
                                <?php elseif ($language == "en"): ?>
                                    ultima vez foi visto
                                <?php endif; ?> </label>
                            <input type="text" name="missing_location" id="missing_location" placeholder="av. guilherme cotching 777" value="<?php echo $missing["missing_location"] ?>">
                        </div>
                    </div>




                    <div class="input-box">
                        <label for="missing_person_story"> <?php if ($language == "pt"): ?>
                                o que fazia quando desapareceu
                            <?php elseif ($language == "es"): ?>
                                o que fazia quando desapareceu
                            <?php elseif ($language == "en"): ?>
                                o que fazia quando desapareceu
                            <?php endif; ?> </label>
                        <input id="missing_person_story" type="text" name="missing_person_story" placeholder="Digite a historia do desaparecido" value="<?php echo $missing["missing_person_story"] ?>">
                    </div>

                    <div class="input-box">
                        <label class="picture" tabindex="0" for="imagem"><?php if ($language == "pt"): ?>
                                foto
                            <?php elseif ($language == "es"): ?>
                                foto
                            <?php elseif ($language == "en"): ?>
                                foto
                            <?php endif; ?> </label>
                        <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem">
                    </div>


                    <div class="input-box">
                        <label class="picture" tabindex="0" for="imagem"> <?php if ($language == "pt"): ?>
                                Boletim de ocorrencia
                            <?php elseif ($language == "es"): ?>
                                Boletim de ocorrencia
                            <?php elseif ($language == "en"): ?>
                                Boletim de ocorrencia
                            <?php endif; ?> </label>
                        <input type="file" accept=".pdf" class="picture_input" id="police_report" name="police_report">
                    </div>

                    <div class="continue-button" id="next-state-form">
                        <button type="button">
                            <?php if ($language == "pt"): ?>
                                Proxima
                            <?php elseif ($language == "es"): ?>
                                Proxima
                            <?php elseif ($language == "en"): ?>
                                Proxima
                            <?php endif; ?>

                        </button>
                    </div>
                </section>

                <section id="form-state-two">

                    <div class="gender-inputs">
                        <div class="gender-title">
                            <h6> <?php if ($language == "pt"): ?>
                                    Gênero
                                <?php elseif ($language == "es"): ?>
                                    Gênero
                                <?php elseif ($language == "en"): ?>
                                    Gênero
                                <?php endif; ?> </h6>
                        </div>
                        <div class="gender-group ">

                            <div class="gender-input">
                                <input type="radio" id="female" name="missing_person_gender" value="Feminino" <?php if ($missing["missing_person_gender"] == "Feminino") echo 'checked'; ?>>
                                <label for="female"> <?php if ($language == "pt"): ?>
                                        Feminino
                                    <?php elseif ($language == "es"): ?>
                                        Feminino
                                    <?php elseif ($language == "en"): ?>
                                        Feminino
                                    <?php endif; ?>
                                </label>
                            </div>

                            <div class="gender-input">
                                <input type="radio" id="male" name="missing_person_gender" value="Masculino" <?php if ($missing["missing_person_gender"] == "Masculino") echo 'checked'; ?>>
                                <label for="male"> <?php if ($language == "pt"): ?>
                                        Masculino
                                    <?php elseif ($language == "es"): ?>
                                        Masculino
                                    <?php elseif ($language == "en"): ?>
                                        Masculino
                                    <?php endif; ?>
                                </label>
                            </div>

                            <div class="gender-input">
                                <input type="radio" id="others" name="missing_person_gender" value="Outros" <?php if ($missing["missing_person_gender"] == "Outros") echo 'checked'; ?>>
                                <label for="others"> <?php if ($language == "pt"): ?>
                                        Outros
                                    <?php elseif ($language == "es"): ?>
                                        Outros
                                    <?php elseif ($language == "en"): ?>
                                        Outros
                                    <?php endif; ?></label>
                            </div>

                            <div class="gender-input">
                                <input type="radio" id="none" name="missing_person_gender" value="Prefiro não dizer" <?php if ($missing["missing_person_gender"] == "Prefiro não dizer") echo 'checked'; ?>>
                                <label for="none"> <?php if ($language == "pt"): ?>
                                        Prefiro não dizer
                                    <?php elseif ($language == "es"): ?>
                                        Prefiro não dizer
                                    <?php elseif ($language == "en"): ?>
                                        Prefiro não dizer
                                    <?php endif; ?></label>
                            </div>

                        </div>
                    </div>

                    <br>
                    <div class="gender-inputs">
                        <div class="gender-title">
                            <h6> <?php if ($language == "pt"): ?>
                                    Mais informações
                                <?php elseif ($language == "es"): ?>
                                    Mais informações
                                <?php elseif ($language == "en"): ?>
                                    Mais informações
                                <?php endif; ?></h6>
                        </div>

                        <div class="input-group input-group2">
                            <div class="input-box">
                                <label for="mais-infromacao-1">
                                    <?php if ($language == "pt"): ?>
                                        Doenças:
                                    <?php elseif ($language == "es"): ?>
                                        Doenças:
                                    <?php elseif ($language == "en"): ?>
                                        Doenças:
                                    <?php endif; ?>
                                </label>
                                <input id="mais-infromacao-1" type="text" name="mais-infromacao-1"
                                    placeholder="Possui algum transtorno ?" value="<?php echo $missing["illnesses"] ?>">
                            </div>

                            <div class="input-box">
                                <label for="mais-infromacao-2">
                                    <?php if ($language == "pt"): ?>
                                        Dependencias quimicas:
                                    <?php elseif ($language == "es"): ?>
                                        Dependencias quimicas:
                                    <?php elseif ($language == "en"): ?>
                                        Dependencias quimicas:
                                    <?php endif; ?> </label>
                                <input id="mais-infromacao-2" type="text" name="mais-infromacao-2"
                                    placeholder="Alcolatra" value="<?php echo $missing["chemical_dependency"] ?>">
                            </div>

                            <div class="input-box">
                                <label for="mais-infromacao-3">
                                    <?php if ($language == "pt"): ?>
                                        Perfil Rede Social:
                                    <?php elseif ($language == "es"): ?>
                                        Perfil Rede Social:
                                    <?php elseif ($language == "en"): ?>
                                        Perfil Rede Social:
                                    <?php endif; ?>
                                </label>
                                <input id="mais-infromacao-3" type="text" name="mais-infromacao-3"
                                    placeholder="facebook.com..." value="<?php echo $missing["profile"] ?>">
                            </div>

                            <div class="input-box">
                                <label for="mais-infromacao-4">
                                    <?php if ($language == "pt"): ?>
                                        Placa do carro:
                                    <?php elseif ($language == "es"): ?>
                                        Placa do carro:
                                    <?php elseif ($language == "en"): ?>
                                        Placa do carro:
                                    <?php endif; ?> </label>
                                <input id="mais-infromacao-4" type="tel" name="mais-infromacao-4" placeholder="xxx-0000"
                                    minlength="11" maxlength="15" value="<?php echo $missing["car_plate"] ?>">
                            </div>


                        </div>
                    </div>

                    <div class="continue-button">
                        <button type="submit" name="btn-cadastre-missing">

                            <?php if ($language == "pt"): ?>
                                Atualizar
                            <?php elseif ($language == "es"): ?>
                                Atualizar
                            <?php elseif ($language == "en"): ?>
                                Atualizar
                            <?php endif; ?>
                        </button>
                    </div>
                </section>
            </form>
        </div>
    </div>



    <!-- libras -->
    <?php
    include './components/libras.php'
    ?>


    <!-- javascript do fomulario -->
    <script src="./assets/javascript/aply-phone-mask.js" defer></script>
    <script src="./assets/javascript/control-state-form.js" defer></script>
    <script src="./assets/javascript/prompsts-check-boxs-form.js" defer></script>
</body>

</html>
<?php
include_once('../include/session.php');

createSession();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style/base.css">
    <link rel="stylesheet" href="../style/article.css">
    <link rel="stylesheet" href="../style/input.css">
</head>
<body>
<div id="container">
    <?php require('../include/head.php'); ?>
    <div id="main">
        <section>
            <h1>
                Mentions légales
            </h1>
            <p>
                <strong style="font-weight: bold; ">
                    En application de la loi n°2004-575 du 21 juin 2004 relative à la confiance dans l’économie
                    numérique, vous trouverez ci-dessous les informations légales concernant ce site :
                </strong>
            </p>

            <strong style="font-weight: bold; ">
                Protection des données personnelles
            </strong>
            <p>
                Conformément à la loi Informatique et Libertés du 6 janvier 1978 (art. 34),
                vous disposez d’un droit d’accès, de rectification ou de suppression concernant
                les données personnelles que nous pourrions être amenés à recueillir (données renseignées par vous).
            </p>

            <strong style="font-weight: bold; ">
                Liens hypertextes
            </strong>
            <p>
                Ce site contient des liens hypertextes permettant l’accès à des sites qui ne
                sont pas édités par le responsable de ce site.
                En conséquence le directeur de publication ne saurait être tenu pour
                responsable du contenu des sites auxquels l’internaute aurait ainsi accès.
            </p>

            <strong style="font-weight: bold; ">
                Éditeur responsable
            </strong>
            <p>
                Le responsable de la publication et le webmaster est Nicolas Iung.
            </p>

            <strong style="font-weight: bold; ">
                Réalisation, hébergement du site
            </strong>
            <p>
                Le site est réalisé par Victor Couturieux, Anthony Godard,
                Nicolas Iung, Florent Martin et Raphael Ragoomundun, étudiants en premier
                semestre de DUT Informatique à l'IUT de Belfort.
                <br>
                Il est hébergé par
                <a href="https://midway.ovh">le réseau Midway</a>.
            </p>
        </section>
    </div>
    <?php
    require('../include/foot.php');
    ?>
</div>
</body>
</html>

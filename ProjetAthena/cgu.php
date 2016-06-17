<?php
//connexion à la base de données
include("php/connectDB.php");
//Ouvre la variable de session.
session_start();
//On vérifie que l'utilisateur est connecté
if(isset($_SESSION["prenom_client"])) $prenom_client = $_SESSION["prenom_client"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->
    <title>Athena</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/athena-style.css" rel="stylesheet">
</head>
<body>
<!--Barre de navigation-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--Bouton d'accueil-->
            <a class="navbar-brand logo" href="index.php">Athena</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!--Bouton Produits-->
                <li class="active"><a href="produit.php">Produits<span class="sr-only">(current)</span></a></li>
                <?php
                //On affiche le bouton "Déposer un article" seulement si l'utilisateur est inscrit et connecté
                if (isset($prenom_client)) echo "<li><a href='deposeArticle.php'>Déposer un article</a></li>"
                ?>
            </ul>
            <!--Barre et bouton de recherche-->
            <form class="navbar-form navbar-nav" action="afficheSearch.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Rechercher" class="form-control input-search" name="search">
                </div>
                <input type="submit" class="btn btn-success btn-search" name="envoie_form" value="Rechercher">
            </form>
            <?php
            //Si l'utilisateur n'est pas connecté, on affiche le bouton connexion:
            if(!isset($prenom_client)) echo "<a href=connexion.php class='btn btn-success btn-link-co' role='button'>Connexion</a> <a href=inscription.php class='btn btn-success btn-link-ins' role='button'>Inscription</a>" ?>
            <?php
            if (isset($prenom_client)) {
                //Si l'utilisateur est connecté, On affiche la liste déroulante correspondant à ses information et intitulé par son nom:
                //Affichage des liens "Mon compte", "Mes ventes", "Mes achats", "Déconnexion";
                echo "<ul class='nav navbar-nav navbar-right'>
                                    <li class='dropdown'>
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Bienvenue ".$prenom_client."<span class='caret'></span></a>
                                            <ul class='dropdown-menu'>
                                                <li><a href='monCompte.php'>Mon compte</a></li>
                                                <li><a href='mesVentes.php'>Mes ventes</a></li>
                                                <li><a href='php/deconnexion.php'>Déconnexion</a></li>
                                            </ul>
                                    </li>
                                  </ul>";
            }
            ?>
        </div>
    </div>
</nav>





<div class="container">
   <div class="row">
       <div class="col-md-12">
           <h2>Informations légales</h2>
           <p>Le site Internet www.athea.fr, ci-après dénommé «  Athena.fr » propose un service de dépôt et de
               <br/>consultation de petites annonces sur Internet plus spécifiquement destiné aux particuliers.
               <br/><br/>L'accès au site, sa consultation et son utilisation sont subordonnés à l'acceptation sans réserve des
               <br/>présentes Conditions Générales d'Utilisation de Leboncoin.fr.
               <br/><br/>Le site est édité par ATHENA FRANCE, SAS au capital de 1.252.490 euros, immatriculée au registre du
               <br/>commerce et des sociétés de Paris sous le numéro 121 722 333. Siège social : 18, rue Lavoisier - 75008 Paris.
               <br/><br/><br/>Le Directeur de Publication de Athena.fr est Monsieur Talabot William.
               <br/><br/><br/>Numéro de TVA intracommunautaire : FR32333333333
               <br/><br/><br/>Pour toute question sur l'entreprise, vous pouvez nous envoyer vos questions par email.
               <br/><br/><br/>Pour les Réquisitions judiciaires et les Droits de communication, merci de nous faire parvenir le droit
               <br/>de communication (sur papier à en-tête daté, signé et tamponné) et la réquisition (datée, signée et
               <br/>tamponnée) précisant la référence de l'annonce, l'adresse email de l'annonceur et/ou son numéro de
               <br/>téléphone, en pièce jointe par mail à requisition@athena@gmail.com (le délai de réponse est de 24h)
               <br/><br/><br/>La référence de l'annonce est le numéro figurant dans l'adresse internet de la page de présentation
               <br/>de l'annonce.
               <br/><br/>Nous vous transmettrons les informations demandées dans les meilleurs délais. Ces recherches sont
               <br/>effectuées à titre gracieux.
               <br/><br/><br/>Pour simplifier nos procédures, merci de bien vouloir indiquer dans votre réquisition l'adresse email
               <br/>à laquelle vous faire parvenir notre réponse.
               <br/><br/><br/>Athena.fr est hébergé par IPSSI  - 25 rue Claude Tilliers - 75012 Paris
           </p>
           <br/><br/><br/>
           <h1>CONDITIONS GENERALES D'UTILISATION DU SERVICE ATHENA</h1>
           <br/><br/>
           <h1>PREAMBULE : DEFINITIONS</h1>
           <br/><br/><br/>
           <p>Chacun des termes mentionnés ci-dessous aura dans les présentes Conditions Générales d'Utilisation
               <br/>du Service ATHENA (ci-après dénommées les " CGU ") la signification suivante :
               <br/><br/><br/>Annonce : désigne l'ensemble des éléments et données (visuelles, textuelles, sonores,
               <br/>photographies, dessins), déposé par un Annonceur sous sa responsabilité éditoriale, en vue d'acheter
               <br/>ou de vendre un bien sur le Site Internet.
               <br/><br/><br/>Annonceur : désigne toute personne Physique majeure ou personne Morale établie en France (inclus
               <br/>les DOM à l'exclusion de Mayotte et des COM), titulaire d’un Compte Personnel, et ayant déposé et
               <br/>mis en ligne une Annonce via le Service ATHENA. Le terme "Annonceur" regroupe dans les CGU les
               <br/>un seul type d'Annonceurs déposant des annonces via le service ATHENA, à savoir :
               <br/><br/><br/>L'Annonceur "Particulier" : qui s'entend de toute personne physique majeure, agissant exclusivement
               <br/>à des fins privées établie en France (inclus les DOM à l'exclusion de Mayotte et des COM) et ayant
               <br/>déposé et mis en ligne une Annonce à partir du Site Internet. Tout Annonceur Particulier doit
               <br/>impérativement être titulaire d’un Compte Personnel pour déposer et gérer sa ou ses Annonces
               <br/><br/><br/>Compte Personnel : désigne l'espace gratuit, accessible depuis le Site Internet, que tout Annonceur
               <br/>Particulier doit se créer, et à partir duquel il peut diffuser, gérer et visualiser ses annonces.
               <br/><br/><br/>ATHENA France : désigne la société qui édite et exploite le Site Internet: ATHENA France, SAS au
               <br/>capital de 1.252.490 euros, immatriculée au registre du commerce et des sociétés de Paris sous le
               <br/>numéro 533.334.333, dont le siège social est situé 3 rue de Tigery 91250 Saint Germain-Lès-Corbeil.
               <br/><br/><br/>Service ATHENA : désigne les services ATHENA mis à la disposition des Utilisateurs et des Annonceurs
               <br/>sur le Site Internet tels que décrits à l'article 3.1 des présentes CGU.
               <br/><br/><br/>Site Internet : désigne le site internet exploité par ATHENA France accessible principalement depuis
               <br/>l'URL www.Athena.fr et permettant aux Utilisateurs et aux Annonceurs d'accéder via internet au
               <br/>Service ATHENA décrit à l'article 3.1 des présentes CGU.
               <br/><br/><br/>Utilisateur : désigne tout visiteur, ayant accès au Service ATHENA via le Site Internet et consultant le
               <br/>Service ATHENA, accessible depuis le support.
           </p>
           <br/><br/><br/>
           <h1>ARTICLE 1 : OBJET</h1>
           <p>
               <br/><br/><br/>Les CGU ont pour objet de déterminer les conditions d'utilisation du Service ATHENA mis à
               <br/>disposition des Utilisateurs et des Annonceurs via le Site Internet.
           </p>
           <br/><br/><br/>
           <h1>ARTICLE 2 : ACCEPTATION</h1>
           <p>
               <br/><br/><br/>Tout Utilisateur - Tout Annonceur déclare en accédant et utilisant le service ATHENA, depuis le Site
               <br/>Internet, avoir pris connaissance des présentes Conditions Générales d’Utilisation et les accepter
               <br/>expressément sans réserve et/ou modification de quelque nature que ce soit. Les présentes CGU
               <br/>sont donc pleinement opposables aux Utilisateurs et aux Annonceurs.
           </p>
           <br/><br/><br/>
           <h1>ARTICLE 3 : UTILISATION DU SERVICE LEBONCOIN</h1>
           <br/><br/>
           <h2>3.1 Description du Service ATHENA</h2>
           <br/><br/>
           <h2>3.1.1 Règles générales</h2>
           <br/><br/><br/>
           <p>
               Tout Utilisateur – tout Annonceur déclare être informé qu’il devra, pour accéder au Service ATHENA,
               <br/>disposer d’un accès à l’Internet souscrit auprès du fournisseur de son choix, dont le coût est à sa
               <br/>charge, et reconnaît que :
               <br/><br/>La fiabilité des transmissions est aléatoire en raison, notamment, du caractère hétérogène
               <br/>infrastructures et réseaux sur lesquelles elles circulent et que, en particulier, des pannes ou
               <br/>saturations peuvent intervenir ;
               <br/><br/>Il appartient à l’Annonceur de prendre toute mesure qu’il jugera appropriée pour assurer la sécurité
               <br/>de son équipement et de ses propres données, logiciels ou autres, notamment contre la
               <br/>contamination par tout virus et/ou de tentative d’intrusion dont il pourrait être victime ;
               <br/><br/>Tout équipement connecté au Site Internet est et reste sous l’entière responsabilité de l’Annonceur
               <br/>la responsabilité de ATHENA France ne pourra pas être recherchée pour tout dommage direct ou
               <br/>indirect qui pourrait subvenir du fait de leur connexion au Site Internet.
               <br/><br/>L’Annonceur s’engage, le cas échéant, à respecter et à maintenir la confidentialité des Identifiants de
               <br/>connexion à son Compte Personnel et reconnaît expressément que toute connexion à son Compte
               <br/>Personnel, ainsi que toute transmission de données depuis son Compte Personnel sera réputée
               <br/>été effectuée par l’Annonceur.
               <br/><br/><br/>Toute perte, détournement ou utilisation des Identifiants de connexion et leurs éventuelles
               <br/>conséquences relèvent de la seule et entière responsabilité de l’Annonceur.
               <br/><br/><br/>L'Annonceur est informé et accepte que pour des raisons d'ordre technique, son Annonce ne sera
               <br/>pas diffusée instantanément après son dépôt sur le Site Internet.
               <br/><br/><br/>Toute Annonce publiée sera diffusée sur le Site Internet.
           </p>
           <br/><br/><br/>
           <h2>3.2 Description du service</h2>
           <p>
               <br/><br/><br/>Le Service ATHENA proposé aux Utilisateurs et aux Annonceurs varie en fonction de la qualité de
               <br/>"Particulier" de l'Annonceur et du support de communication utilisé (Site Internet).
               <br/><br/><br/>1) Fonctionnalités accessibles aux Annonceurs et aux Utilisateurs depuis le Site Internet
               <br/>-La consultation de toutes les Annonces diffusées
               <br/>-La mise en contact avec les Annonceurs
               <br/><br/>2) Fonctionnalités accessibles depuis le Site Internet aux Annonceurs Particuliers logués
               <br/>-Le dépôt d'Annonce
               <br/>-L'accès à l'espace "Mes Ventes" :
               <br/>-La gestion d'Annonce via le tableau de bord du Compte Personnel :
               <br/>la suppression d'Annonce : il est possible de supprimer plusieurs Annonces en une action
               <br/>la modification d'Annonce
               <br/>-L'accès et la gestion du Compte Personnel :
               <br/>la gestion (actualisation, modification etc.), à tout moment, des informations personnelles
               <br/>renseignées lors de la création du Compte Personnel :
               <br/><br/>Informations obligatoires : nom, prénom, email, numéro de téléphone, mot de passe, adresse, ville,
               <br/>code postal.
           </p>
           <br/><br/><br/>
           <h2>3.3 Protection, collecte, utilisation et communication des données personnelles</h2>
           <br/><br/>
           <h2>3.3.1 : Protection des données personnelles</h2>
           <p>
               <br/><br/><br/>Conformément à la loi nº78-17 du 6 janvier 1978, dite " Informatique et libertés ", ATHENA France a
               <br/>fait l'objet d'une déclaration auprès de la Commission Nationale de l'Informatique et des Libertés
               <br/>(C.N.I.L) sous le numéro : 1521352.
               <br/><br/>Conformément aux articles 38, 39 et 40 de la loi nº78-17 du 6 janvier 1978, tout Utilisateur et
               <br/>Annonceur Particulier (agissant exclusivement à des fins privées et non commerciales) du Service
               <br/>ATHENA disposent à tout moment d'un droit d'opposition, d'accès, de rectification, de suppression
               <br/>ainsi que d'opposition au traitement des données le concernant.
               <br/><br/>L'Utilisateur et l'Annonceur Particulier peuvent exercer ce droit en contactant ATHENA France via la
               <br/>rubrique "contact", présente sur le Site Internet.
               <br/><br/>Par ailleurs, afin d'informer tout tiers que l'Annonceur refuse que ses données personnelles soient
               <br/>utilisées à des fins de démarchage commercial, ATHENA FRANCE propose à l'Annonceur d'indiquer
               <br/>dans l'encart « contacter le vendeur » de son Annonce qu'il refuse d'être démarché
               <br/>commercialement.
               <br/><br/>L'intégration de cette mention est proposée à l'Annonceur lors du dépôt et de la prolongation de son
               <br/>Annonce depuis le formulaire de dépôt.
               <br/><br/>ATHENA FRANCE n'est aucunement responsable du non-respect par un tiers du refus de
               <br/>d'être démarché commercialement et ne donne aucune garantie, expresse ou implicite, à cet égard.
           </p>
           <h2>3.3.2 : Collecte et utilisation des données personnelles</h2>
           <p>
               <br/><br/><br/>Le dépôt d'annonce par l'Annonceur nécessite que celui-ci se crée, en fonction de son statut, un
               <br/>compte Personnel et renseigne les données personnelles visées au 3.1 1) et 2) des présentes CGU.
               <br/><br/>Ces données sont susceptibles d'être utilisées par ATHENA France aux fins suivantes :
               <br/><br/>La collecte des données personnelles
               <br/><br/>Les données personnelles sont collectées dans le cadre :
               <br/><br/>De la création du Compte Personnel, l'Annonceur Particulier remplissant un formulaire et
               <br/>renseignant, les informations suivantes : pseudo, nom, prénom, email, numéro de téléphone, mot de
               <br/>passe, adresse, ville, code postal.
               <br/><br/>Toutes les informations contenues dans l'onglet « Mon Compte » du Compte Personnel sont
               <br/>modifiables à tout moment par son titulaire.
               <br/><br/><br/>•  Utilisation des données personnelles
               <br/><br/>Toutes données personnelles collectées sont susceptibles d'être utilisées par ATHENA France aux
               <br/>fins suivantes :
               <br/><br/>- La gestion de l'Annonce, notamment sa validation
               <br/>- La publication et le suivi de l'Annonce
               <br/>- L’envoi de formulaires de réponses
               <br/>- L’envoi d'enquêtes de satisfaction
               <br/>- Statistiques
           </p>
           <br/><br/><br/>
           <h2>3.3.3 : Communication des données personnelles</h2>
           <p>
               <br/><br/><br/>Conformément à la loi nº78-17 du 6 janvier 1978, ATHENA France s'engage à conserver toutes les
               <br/>données personnelles recueillies via le service ATHENA et à ne les transmettre à aucun tiers.
               <br/><br/>Par dérogation, l'Utilisateur et l'Annonceur sont informés qu’ATHENA France peut être amenée à
               <br/>communiquer les données personnelles collectées via le service ATHENA :
               <br/><br/>- aux autorités administratives et judiciaires autorisées, uniquement sur réquisition judiciaire,
               <br/>- à la société mère et aux sociétés-sœurs de ATHENA France
           </p>
           <br/><br/><br/>
           <h2>3.5 Prospection commerciale et collecte déloyale</h2>
           <p>
               <br/><br/><br/>L'utilisation à des fins commerciales ou de diffusion dans le public de données téléchargées à partir
               <br/>du Site Internet est formellement interdite, sous peine de sanction pénales prévues par les articles
               <br/>226-16 à 226-24 du Code Pénal qui sanctionnent notamment le délit de collecte illicite de données
               <br/>personnelles.
           </p>
           <br/><br/><br/>
           <h1>ARTICLE 4 : MODERATION DES ANNONCES</h1>
           <br/><br/>
           <h2>4.1 Suppression des Annonces illicites</h2>
           <br/><br/><br/>
           <p>
               ATHENA France se réserve le droit de supprimer, sans préavis ni indemnité ni droit à
               <br/>remboursement, toute Annonce qui ne serait pas conforme aux règles de diffusion du Service
               <br/>ATHENA et/ou qui serait susceptible de porter atteinte aux droits d'un tiers.
           </p>
           <br/><br/><br/>
           <h2>4.2 Notification des abus</h2>
           <br/><br/><br/>
           <p>
               Il est permis à tout Utilisateur de signaler un contenu abusif à partir du Site Internet par mail en
               <br/>cliquant sur le lien "contact"
           </p>
           <br/><br/><br/>
           <h1>ARTICLE 5 : RESPONSABILITE ET GARANTIES</h1>
           <br/><br/>
           <h2>5.1 Engagements de l’Annonceur</h2>
           <br/><br/><br/>
           <p>
               L'Annonceur garantit détenir tous les droits (notamment des droits de propriété intellectuelle) ou
               <br/>avoir obtenu toutes les autorisations nécessaires à la publication de son Annonce.
               <br/><br/>L'Annonceur garantit que l'Annonce ne contrevient à aucune réglementation en vigueur (notamment
               <br/>relatives à la publicité, à la concurrence, à la promotion des ventes, à l'utilisation de la langue
               <br/>française, à l'utilisation de données personnelles, à la prohibition de la commercialisation de certains
               <br/>biens ou services), ni aucun droit de tiers (notamment aux droits de propriété intellectuelle et aux
               <br/>droits de la personnalité) et qu'il ne comporte aucun message diffamatoire ou dommageable à
               <br/>l'égard de tiers.
               <br/><br/><br/>Ainsi, l'Annonceur s'engage notamment à ce que l'Annonce ne contienne :
               <br/><br/>Aucun lien hypertexte redirigeant les Utilisateurs notamment vers des sites internet exploités par
               <br/>tout tiers à la société ATHENA France.
               <br/><br/>Aucune information fausse, mensongère ou de nature à induire en erreur les Utilisateurs
               <br/><br/>Aucune mention diffamatoire ou de nature à nuire aux intérêts et/ou à l'image de ATHENA France ou
               <br/>de tout tiers
               <br/><br/>Aucun contenu portant atteinte aux droits de propriété intellectuelle de tiers
               <br/><br/>Aucun contenu à caractère promotionnel ou publicitaire en lien avec l'activité de l'Annonceur. En
               <br/>effet, une Annonce est destinée à promouvoir un produit et n'est pas un support de publicité
               <br/><br/>L'Annonceur s'engage à ne proposer dans les Annonces que des biens disponibles dont il dispose.
               <br/>L'Annonceur s'engage, en cas d'indisponibilité du bien, à procéder au retrait de l'Annonce du Service
               <br/>L'Annonceur s'engage, en cas d'indisponibilité du bien, à procéder au retrait de l'Annonce du Service
               <br/>ATHENA dans les plus brefs délais.
               <br/><br/><br/>L'Annonceur déclare connaître l'étendue de diffusion du Site Internet, avoir pris toutes précautions
               <br/>pour respecter la législation en vigueur des lieux de réception et décharger ATHENA FRANCE de
               <br/>toutes responsabilités à cet égard.
               <br/><br/>Dans ce cadre, l'Annonceur déclare et reconnaît qu'il est seul responsable du contenu des Annonces
               <br/>qu'il publie et rend accessibles aux Utilisateurs, ainsi que de tout document ou information qu'il
               <br/>transmet aux Utilisateurs.
               <br/><br/>L'Annonceur assume l'entière responsabilité éditoriale du contenu des Annonces qu'il publie.
               <br/><br/><br/>En conséquence, l'Annonceur relève ATHENA FRANCE, ses sous-traitants et fournisseurs, de toutes
               <br/>responsabilités, les garantit contre tout recours ou action en relation avec l'Annonce qui pourrait
               <br/>être intenté contre ces derniers par tout tiers, et prendra à sa charge tous les dommages-intérêts
               <br/>ainsi que les frais et dépens auxquels ils pourraient être condamnés ou qui seraient prévus à leur
               <br/>encontre par un accord transactionnel signé par ces derniers avec ce tiers , nonobstant tant tout
               <br/>dommages-intérêts dont ATHENA France, ses sous-traitants et fournisseurs pourraient réclamer à
               <br/>raison des faits dommageables de l’Annonceur.
               <br/><br/><br/>En déposant toute Annonce, chaque Annonceur reconnaît et accepte que ATHENA France puisse
               <br/>supprimer, ou refuser, à tout moment, sans indemnité ni droit à remboursement des sommes
               <br/>engagées par l'Annonceur aux fins de son dépôt, une Annonce qui serait contraire notamment à la loi
               <br/>française, aux règles de diffusion du Service ATHENA fixées par ATHENA France et accessibles ici
               <br/>et/ou susceptible de porter atteinte aux droits de tiers.
               <br/><br/><br/>De manière générale, il est de la responsabilité des Annonceurs de vérifier leur statut de particulier
               <br/>ou de professionnel, notamment au regard des articles L 121-1 et L 110-1 du Code de commerce
               <br/>selon lesquels "sont commerçants ceux qui exercent des actes de commerce et en font leur
               <br/>profession habituelle" et "La loi répute actes de commerce : tout achat de biens meubles pour les
               <br/>revendre, soit en nature, soit après les avoir travaillés et mis en œuvre [...]".
               <br/><br/><br/>En cas de diffusion d'Annonces par un Annonceur inscrit en tant que particulier titulaire d'un Compte
               <br/>Personnel, dont l'activité peut être assimilée à une activité professionnelle, ATHENA France se
               <br/>réserve le droit de restreindre l'utilisation du Service ATHENA, notamment de refuser ou limiter le
               <br/>nombre d'Annonces que l'Annonceur peut mettre en ligne sur le Site.
               <br/><br/><br/>Toute Annonce est diffusée, à compter du jour de son dépôt, sur le Site Internet et ce pour une durée
               <br/>maximale de 60 jours. Passée cette durée initiale de 60 jours, ATHENA France envoie à l'Annonceur
               <br/>un e-mail l'informant que son Annonce a expiré et qu'elle n'est plus en ligne et lui propose de
               <br/>reconduire son Annonce pour 2 mois supplémentaires. Si l'Annonceur ne reconduit pas son Annonce
               <br/>dans les 5 jours suivant la réception de cet e-mail, il ne pourra pas prolonger son Annonce et devra la
               <br/>déposer à nouveau.
               <br/><br/><br/>L'Annonceur s'engage également à ce que son Compte Personnel ne contienne :
               <br/><br/>- Aucune information obligatoire fausse et/ou mensongère
               <br/>- Aucune information portant atteinte aux droits d'un tiers
               <br/>- Dans ce cadre, le titulaire déclare et reconnaît qu'il est seul responsable des informations
               <br/>Dans ce cadre, le titulaire déclare et reconnaît qu'il est seul responsable des informations
               <br/><br/><br/>En créant un Compte Personnel, chaque titulaire reconnaît et accepte que ATHENA France puisse
               <br/>supprimer à tout moment un compte qui serait contraire notamment à la loi française et/ou aux
               <br/>règles de diffusion fixées par ATHENA France et accessibles ici.
           </p>
           <br/><br/><br/>
           <h2>5.2 Responsabilité et obligations d’ATHENA France</h2>
           <br/><br/><br/>
           <p>
               En sa qualité d'hébergeur, ATHENA France est soumise à un régime de responsabilité atténuée prévu
               <br/>aux articles 6.I.2. et suivants de la loi nº2004-575 du 21 juin 2004 pour la confiance dans l'économie
               <br/>numérique.
               <br/><br/><br/>ATHENA France ne saurait donc en aucun cas être tenue responsable du contenu des Annonces
               <br/>publiées par les Annonceurs et ne donne aucune garantie, expresse ou implicite, à cet égard.
               <br/><br/><br/>ATHENA France est un tiers aux correspondances et relations entre les Annonceurs et les Utilisateurs,
               <br/>et exclut de ce fait toute responsabilité à cet égard.
           </p>
           <br/><br/><br/>
           <h2>5.3 Limitation de responsabilité</h2>
           <br/><br/><br/>
           <p>
               ATHENA France s'engage à mettre en œuvre tous les moyens nécessaires afin d'assurer au mieux la
               <br/>fourniture du Service ATHENA aux Utilisateurs et aux Annonceurs.
               <br/><br/><br/>Toutefois, ATHENA France décline toute responsabilité en cas de :
               <br/><br/><br/>Interruptions, de pannes, de modifications et de dysfonctionnement du Service ATHENA quel que
               <br/>soit le support de communication utilisé et ce quelles qu'en soient l'origine et la provenance,
               <br/><br/>la perte de données ou d'informations stockées par ATHENA FRANCE. Il incombe aux Annonceurs de
               <br/>prendre toutes précautions nécessaires pour conserver les Annonces qu'ils publient via le Service
               <br/>ATHENA;
               <br/><br/>Impossibilité momentanée d'accès au Site Internet en raison de problèmes techniques et ce quelles
               <br/>qu'en soient l'origine et la provenance,
               <br/><br/>dommages directs ou indirects causés à l'Utilisateur ou l'Annonceur, quelle qu'en soit la nature,
               <br/>résultant du contenu des Annonces et/ou de l'accès, de la gestion, de l'Utilisation, de l'exploitation,
               <br/>du dysfonctionnement et/ou de l'interruption du Service ATHENA,
               <br/><br/>Utilisation anormale ou d'une exploitation illicite du Service ATHENA par tout Utilisateur ou
               <br/>Annonceur,
               <br/><br/>Attaque ou piratage informatique, privation, suppression ou interdiction, temporaire ou définitive, et
               <br/>pour quelque cause que ce soit, de l’accès au réseau internet.
               <br/><br/>La responsabilité de ATHENA FRANCE ne pourra être engagée que pour les dommages directs subis
               <br/>par l’Annonceur, résultant d’un manquement à ses obligations contractuelles telles que définies aux
               <br/>présentes. L’Utilisateur – l’Annonceur renonce donc à demander réparation à ATHENA FRANCE à
               <br/>quelque titre que ce soit, de dommages indirects tels que le manque à gagner, la perte de chance, le
               <br/>préjudice commercial ou financier, l’augmentation de frais généraux ou les pertes trouvant leur
               <br/>origine ou étant la conséquence de l’exécution des présentes.
               <br/><br/><br/>Tout Utilisateur et Annonceur est alors seul responsable des dommages causés aux tiers et des
               <br/>conséquences des réclamations ou actions qui pourraient en découler. L'Utilisateur renonce
               <br/>également à exercer tout recours contre ATHENA France dans le cas de poursuites diligentées par un
               <br/>tiers à son encontre du fait de l'Utilisation et/ou de l'exploitation illicite du Service ATHENA, en cas
               <br/>de perte par un Utilisateur ou un Annonceur de son mot de passe ou en cas d'usurpation de son
               <br/>identité.
           </p>
           <br/><br/><br/>
           <h1>ARTICLE 6 : PROPRIETE INTELLECTUELLE</h1>
           <br/><br/><br/>
           <p>
               6.1 Tous les droits de propriété intellectuelle (tels que notamment droits d'auteur, droits voisins,
               <br/>droits des marques, droits des producteurs de bases de données) portant tant sur la structure que
               <br/>sur les contenus du Site Internet et notamment les images, logos, marques, éléments graphiques,
               <br/>textuels, visuels, outils, logiciels, documents, données, etc. (ci-après désignés dans leur ensemble "
               <br/>Eléments ") sont réservés. Ces Eléments sont la propriété d’ATHENA France. Ces Eléments sont mis à
               <br/>disposition des Utilisateurs et des Annonceurs, à titre gracieux, pour la seule utilisation du Service
               <br/>ATHENA et dans le cadre d'une utilisation normale de ses fonctionnalités. Les Utilisateurs et les
               <br/>Annonceurs s'engagent à ne modifier en aucune manière les Eléments.
               <br/><br/><br/>Toute utilisation non expressément autorisée des Eléments du Site Internet entraîne une violation
               <br/>des droits d'auteur et constitue une contrefaçon. Elle peut aussi entraîner une violation des droits à
               <br/>l'image, droits des personnes ou de tous autres droits et réglementations en vigueur. Elle peut donc
               <br/>engager la responsabilité civile et/ou pénale de son auteur.
               <br/><br/><br/>6.2 Il est interdit à tout Utilisateur et Annonceur de copier, modifier, créer une œuvre dérivée,
               <br/>inverser la conception ou l'assemblage ou de toute autre manière tenter de trouver le code source,
               <br/>vendre, attribuer, sous licencier ou transférer de quelque manière que ce soit tout droit afférent aux
               <br/>Eléments.
               <br/><br/><br/>Tout Utilisateur et Annonceur du Service ATHENA s'engagent notamment à ne pas :
               <br/><br/><br/>Utiliser ou interroger le Service ATHENA pour le compte ou au profit d'autrui ;
               <br/><br/>Extraire, à des fins commerciales ou non, tout ou partie des informations ou des petites Annonces
               <br/>présentes sur le Service ATHENA et sur le Site Internet;
               <br/><br/>Reproduire sur tout autre support, à des fins commerciales ou non, tout ou partie des informations
               <br/>ou des petites Annonces présentes sur le Service ATHENA et sur le Site Internet permettant de
               <br/>reconstituer tout ou partie des fichiers d'origine ;
               <br/><br/>utiliser un robot, notamment d'exploration (spider), une application de recherche ou récupération de
               <br/>sites Internet ou tout autre moyen permettant de récupérer ou d'indexer tout ou partie du contenu
               <br/>du Site Internet, excepté en cas d'autorisation expresse et préalable de ATHENA France.
               <br/><br/>Toute reproduction, représentation, publication, transmission, utilisation, modification ou extraction
               <br/>de tout ou partie des Eléments et ce de quelque manière que ce soit, faite sans l'autorisation
               <br/>préalable et écrite de ATHENA France est illicite. Ces actes illicites engagent la responsabilité de ses
               <br/>auteurs et sont susceptibles d'entraîner des poursuites judiciaires à leur encontre et notamment
               <br/>pour contrefaçon.
               <br/><br/><br/> 6.3. Les marques et logos ATHENA et Athena.fr, ainsi que les marques et logos des partenaires
               <br/>d’ATHENA France sont des marques déposées. Toute reproduction totale ou partielle de ces marques
               <br/>et/ou logos sans l'autorisation préalable et écrite d’ATHENA France est interdite.
               <br/><br/><br/>6.4. ATHENA France est producteur des bases de données du Service ATHENA. En conséquence,
               <br/>toute extraction et/ou réutilisation de la ou des bases de données au sens des articles L 342-1 et
               <br/>L 342-2 du code de la propriété intellectuelle est interdite.
               <br/><br/><br/>6.5. ATHENA France se réserve la possibilité de saisir toutes voies de droit à l'encontre des personnes
               <br/>qui n'auraient pas respecté les interdictions contenues dans le présent article.
               <br/><br/><br/>6.6. Liens vers le Service ATHENA
               <br/><br/><br/>Aucun lien hypertexte ne peut être créé vers le Service ATHENA sans l'accord préalable et exprès
               <br/>d’ATHENA France.
               <br/><br/><br/>Si un internaute ou une personne morale désire créer, à partir de son site, un lien hypertexte vers le
               <br/>Service ATHENA et ce quel que soit le support, il doit préalablement prendre contact avec ATHENA France
               <br/>en lui adressant un email à l'adresse suivante support@athena.fr.
               <br/><br/><br/>Tout silence d’ATHENA France devra être interprété comme un refus.
               <br/><br/><br/>6.7. Le contenu des Annonces déposées appartient aux Annonceurs, néanmoins, en déposant des
               <br/>Annonces sur le Site Internet, l’Annonceur concède :
               <br/><br/>- à ATHENA France le droit d’exploitation non exclusif, transférable, sous licenciable, à titre
               <br/>gracieux, pour le monde entier sur (i) l’ensemble du contenu des Annonces et notamment sur les
               <br/>textes, , titres (ci-après le « Contenu »), au fur et à mesure de leur publication sur le Site ainsi (ii)
               <br/>qu’une licence sur l’ensemble des droits de propriété intellectuelle afférant au Contenu et
               <br/>notamment sur les droits d’auteurs sur les éléments utilisés dans son Annonce, tels que les textes, et
               <br/>ce pour toute la durée légale de ses droits de propriété intellectuelle et pour le monde entier.
               <br/><br/><br/>Les droits ainsi concédés incluent le droit de reproduire, représenter, diffuser, adapter, modifier,
               <br/>réaliser une œuvre dérivée, traduire tout ou partie du Contenu par tous procédés, sous quelque
               <br/>forme que ce soit et sur tous supports (numérique, imprimé…) connus ou inconnus à ce jour, dans le
               <br/>cadre du service ATHENA ou en relation avec l’activité de ATHENA France, et ce à des fins
               <br/>commerciales ou non et notamment publicitaires, ainsi que dans le cadre d’une diffusion sur les
               <br/>réseaux sociaux.
               <br/><br/><br/>L’Annonceur accorde son consentement à la reprise de son Annonce et du Contenu de cette dernière
               <br/>sur les réseaux sociaux, notamment Facebook, Instagram et Twitter. Par conséquent, l’Annonceur
               <br/>atteste avoir pris connaissance des conditions générales d’utilisation des sites Facebook (https://fr-
               <br/>fr.facebook.com/legal/terms?locale=fr_FR), Instagram
               <br/>(https://www.instagram.com/about/legal/terms/), et Twitter (https://twitter.com/tos?lang=fr) et en
               <br/>accepter les termes, particulièrement en matière de réutilisation du Contenu et des données
               <br/>personnelles.
               <br/><br/><br/>Au titre de cette licence, ATHENA France, sans que cela ne crée à sa charge une obligation d’agir, est
               <br/>en droit de s’opposer à la reproduction et l’exploitation par des tiers non autorisés des Annonces
               <br/>diffusées sur le Site Internet et de leur Contenu.
               <br/><br/><br/>-    aux utilisateurs, le droit non exclusif d’accéder au Contenu via le Service ATHENA et d’utiliser et de
               <br/>représenter le Contenu dans la mesure autorisée par les fonctionnalités du Service ATHENA, et ce
               <br/>pour le monde entier. »
           </p>
           <br/><br/><br/>
           <h1>ARTICLE 7 : MODIFICATION DU SERVICE LEBONCOIN ET DES CGU</h1>
           <br/><br/>
           <p>
               7.1 ATHENA France se réserve le droit, à tout moment, de modifier ou interrompre l'accessibilité de
               <br/>tout ou partie du Service ATHENA et/ou du Site Internet.
               <br/><br/><br/>7.2 ATHENA FRANCE se réserve la possibilité de modifier, à tout moment, en tout ou partie des CGU.
               <br/>Les Utilisateurs et les Annonceurs sont invités à consulter régulièrement les présentes CGU afin de
               <br/>prendre connaissance de changements éventuels effectués. L'Utilisation du Site par les Utilisateurs et
               <br/>les Annonceurs constitue l'acceptation par ces derniers des modifications apportées aux CGU.
           </p>
           <br/><br/><br/>
           <h1>ARTICLE 8 : DISPOSITIONS DIVERSES</h1>
           <br/><br/><br/>
           <p>
               Si une partie des CGU devait s'avérer illégale, invalide ou inapplicable, pour quelle que raison que ce
               <br/>soit, les dispositions en question seraient réputées non écrites, sans remettre en cause la validité des
               <br/>autres dispositions qui continueront de s'appliquer entre les Utilisateurs ou les Annonceurs et
               <br/>ATHENA France.
               <br/><br/><br/><br/>
               Les présentes CGU sont soumises au droit français.
           </p>







       </div>
   </div>
</div>


<footer class="footer-index">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <p>2015 Company, Inc.</p>
            </div>
            <div class="col-md-6">
                <nav class="navbar">
                    <ul class="nav navbar-nav navbar-right ul-nav">
                        <li><a href="nous-contacter.php">Nous contacter</a></li>
                        <li><a href="qui_sommes_nous.php">Qui sommes-nous</a></li>
                        <li><a href="cgu.php">Conditions générales d'utilisations</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
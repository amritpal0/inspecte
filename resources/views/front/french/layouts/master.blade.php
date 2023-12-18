<!doctype html>
<html>
<head>
<meta charset="utf-8">
    
<title>Pro Inspected - L’inspection de votre véhicule en toute simplicité.</title>

<meta name="description" content="L’inspection de votre véhicule en toute simplicité. - Plus besoin d’avoir un stylo - Plus besoin d’acheter le calepin de rapports - Plus besoin d’imprimer les formulaires. Vous avez juste besoin de votre téléphone cellulaire avec internet, de choisir le forfait qui vous convient et de remplir vos informations personnelle ainsi que celle de votre véhicule. Vous voilà prêt à remplir la premère inspection de votre véhicule! Il ne sera plus nécessaire d’entrer vos informations et ou celle vôtre véhicule à chaque fois. Juste cocher les points vérifiés, mentionner et prendre en photos les éléments problématiques et voilà, le tour est joué! Si votre véhicule est en règle, en moins de 5 minutes vous serez prêts à rouler!" />

<meta name="copyright" content="Pro Inspected" />
<meta name="author" content="Applications Neltek" />
<meta name="Distribution" content="Global" />
<meta name="Rating" content="General" />
<meta name="Robots" content="INDEX, FOLLOW" />
<meta name="Revisit-after" content="1 Day" />

<!-- Mobile -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
<!-- CSS -->
<link href="{{asset('frontend/css/main.css')}}" type="text/css" rel="stylesheet" />
<link href="{{asset('frontend/css/normalize.css')}}" type="text/css" rel="stylesheet" />
    
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Fonts -->
<script src="https://kit.fontawesome.com/70036548ca.js" crossorigin="anonymous"></script>    

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&family=Smooch+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


<!-- General jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
	
<!-- SlideShow -->
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
	
<script type="text/javascript">

	$(document).ready(function() {
		$('.home_slider').cycle({
			fx: 'fade', 
			timeout:6000, 
			delay:-2000
		});
	});

</script>


<body>

    <header>

            <div class="wrapper">
            
            <h1>
                <a href="{{asset('')}}">
                    <img src="{{asset('frontend/img/Logo_Pro_Inspecte_en.png')}}"  alt="Pro Inspected - L’inspection de votre véhicule en toute simplicité." title="Pro Inspected - L’inspection de votre véhicule en toute simplicité.">
                </a>
            </h1>

            <div class="top_bar_social">

                <ul class="socials">

                    <li class="email"><a href="mailto:info@proinspecte.ca"><i class="fa-solid fa-paper-plane"></i> info@proinspecte.ca</a></li>
                    
                    <li><a href="login_fr.htm"><i class="fa-solid fa-lock"></i> Se connecter</a></li>

                    <li class="language"><a href="index_en.htm">EN</a></li>
                    <li class="social_media">
                        <a href="https://www.facebook.com/profile.php?id=61551373457607" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                        <a href="https://www.instagram.com/proinspecte" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="https://www.youtube.com" target="_blank"><i class="fa-brands fa-square-youtube"></i></a>
                    </li>

                </ul>

                <div class="clear_all"></div>

                <ul class="main_nav">

                    <li><a href="#about"><i class="fa-solid fa-briefcase"></i> Pro Inspecte</a></li>
                    <li><a href="#avantages"><i class="fa-solid fa-star"></i> Avantages</a></li>
                    <li class="forfaits"><a href="#forfaits"><i class="fa-solid fa-tag"></i> Nos Forfaits</a></li>
                    <li><a href="#contact"><i class="fa-solid fa-phone-volume"></i> Contact</a></li>

                </ul>

                
                
            </div>

            <div class="top_bar_social_mobile">

                <ul class="socials">
                    
                    <li><a href="login_fr.htm"><i class="fa-solid fa-lock"></i> Se connecter</a></li>

                    <li class="language"><a href="index_en.htm">EN</a></li>
                    
                    <li class="social_media">
                        <a href="https://www.facebook.com/profile.php?id=61551373457607" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                        <a href="https://www.instagram.com/proinspecte" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="https://www.youtube.com" target="_blank"><i class="fa-brands fa-square-youtube"></i></a>
                    </li>

                </ul>

                <div class="clear_all"></div>

                <ul class="main_nav">
                    
                    <li><a href="#about"><i class="fa-solid fa-briefcase"></i> Pro Inspecte</a></li>
                    <li><a href="#avantages"><i class="fa-solid fa-star"></i> Avantages</a></li>
                    <li class="forfaits"><a href="#forfaits"><i class="fa-solid fa-tag"></i> Nos Forfaits</a></li>
                    <li><a href="#contact"><i class="fa-solid fa-phone-volume"></i> Contact</a></li>

                </ul>
                
            </div>

        </div>

    </header>

@yield('content')

<footer>

        <div class="wrapper">
            
            <p><i class="fa-solid fa-copyright"></i> 2024 - Tous droits réservés. <i class="fa-solid fa-caret-right"></i> Nous respectons toutes les exigences de la <a href="https://saaq.gouv.qc.ca/" target="_blank">SAAQ</a> et de <a href="https://www.transports.gouv.qc.ca/fr/entreprises-partenaires/trpa/chauffeurs-proprietaires/Pages/chauffeurs-proprietaires.aspx" target="_blank">Transport Québec.</a></p>
            
            <div class="back2top"><a href="#" title="Retour à l'Accuei"><i class="fa-solid fa-circle-chevron-up"></i></a></div>

            <a href="https://neltekapps.ca/" target="_blank"><img src="img/logo_neltek.png" alt="Propulsé par Neltek" title="Propulsé par Neltek"></a>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@stack('custom-scripts')    

</body>

    
</html>
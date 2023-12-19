@extends('front.layouts.master')

@section('content')


<div class="clear_all"></div>

    <div class="home_slider"><div class="slider_01"><a href="#forfaits"></a></div></div>
    <div class="home_slider_mobile"><div class="slider_01"><a href="#forfaits"></a></div></div>

    <div class="clear_all"></div>

    <step_bar>

        <div class="wrapper">

            <ul>

                <li class="step_01">
                    <h3 class="number">1</h3>
                    <h3>Choisissez votre forfait</h3>
                    <p>Choisissez le forfait qui correspond le mieux à vos besoins. <i class="fa-solid fa-caret-right"></i></p>
                </li>

                <li class="step_02">
                    <h3 class="number">2</h3>
                    <h3>Ouvrez un nouveau compte <i class="fa-solid fa-caret-right"></i></h3>
                    <p>Après avoir choisi votre forfait, créez un nouveau compte.</p>
                </li>

                <li class="step_03">
                    <h3 class="number">3</h3>
                    <h3>Ajoutez vos véhicules</h3>
                    <p>Il ne vous reste qu’à ajouter vos véhicules et le tour est joué!</p>
                </li>

                <li class="presentation">
                    <a href="#"><img src="{{asset('frontend/img/btn_presentation.png')}}" alt="Voir la présentation" title="Voir la présentation"></a>
                </li>

            </ul>
        
        </div>

    </step_bar>
    
    <step_bar_mobile>
    
        <a href="#"><img src="{{asset('frontend/img/btn_presentation.png')}}" alt="Voir la présentation" title="Voir la présentation"></a>

    </step_bar_mobile>

    <div class="clear_all"></div>

    <welcome id="about">

        <div class="wrapper">
            
            <div class="text">
            
                <h2>L’inspection de votre véhicule en toute simplicité</h2>

                <ul>

                    <li><i class="fa-regular fa-circle-check"></i> Plus besoin d’avoir un stylo</li>
                    <li><i class="fa-regular fa-circle-check"></i> Plus besoin d’acheter le calepin de rapports</li>
                    <li><i class="fa-regular fa-circle-check"></i> Plus besoin d’imprimer les formulaires</li>

                </ul>

                <p>Vous avez juste besoin de votre téléphone cellulaire avec internet, de choisir le forfait qui vous convient et de remplir vos informations personnelle ainsi que celle de votre véhicule.</p>
                    
                <p>Vous voilà prêt à remplir la premère inspection de votre véhicule!</p>

                <p>Il ne sera plus nécessaire d’entrer vos informations et ou celle vôtre véhicule à chaque fois. Juste cocher les points vérifiés, mentionner et prendre en photos les éléments problématiques et voilà, le tour est joué!</p>

                <p class="quote_left"><i class="fa-solid fa-quote-left"></i> Si votre véhicule est en règle, en moins</p>
                <p class="quote_right">de 5 minutes vous serez prêts à rouler! <i class="fa-solid fa-quote-right"></i></p>

            </div>

            <img src="{{asset('frontend/img/demo_iphone.png')}}" alt="Démo Pro Inspecte" title="Démo Pro Inspecte">

        </div>

    </welcome>

    <div class="clear_all"></div>

    <avantages id="avantages">

        <div class="wrapper">

            <h2>les avantages, la facilité !</h2>

            <ul>

                <li>
                    <i class="fa-solid fa-sitemap"></i>
                    <h3>Interface utilisateur</h3>
                    <p>L’accès à une interface de gestion de profils, de véhicules et l’historique de rapports allant jusqu’à 90 jours.</p>
                </li>

                <li>
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <h3>Tout dans le nuage</h3>
                    <p>Plus besoin du calpin de rapports d’inspections, tout est  sauvegardé dans le nuage et accessible en ligne!</p>
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <h3>Un système intuitif</h3>
                    <p>Facil d’accès, facile à utiliser, facile à gérer et à exporter. Disponible à partir de votre appareil mobile préféré.</p>
                </li>

                <li>
                    <i class="fa-solid fa-piggy-bank"></i>
                    <h3>Extrêmement abordable</h3>
                    <p>À partir de seulement 3,99$ par mois! Aucun déplacement ni consommation d’éssence. Plus de calpin à acheter!</p>
                </li>

            </ul>

        </div>    

    </avantages>

    <div class="clear_all"></div>

    <forfaits id="forfaits">

        <div class="wrapper">

            <h2>Les forfaits</h2>

            <ul class="Forfaits">

            @foreach($packages as $key => $p)

            <li class="package_li">

                <img src="{{asset('uploads/packages/'.$p->image)}}" alt="{{$p->alt}}" title="{{$p->alt}}">

                <h2>{!! $p->french_name !!}</h2>
                
                <h3>{{$p->vehicle[0]->price}}$ <span class="months">/m</span></h3>
                <input type="hidden" name="package_id" class="package_id" value="{{$p->id}}">
                <input type="hidden" name="vehicle_id" class="vehicle_id" value="{{$p->vehicle[0]->id}}">
                <input type="hidden" name="vehicle_price" class="vehicle_price" value="{{$p->vehicle[0]->price}}">
                <input type="hidden" name="annual_price" class="annual_price" value="{{$p->vehicle[0]->annual_price}}">
                <ul class="options">
                    @foreach($p->vehicle as $v)
                    <li>{{$v->french_vehicle}}: ${{$v->price}} /mois</li>
                    @endforeach
                        
                    {!! $p->french_description !!}

                </ul>
                @if($p->id == 3)
                <div class="btn_forfaits corpo"><a href="#">Contact us now !</a></div>
                @else
                <div class="btn_forfaits"><a href="javascript:void(0)" class="monthly_btn">Get monthly pack</a></div>
                <div class="clear_all"></div>
                <div class="btn_forfaits_annuel"><a href="javascript:void(0)" class="annual_pack">Anual pack ({{$p->vehicle[0]->annual_price}}$)</a></div>
                @endif

            </li>
            @if($key < 2)
            <li class="sep_forfaits"></li>
            @endif
            @endforeach

            </ul>
            
        </div>

    </forfaits>

    <div class="clear_all"></div>

    <testimonials></testimonials>

    <div class="clear_all"></div>

    <contact id="contact">

        <div class="wrapper">

            <div class="about_neltek">
            
                <ul>

                    <li>

                        <img src="{{asset('frontend/img/neltek_propuls.png')}}" alt="Propulsé par Neltek" title="Propulsé par Neltek">

                        <p>Neltek est une entreprise familiale locale constituée d'une équipe avec plus de 25 ans d’expérience formée d'experts, de penseurs, d'innovateurs et d'idéalistes féroces qui créent des chefs-d'œuvre pratiques et intelligents avec une image explosive et une interactivité sans pareil.</p>

                        <p><i class="fa-solid fa-paperclip"></i> <a href="https://neltekapps.ca/" target="_blank">neltekapps.ca</a></p>

                        <ul>
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=61551373457607" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                                <a href="https://www.instagram.com/proinspecte" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                                <a href="https://www.youtube.com" target="_blank"><i class="fa-brands fa-square-youtube"></i></a>
                            </li>
                        </ul>

                    </li>

                </ul>

            </div>

            <div class="contact_info">
            
                <ul>

                <h3>Navigation <br><span class="title_color">Principale</span> <i class="fa-solid fa-bars"></i></h3>

                <ul>

                    <li><a href="#"><i class="fa-solid fa-house"></i> Accueil</a></li>
                    <li><a href="#about"><i class="fa-solid fa-briefcase"></i> Pro Inspecte</a></li>
                    <li><a href="#avantages"><i class="fa-solid fa-star"></i> Avantages</a></li>
                    <li><a href="#forfaits"><i class="fa-solid fa-tag"></i> Nos Forfaits</a></li>
                    
                </ul>

                <h3>Interface <br><span class="title_color">Utilisateur</span> <i class="fa-solid fa-sitemap"></i></h3>

                <ul>

                    <li><a href="login_fr.htm"><i class="fa-solid fa-lock"></i> Se connecter</a></li>

                </ul>

                <p>
                    <i class="fa-brands fa-cc-paypal"></i>
                    <i class="fa-brands fa-cc-visa"></i>
                    <i class="fa-brands fa-cc-mastercard"></i>
                    <i class="fa-brands fa-cc-amex"></i>
                    <i class="fa-solid fa-credit-card"></i>
                </p>

                </ul>

            </div>

            <div class="contact_form">
            
                <h3>Entrez <br><span class="title_color">en contact</span> <i class="fa-solid fa-right-from-bracket"></i></h3>

                <form id="contact-form" method="post" action="sendmail.php">
                
                    <input name="name" id="client_name" type="text" placeholder="Nom complet" required />
                    <input name="client_email" id="client_email" type="email" placeholder="Courriel" required />
                    <textarea name="message" id="client_message" placeholder="Message" required></textarea>
                    <input type="submit" id="contact_form" class="btn" value="Soumettre la demande" />
                
                </form>

            </div>

        </div>

    </contact>

    <div class="wrapper"></div>


@endsection

@push('custom-scripts')

<script>
    $('.monthly_btn').on('click', function(){
        var package_id = $(this).closest('.package_li').find('.package_id').val();
        var vehicle_id = $(this).closest('.package_li').find('.vehicle_id').val();
        var vehicle_price = $(this).closest('.package_li').find('.vehicle_price').val();
        $.ajax({
            type: "POST",
            url: "{{route('add_package')}}",
            data:{
                package_id: package_id,
                vehicle_id: vehicle_id,
                vehicle_price:vehicle_price
            },
            success:function(response){
                if(response.success == true){
                    if(response.owner == 1){
                        window.location.href = "{{route('register_owner')}}";
                    }else{
                        window.location.href = "{{route('register_driver')}}";
                    }
                }
            },
            error:function(response){
                console.log(response);
            }
        })
    })
    $('.annual_pack').on('click', function(){
        var package_id = $(this).closest('.package_li').find('.package_id').val();
        var vehicle_id = $(this).closest('.package_li').find('.vehicle_id').val();
        var vehicle_price = $(this).closest('.package_li').find('.annual_price').val();
        var is_annual = 1;
        $.ajax({
            type: "POST",
            url: "{{route('add_package')}}",
            data:{
                package_id: package_id,
                vehicle_id: vehicle_id,
                vehicle_price:vehicle_price,
                is_annual:is_annual
            },
            success:function(response){
                if(response.success == true){
                    if(response.owner == 1){
                        window.location.href = "{{route('register_owner')}}";
                    }else{
                        window.location.href = "{{route('register_driver')}}";
                    }
                }
            },
            error:function(response){
                console.log(response);
            }
        })
    })
</script>

@endpush
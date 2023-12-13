@extends('front.layouts.master')

@section('content')

<div class="clear_all"></div>

<div class="login">

    <div class="wrapper">
    
        <h2>Sign into your account</h2>
        <p>If you don't have an account yet, please choose <a href="#forfaits">the package</a> that beter suits your needs before connecting.</p>
        <form id="login_form">
            <p class="login_msg"></p>
        
            <label>Username</label>
            <input name="email" id="email" type="email" required />
            
            <label>Password</label>
            <input name="password" id="cliepasswordnt_email" type="password" required />
        
            <input class="btn_login" type="button" id="contact_form" value="Connectez-vous" />
                
       </form>

       <p class="pass_forget"><a href="#"><i class="fa-solid fa-caret-right"></i> Forgot password?</a></p>

    </div>

</div>

<div class="clear_all"></div>

<step_bar>

    <div class="wrapper">

        <ul>

            <li class="step_01">
                <h3 class="number">1</h3>
                <h3>Choose your package</h3>
                <p>Start by choosing the package that best suits your needs. <i class="fa-solid fa-caret-right"></i></p>
            </li>

            <li class="step_02">
                <h3 class="number">2</h3>
                <h3>OPEN A NEW ACCOUNT <i class="fa-solid fa-caret-right"></i></h3>
                <p>After choosing your package, create a new account.</p>
            </li>

            <li class="step_03">
                <h3 class="number">3</h3>
                <h3>ADD YOUR VEHICLES</h3>
                <p>All you have to do is add your vehicles and that’s it!</p>
            </li>

            <li class="presentation">
                <a href="#"><img src="{{asset('frontend/img/btn_presentation_en.png')}}" alt="See the presentation" title="See the presentation"></a>
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
        
            <h2>INSPECTING YOUR VEHICLE MADE SIMPLE</h2>

            <ul>

                <li><i class="fa-regular fa-circle-check"></i> No need to have a pen anymore</li>
                <li><i class="fa-regular fa-circle-check"></i> No need to buy the inspection booklet anymore
                </li>
                <li><i class="fa-regular fa-circle-check"></i> No need to print forms anymore</li>

            </ul>

            <p>You just need your cell phone with internet, choose the plan that suits you and fill in your personal information as well as that of your vehicle.</p>

            <p>You are now ready to complete the first inspection of your vehicle!</p>
                
            <p>It will no longer be necessary to enter your information and/or your vehicle each time. Just check the checked points, mention and take photos of the problematic elements and that's it, that's it!</p>

            <p class="quote_left"><i class="fa-solid fa-quote-left"></i> If your vehicle is in order, in less than 5</p>
            <p class="quote_right">minutes you will be ready to drive! <i class="fa-solid fa-quote-right"></i></p>

        </div>

        <img src="{{asset('frontend/img/demo_iphone_en.png')}}" alt="Démo Pro Inspecte" title="Démo Pro Inspecte">

    </div>

</welcome>

<div class="clear_all"></div>

<avantages id="avantages">

    <div class="wrapper">

        <h2>THE ADVANTAGES, THE EASY !</h2>

        <ul>

            <li>
                <i class="fa-solid fa-sitemap"></i>
                <h3>User Interface</h3>
                <p>Access to an interface for managing profiles, vehicles and history of your inspection reports of up to 90 days.</p>
            </li>

            <li>
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <h3>ALL IN THE CLOUD</h3>
                <p>No more need for an inspection reports booklet, everything is saved in the cloud and accessible online!</p>
            </li>

            <li>
                <i class="fa-solid fa-circle-check"></i>
                <h3>AN INTUITIVE SYSTEM</h3>
                <p>Easy to access, easy to use, easy to manage and export. Available from your favorite mobile devices.</p>
            </li>

            <li>
                <i class="fa-solid fa-piggy-bank"></i>
                <h3>EXTRÊMEMENT ABORDABLE</h3>
                <p>Starting at only $3.99 per month! No travel or gas consumption. No more inspection booklet to buy!</p>
            </li>

        </ul>

    </div>    

</avantages>

<div class="clear_all"></div>

<forfaits id="forfaits">

    <div class="wrapper">

        <h2>The Packages</h2>

        <ul class="Forfaits">

            <li>

                <img src="{{asset('frontend/img/auto_particulier.png')}}" alt="Pro Inspecte - Forfait Particulier" title="Pro Inspecte - Forfait Particulier">

                <h2><span class="le_forfait">Package</span> <br> The driver</h2>
                
                <h3>3.99$ <span class="months">/m</span></h3>
                
                <ul class="options">

                    <li>1st vehicle: $3.99 /month</li>
                    <li>2nd vehicle: $1.99 /month</li>
                        
                    <li class="options_espace underline">Unlimited inspection reports</li>
                        
                    <li class="options_espace">Limit: <span class="underline">Maximum 2 vehicles</span></li>
                    
                    <li><i class="fa-regular fa-circle-check"></i> Management interface</li>
                    <li><i class="fa-regular fa-circle-check"></i> Vehicle management</li>
                    <li><i class="fa-regular fa-circle-check"></i> Report history</li>

                </ul>

                <div class="btn_forfaits"><a href="#">I want this today !</a></div>

            </li>

            <li class="sep_forfaits"></li>

            <li>

                <img src="{{asset('frontend/img/auto_commercial.png')}}" alt="Pro Inspecte - Forfait Corporatif" title="Pro Inspecte - Forfait Commercial">

                <h2><span class="le_forfait">Package</span> <br> Commercial</h2>

                <h3 class="prix">29.99$ <span class="months">/m</span></h3>

                <ul class="options">
                
                    <li>5 véhicules: 29.99 $ /mois</li>
                    <li>Véhicules extras: 3.99 $ /mois</li>

                    <li class="options_espace underline">Unlimited inspection reports</li>
                        
                    <li class="options_espace">Limit: <span class="underline">Maximum 10 vehicles</span></li>
                    
                    <li><i class="fa-regular fa-circle-check"></i> Management interface</li>
                    <li><i class="fa-regular fa-circle-check"></i> Driver management</li>
                    <li><i class="fa-regular fa-circle-check"></i> Vehicle management</li>
                    <li><i class="fa-regular fa-circle-check"></i> Report history</li>

                </ul>

                <div class="btn_forfaits"><a href="#">I want this today !</a></div>

            </li>

            <li class="sep_forfaits"></li>

            <li class="corpo_limo">

                <img src="{{asset('frontend/img/auto_corporatif.png')}}" alt="Pro Inspecte - Forfait Corporatif" title="Pro Inspecte - Forfait Corporatif">

                <h2><span class="le_forfait">Package</span> <br> Corporate</h2>

                <h3 class="prix">59.99$ <span class="months">/m</span></h3>
                
                <ul class="options">

                <li>10 véhicules: 59.99 $ /mois</li>
                <li>Véhicules extras: 3.99 $ /mois</li>
                    
                <li class="options_espace underline">Unlimited inspection reports</li>
                
                <li><i class="fa-regular fa-circle-check"></i> All commercial plan options <i class="fa-solid fa-arrow-turn-down"></i></li>
                <li><i class="fa-regular fa-circle-check"></i> We take care of the opening and activation of the account in person. This includes vehicle additions and removals.</li>
                </ul>

                <div class="btn_forfaits corpo"><a href="#">Contact us now !</a></div>

            </li>

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

                    <img src="{{asset('frontend/img/neltek_propuls_en.png')}}" alt="Propelled by Neltek" title="Propelled by Neltek">

                    <p>Neltek is a local family business made up of a team with over 25 years of experience made up of experts, thinkers, innovators and fierce idealists who create practical and intelligent masterpieces with an explosive image and unparalleled interactivity.</p>

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

            <h3>Main <br><span class="title_color">Navigation</span> <i class="fa-solid fa-bars"></i></h3>

            <ul>

                <li><a href="#"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="#about"><i class="fa-solid fa-briefcase"></i> Pro Inspecte</a></li>
                <li><a href="#avantages"><i class="fa-solid fa-house"></i> Features</a></li>
                <li><a href="#forfaits"><i class="fa-solid fa-tag"></i> Packages</a></li>
                
            </ul>

            <h3>User<br><span class="title_color">Interface</span> <i class="fa-solid fa-sitemap"></i></h3>

            <ul>

                <li><a href="#"><i class="fa-solid fa-lock"></i> Sign in here</a></li>

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
        
            <h3>Get <br><span class="title_color">in touch</span> <i class="fa-solid fa-right-from-bracket"></i></h3>

            <form id="contact-form" method="post" action="sendmail.php">
            
                <input name="name" id="client_name" type="text" placeholder="Full name" required />
                <input name="client_email" id="client_email" type="email" placeholder="Email" required />
                <textarea name="message" id="client_message" placeholder="Message" required></textarea>
                <input type="submit" id="contact_form" class="btn" value="Send request" />
            
            </form>

        </div>

    </div>

</contact>

<div class="wrapper"></div>

@endsection


@push('custom-scripts')

<script>
        $("#login_form").validate({
        rules: {
            email: {
                required: true
            },
            password: {
                required: true
            },
        },
        messages: {
            email: {
                required: "This field is required."
            },
            password: {
                required: "This field is required."
            },
        },
    });

    $('.btn_login').on('click', function(){
        $('.login_msg').empty();
        if($("#login_form").valid()){
            $.ajax({
                type: "POST",
                url: "{{route('sign_in')}}",
                data: $('#login_form').serialize(),
                success:function(response){
                    if(response.success == true){
                        window.location.href = "{{route('inspecte_form')}}";
                    }else{
                        $('.login_msg').text(response.msg);
                    }
                },
                error:function(response){
                    console.log(response);
                }
            })
        }
    })    
</script>

@endpush
@extends('front.layouts.master')

@section('content')


<div class="clear_all"></div>

<div class="home_slider_en"><div class="slider_01"><a href="#forfaits"></a></div></div>
<div class="home_slider_mobile_en"><div class="slider_01"><a href="#forfaits"></a></div></div>

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

        @foreach($packages as $key => $p)

        <li class="package_li">

            <img src="{{asset('uploads/packages/'.$p->image)}}" alt="{{$p->alt}}" title="{{$p->alt}}">

            <h2><span class="le_forfait">Package</span> <br> {{$p->name}}</h2>
            
            <h3>{{$p->vehicle[0]->price}}$ <span class="months">/m</span></h3>
            <input type="hidden" class="package_id" value="{{$p->id}}">
            <input type="hidden" class="vehicle_id" value="{{$p->vehicle[0]->id}}">
            <input type="hidden" class="vehicle_price" value="{{$p->vehicle[0]->price}}">
            <ul class="options">
                @foreach($p->vehicle as $v)
                <li>{{$v->vehicle}}: ${{$v->price}} /month</li>
                @endforeach
                    
                {!! $p->description !!}

            </ul>
            @if($p->id == 3)
            <div class="btn_forfaits corpo"><a href="#">Contact us now !</a></div>
            @else
            <div class="btn_forfaits"><a href="javascript:void(0)" class="monthly_btn">Get monthly pack</a></div>
            <div class="clear_all"></div>
            <div class="btn_forfaits_annuel"><a href="#">Anual pack ({{$p->annual_price}}$)</a></div>
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
                    window.location.href = "{{route('register_driver')}}";
                }
            },
            error:function(response){
                console.log(response);
            }
        })
    })
</script>

@endpush
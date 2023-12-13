<!doctype html>
<html>
<head>
<meta charset="utf-8">
    
<title>Pro Inspected - L’inspection de votre véhicule en toute simplicité.</title>

<meta name="description" content="Inspection of your vehicle made easy. - No more need to have a pen - No more need to buy the report notebook - No more need to print the forms. You just need your cell phone with internet, choose the plan that suits you and fill in your personal information as well as that of your vehicle. You are now ready to complete the first inspection of your vehicle! It will no longer be necessary to enter your information and/or your vehicle each time. Just check the checked points, mention and take photos of the problematic elements and that's it, that's it! If your vehicle is in order, in less than 5 minutes you will be ready to drive!" />

<meta name="copyright" content="Pro Inspected" />
<meta name="author" content="Applications Neltek" />
<meta name="Distribution" content="Global" />
<meta name="Rating" content="General" />
<meta name="Robots" content="INDEX, FOLLOW" />
<meta name="Revisit-after" content="1 Day" />
<meta name="csrf-token" content="{{ csrf_token() }}" />


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


<body class="inspected_form">

    <profile_section>

        <h1>
            <a href="{{asset('')}}">
                <img src="{{asset('frontend/img/Logo_Pro_Inspecte_en.png')}}" alt="Pro Inspected - the inspection of your vehicule in total simplicity." title="Pro Inspected - the inspection of your vehicule in total simplicity.">
            </a> 
        </h1>
        <h2>Driver's profile</h2>
        <p>Please complete the information below for <span class="underline"></span>every new vehicule you register.</span></p>

        <form id="car_registration">
            
            <label><i class="fa-solid fa-car"></i> Vehicle information</label>
            <input name="registration" id="registration" type="text" placeholder="Vehicle registration" required />
            <input name="brand" id="brand" type="text" placeholder="Vehicle brand" required />
            <input name="model" id="model" type="text" placeholder="Vehicle model" required />
            <input name="year" id="year" type="text" placeholder="Vehicle year" required />
            
        </form>
        
        <form id="accessory_form">

            <label><i class="fa-solid fa-id-card-clip"></i> Permit</label>
            <input name="accessory_number" id="accessory_number" type="text" placeholder="Government Accessory Number" required />
            
            <div class="electric">

                <label><i class="fa-solid fa-bolt"></i> Electric vehicles</label>

                <p>Ccheck if your vehicle is electric.</p>
                <p>You will need to fill out the battery percentage in the inspection form.</p>
                <input type="checkbox" value="None" id="" name="electric" /> Electric vehicles
            </div>

        </form>
        
        <input class="btn_profile submit" type="button" id="contact_form" value="Save now" />

        <div class="clear_all"></div>
    
    </profile_section>    

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#car_registration").validate({
        rules: {
            registration: {
                required: true
            },
            brand: {
                required: true
            },
            model: {
                required: true
            },
            year: {
                required: true
            },
        },
        messages: {
            registration: {
                required: "This field is required."
            },
            brand: {
                required: "This field is required."
            },
            model: {
                required: "This field is required."
            },
            year: {
                required: "This field is required."
            },
        },
    });

    $("#accessory_form").validate({
        rules: {
            accessory_number: {
                required: true
            }
        },
        messages: {
            accessory_number: {
                required: "This field is required."
            },
        },
    });


    $('.submit').on('click', function(){
        if($("#car_registration").valid() && $("#accessory_form").valid()){
            $.ajax({
                type: "POST",
                url: "{{route('car_register')}}",
                data: $('#car_registration, #accessory_form').serialize(),
                success:function(response){
                    if(response.success == true){
                        window.location.href = "{{asset('')}}";
                    }
                },
                error:function(response){
                    console.log(response);
                }
            })
        }
    })
</script> 
    
</body>
    
</html>
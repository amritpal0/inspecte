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
        <p>Please complete the information with that appearing <span class="underline"> on your valid driving license.</span></p>

        <form id="driver_form">
            <p class="register_msg" style="color:red"></p>
            <label><i class="fa-solid fa-circle-user"></i> Personal information</label>
            <input name="first_name" id="first_name" type="text" placeholder="First name" required />
            <input name="last_name" id="last_name" type="text" placeholder="Last name" required />
            <input name="email" id="email" type="email" placeholder="Email" required />
            <input name="phone" id="phone" type="text" placeholder="Phone number" required />
            <input name="business_phone" id="business_phone" type="text" placeholder="Business phone number" />
            
            <label><i class="fa-solid fa-taxi"></i> Authorized driver</label>
            <input name="license" id="license" type="text" placeholder="Authorized driver license number" required />
            
            <label><i class="fa-solid fa-lock"></i> Password</label>
            <input name="password" id="password" type="password" placeholder="Password" required />
            <input name="confirm_password" id="confirm_password" type="password" placeholder="Confirm password" required />
            
        </form>

        <form class="address_profile" id="address_profile">
            
            <label><i class="fa-solid fa-location-dot"></i> Valid address</label>
            <input name="civic_number" id="civic_number" type="text" placeholder="Civic number" required />
            <input name="street" id="street" type="text" placeholder="Street" required />
            <input name="appartment" id="appartment" type="text" placeholder="Apartment" required />
            <input name="city" id="city" type="text" placeholder="City" required />
            <input name="pincode" id="pincode" type="text" placeholder="Postal code" required />
            <input name="countryname" id="countryname" type="text" placeholder="Country" required />
            
        </form>
        
        <input class="btn_profile driver_register" type="button" id="contact_form" value="Save Now" />

        <div class="clear_all"></div>
    
    </profile_section>    


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#driver_form").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            phone: {
                required: true
            },
            email: {
                required: true
            },
            business_phone: {
                required: true
            },
            license: {
                required: true
            },
            password: {
                required: true
            },
            confirm_password: {
                required: true
            },
        },
        messages: {
            first_name: {
                required: "This field is required."
            },
            last_name: {
                required: "This field is required."
            },
            phone: {
                required: "This field is required."
            },
            email: {
                required: "This field is required."
            },
            business_phone: {
                required: "This field is required."
            },
            license: {
                required: "This field is required."
            },
            password: {
                required: "This field is required."
            },
            confirm_password: {
                required: "This field is required."
            },
        },
    });

    $("#address_profile").validate({
        rules: {
            countryname: {
                required: true
            },
            pincode: {
                required: true
            },
            city: {
                required: true
            },
            appartment: {
                required: true
            },
            street: {
                required: true
            },
            civic_number: {
                required: true
            },
        },
        messages: {
            countryname: {
                required: "This field is required."
            },
            pincode: {
                required: "This field is required."
            },
            city: {
                required: "This field is required."
            },
            appartment: {
                required: "This field is required."
            },
            street: {
                required: "This field is required."
            },
            civic_number: {
                required: "This field is required."
            },
        },
    });


    $('.driver_register').on('click', function(){
        $('.register_msg').empty();
        if($("#driver_form").valid() && $("#address_profile").valid()){
            $.ajax({
                type: "POST",
                url: "{{route('driver_register')}}",
                data: $('#driver_form, .address_profile').serialize(),
                success:function(response){
                    if(response.success == true){
                        window.location.href = "{{route('car_register_form')}}";
                    }
                    else{
                        alert(response.msg);
                        // $('.register_msg').text(response.msg);
                    }
                },
                error:function(response){
                    
                    alert('Something went wrong.');
                }
            })
        }
    })
</script>
    
</body>

    
</html>
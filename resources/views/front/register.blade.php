@extends('front.layouts.master')

@section('content')


    <profile_section>

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

@endsection
@push('custom-scripts')
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
@endpush
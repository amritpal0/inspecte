@extends('front.layouts.master')

@section('content')


<profile_section class="add-driver">


<h2>Comercial Driver's Assigned profile</h2>
<p>Please complete the information with that appearing <span class="underline"> on your valid driving license.</span></p>

<div class="collaps-div">
    <button class="collapsible" onclick="toggleSection(1)">First Driver</button>
    <div class="content" id="section1" style="display: block;">
        <form id="driver_form1">
        
            <label><i class="fa-solid fa-circle-user"></i> Personal information</label>
            <input name="first_name" id="client_name" type="text" placeholder="First name" required />
            <input name="last_name" id="client_name" type="text" placeholder="Last name" required />
            <input name="email" id="client_name" type="email" placeholder="Email" required />
            <input name="phone" id="client_name" type="text" placeholder="Phone number" required />
            <input name="business_phone" id="client_name" type="text" placeholder="Business phone number" />
            
            <label><i class="fa-solid fa-taxi"></i> Authorized driver</label>
            <input name="driver_no" id="client_name" type="text" placeholder="Assigned driver number" required />
            <input name="license" id="client_name" type="text" placeholder="Authorized driver's license number - SAAQ" required />
            
        </form>

        <form class="address_profile1" id="address_profile1">
            
            <label><i class="fa-solid fa-location-dot"></i> Valid address</label>
            <input name="address" id="client_name" type="text" placeholder="Address" required />
            <input name="appartment" id="client_name" type="text" placeholder="Apartment" required />
            <input name="city" id="client_name" type="text" placeholder="City" required />
            <input name="pincode" id="client_name" type="text" placeholder="Postal code" required />
            <input name="countryname" id="client_name" type="text" placeholder="Country" required />
            
            <label><i class="fa-solid fa-lock"></i> Password</label>
            <input name="password" id="client_name" type="password" placeholder="Password" required />
            <input name="confirm_password" id="client_name" type="password" placeholder="Confirm password" required />

        </form>
    </div>
</div>

<div class="collaps-div">
    <button class="collapsible" onclick="toggleSection(2)">Second Driver</button>
    <div class="content" id="section2" style="display: none;" >
        <form id="driver_form2">
        
            <label><i class="fa-solid fa-circle-user"></i> Personal information</label>
            <input name="first_name" id="client_name" type="text" placeholder="First name" required />
            <input name="last_name" id="client_name" type="text" placeholder="Last name" required />
            <input name="email" id="client_name" type="email" placeholder="Email" required />
            <input name="phone" id="client_name" type="text" placeholder="Phone number" required />
            <input name="business_phone" id="client_name" type="text" placeholder="Business phone number" />
            
            <label><i class="fa-solid fa-taxi"></i> Authorized driver</label>
            <input name="driver_no" id="client_name" type="text" placeholder="Assigned driver number" required />
            <input name="license" id="client_name" type="text" placeholder="Authorized driver's license number - SAAQ" required />
            
        </form>

        <form class="address_profile2" id="address_profile2">
            
            <label><i class="fa-solid fa-location-dot"></i> Valid address</label>
            <input name="address" id="client_name" type="text" placeholder="Address" required />
            <input name="appartment" id="client_name" type="text" placeholder="Apartment" required />
            <input name="city" id="client_name" type="text" placeholder="City" required />
            <input name="pincode" id="client_name" type="text" placeholder="Postal code" required />
            <input name="countryname" id="client_name" type="text" placeholder="Country" required />
            
            <label><i class="fa-solid fa-lock"></i> Password</label>
            <input name="password" id="client_name" type="password" placeholder="Password" required />
            <input name="confirm_password" id="client_name" type="password" placeholder="Confirm password" required />

        </form>
    </div>
</div>

<div class="collaps-div">
    <button class="collapsible" onclick="toggleSection(3)">Third Driver</button>
    <div class="content" id="section3"  style="display: none;">
        <form id="driver_form3">
        
            <label><i class="fa-solid fa-circle-user"></i> Personal information</label>
            <input name="first_name" id="client_name" type="text" placeholder="First name" required />
            <input name="last_name" id="client_name" type="text" placeholder="Last name" required />
            <input name="email" id="client_name" type="email" placeholder="Email" required />
            <input name="phone" id="client_name" type="text" placeholder="Phone number" required />
            <input name="business_phone" id="client_name" type="text" placeholder="Business phone number" />
            
            <label><i class="fa-solid fa-taxi"></i> Authorized driver</label>
            <input name="driver_no" id="client_name" type="text" placeholder="Assigned driver number" required />
            <input name="license" id="client_name" type="text" placeholder="Authorized driver's license number - SAAQ" required />
            
        </form>

        <form class="address_profile3" id="address_profile3">
            
            <label><i class="fa-solid fa-location-dot"></i> Valid address</label>
            <input name="address" id="client_name" type="text" placeholder="Address" required />
            <input name="appartment" id="client_name" type="text" placeholder="Apartment" required />
            <input name="city" id="client_name" type="text" placeholder="City" required />
            <input name="pincode" id="client_name" type="text" placeholder="Postal code" required />
            <input name="countryname" id="client_name" type="text" placeholder="Country" required />
            
            <label><i class="fa-solid fa-lock"></i> Password</label>
            <input name="password" id="client_name" type="password" placeholder="Password" required />
            <input name="confirm_password" id="client_name" type="password" placeholder="Confirm password" required />

        </form>
    </div>
</div>

<div class="collaps-div">
    <button class="collapsible" onclick="toggleSection(4)">Forth Driver</button>
    <div class="content" id="section4"  style="display: none;">
        <form id="driver_form4">
        
            <label><i class="fa-solid fa-circle-user"></i> Personal information</label>
            <input name="first_name" id="client_name" type="text" placeholder="First name" required />
            <input name="last_name" id="client_name" type="text" placeholder="Last name" required />
            <input name="email" id="client_name" type="email" placeholder="Email" required />
            <input name="phone" id="client_name" type="text" placeholder="Phone number" required />
            <input name="business_phone" id="client_name" type="text" placeholder="Business phone number" />
            
            <label><i class="fa-solid fa-taxi"></i> Authorized driver</label>
            <input name="driver_no" id="client_name" type="text" placeholder="Assigned driver number" required />
            <input name="license" id="client_name" type="text" placeholder="Authorized driver's license number - SAAQ" required />
            
        </form>

        <form class="address_profile4" id="address_profile4">
            
            <label><i class="fa-solid fa-location-dot"></i> Valid address</label>
            <input name="address" id="client_name" type="text" placeholder="Address" required />
            <input name="appartment" id="client_name" type="text" placeholder="Apartment" required />
            <input name="city" id="client_name" type="text" placeholder="City" required />
            <input name="pincode" id="client_name" type="text" placeholder="Postal code" required />
            <input name="countryname" id="client_name" type="text" placeholder="Country" required />
            
            <label><i class="fa-solid fa-lock"></i> Password</label>
            <input name="password" id="client_name" type="password" placeholder="Password" required />
            <input name="confirm_password" id="client_name" type="password" placeholder="Confirm password" required />

        </form>
    </div>
</div>

<div class="collaps-div">
    <button class="collapsible" onclick="toggleSection(5)">Fivth Driver</button>
    <div class="content" id="section5" style="display: none;" >
        <form id="driver_form5">
        
            <label><i class="fa-solid fa-circle-user"></i> Personal information</label>
            <input name="first_name" id="client_name" type="text" placeholder="First name" required />
            <input name="last_name" id="client_name" type="text" placeholder="Last name" required />
            <input name="email" id="client_name" type="email" placeholder="Email" required />
            <input name="phone" id="client_name" type="text" placeholder="Phone number" required />
            <input name="business_phone" id="client_name" type="text" placeholder="Business phone number" />
            
            <label><i class="fa-solid fa-taxi"></i> Authorized driver</label>
            <input name="driver_no" id="client_name" type="text" placeholder="Assigned driver number" required />
            <input name="license" id="client_name" type="text" placeholder="Authorized driver's license number - SAAQ" required />
            
        </form>

        <form class="address_profile5" id="address_profile5">
            
            <label><i class="fa-solid fa-location-dot"></i> Valid address</label>
            <input name="address" id="client_name" type="text" placeholder="Address" required />
            <input name="appartment" id="client_name" type="text" placeholder="Apartment" required />
            <input name="city" id="client_name" type="text" placeholder="City" required />
            <input name="pincode" id="client_name" type="text" placeholder="Postal code" required />
            <input name="countryname" id="client_name" type="text" placeholder="Country" required />
            
            <label><i class="fa-solid fa-lock"></i> Password</label>
            <input name="password" id="client_name" type="password" placeholder="Password" required />
            <input name="confirm_password" id="client_name" type="password" placeholder="Confirm password" required />

        </form>
    </div>
</div>

<input class="btn_profile add_driver" type="button" id="contact_form" value="Save Now" />

<div class="clear_all"></div>

</profile_section> 


@endsection
@push('custom-scripts')
<script>

    function toggleSection(sectionNumber) { 
        var section = document.getElementById('section' + sectionNumber);
        if (section.style.display === 'block') {
            section.style.display = 'none';
        } else {
            section.style.display = 'block';
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.add_driver').on('click', function(){
        var valid = true;

        $('.collaps-div:visible').each(function () {
            var sectionNumber = $(this).find('.collapsible').attr('onclick').match(/\d+/)[0]; 
            var carForm = $(this).find('form#driver_form' + sectionNumber);
            var accessoryForm = $(this).find('form#address_profile' + sectionNumber);
            if (!carForm.valid() || !accessoryForm.valid()) {
                valid = false;
                alert('Please fill all the fields.');
            }
        }); 
        if(valid){
            var formDataArray = [];

            $('.collaps-div:visible').each(function () {
                var sectionNumber = $(this).find('.collapsible').attr('onclick').match(/\d+/)[0];

                var formData = $(this).find('form#driver_form' + sectionNumber + ', form#address_profile' + sectionNumber).serializeArray();

                formDataArray.push(formData);
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_driver')}}",
                data: { formDataArray: formDataArray },
                success:function(response){
                    if(response.success == true){
                        window.location.href = "{{asset('')}}";
                    }
                    else{
                        alert(response.msg);
                        // $('.register_msg').text(response.msg);
                    }
                },
                error:function(response){
                    
                    alert(response.msg);
                }
            })
        }
    })
</script>
@endpush
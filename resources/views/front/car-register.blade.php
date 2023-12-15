
@extends('front.layouts.master')

@section('content')


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

@endsection
@push('custom-scripts')

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

@endpush

@extends('front.layouts.master')

@section('content')


    <profile_section class="owner-page">

        <h1>
            <a href="{{asset('')}}">
                <img src="{{asset('frontend/img/Logo_Pro_Inspecte_en.png')}}" alt="Pro Inspected - the inspection of your vehicule in total simplicity." title="Pro Inspected - the inspection of your vehicule in total simplicity.">
            </a> 
        </h1>
        <h2>Driver's profile</h2>
        <p>Please complete the information below for <span class="underline"></span>every new vehicule you register.</span></p>

        <div class="collaps-div">
            <button class="collapsible" onclick="toggleSection(1)">First Vehicle</button>
            <div class="content" id="section1" style="display: block;">
                <form id="car_registration1">
                
                    <label><i class="fa-solid fa-car"></i> Vehicle information</label>
                    <input name="registration[]" id="registration" type="text" placeholder="Vehicle registration" required />
                    <input name="brand[]" id="brand" type="text" placeholder="Vehicle brand" required />
                    <input name="model[]" id="model" type="text" placeholder="Vehicle model" required />
                    <input name="year[]" id="year" type="text" placeholder="Vehicle year" required />
                    
                </form>
                
                <form id="accessory_form1">

                    <label><i class="fa-solid fa-id-card-clip"></i> Permit</label>
                    <input name="accessory_number[]" id="accessory_number" type="text" placeholder="Government Accessory Number" required />
                    
                    <div class="electric">

                        <label><i class="fa-solid fa-bolt"></i> Electric vehicles</label>

                        <p>Ccheck if your vehicle is electric.</p>
                        <p>You will need to fill out the battery percentage in the inspection form.</p>
                        <input type="checkbox" value=1 id="electric1" name="electric[]" /> Electric vehicles
                    </div>

                </form>
            </div>
        </div>

        <div class="collaps-div">
            <button class="collapsible" onclick="toggleSection(2)">Second Vehicle</button>
            <div class="content" id="section2" style="display: none;">
                <form id="car_registration2">
                
                    <label><i class="fa-solid fa-car"></i> Vehicle information</label>
                    <input name="registration[]" id="registration" type="text" placeholder="Vehicle registration" required />
                    <input name="brand[]" id="brand" type="text" placeholder="Vehicle brand" required />
                    <input name="model[]" id="model" type="text" placeholder="Vehicle model" required />
                    <input name="year[]" id="year" type="text" placeholder="Vehicle year" required />
                    
                </form>
                
                <form id="accessory_form2">

                    <label><i class="fa-solid fa-id-card-clip"></i> Permit</label>
                    <input name="accessory_number[]" id="accessory_number" type="text" placeholder="Government Accessory Number" required />
                    
                    <div class="electric">

                        <label><i class="fa-solid fa-bolt"></i> Electric vehicles</label>

                        <p>Ccheck if your vehicle is electric.</p>
                        <p>You will need to fill out the battery percentage in the inspection form.</p>
                        <input type="checkbox" value=1 id="electric2" name="electric[]" /> Electric vehicles
                    </div>

                </form>
            </div>
        </div>

        <div class="collaps-div">
            <button class="collapsible" onclick="toggleSection(3)">Third Vehicle</button>
            <div class="content" id="section3" style="display: none;">
                <form id="car_registration3">
                
                    <label><i class="fa-solid fa-car"></i> Vehicle information</label>
                    <input name="registration[]" id="registration" type="text" placeholder="Vehicle registration" required />
                    <input name="brand[]" id="brand" type="text" placeholder="Vehicle brand" required />
                    <input name="model[]" id="model" type="text" placeholder="Vehicle model" required />
                    <input name="year[]" id="year" type="text" placeholder="Vehicle year" required />
                    
                </form>
                
                <form id="accessory_form3">

                    <label><i class="fa-solid fa-id-card-clip"></i> Permit</label>
                    <input name="accessory_number[]" id="accessory_number" type="text" placeholder="Government Accessory Number" required />
                    
                    <div class="electric">

                        <label><i class="fa-solid fa-bolt"></i> Electric vehicles</label>

                        <p>Ccheck if your vehicle is electric.</p>
                        <p>You will need to fill out the battery percentage in the inspection form.</p>
                        <input type="checkbox" value=1 id="electric3" name="electric[]" /> Electric vehicles
                    </div>

                </form>
            </div>
        </div>

        <div class="collaps-div">
            <button class="collapsible" onclick="toggleSection(4)">Forth Vehicle</button>
            <div class="content" id="section4" style="display: none;">
                <form id="car_registration4">
                
                    <label><i class="fa-solid fa-car"></i> Vehicle information</label>
                    <input name="registration[]" id="registration" type="text" placeholder="Vehicle registration" required />
                    <input name="brand[]" id="brand" type="text" placeholder="Vehicle brand" required />
                    <input name="model[]" id="model" type="text" placeholder="Vehicle model" required />
                    <input name="year[]" id="year" type="text" placeholder="Vehicle year" required />
                    
                </form>
                
                <form id="accessory_form4">

                    <label><i class="fa-solid fa-id-card-clip"></i> Permit</label>
                    <input name="accessory_number[]" id="accessory_number" type="text" placeholder="Government Accessory Number" required />
                    
                    <div class="electric">

                        <label><i class="fa-solid fa-bolt"></i> Electric vehicles</label>

                        <p>Ccheck if your vehicle is electric.</p>
                        <p>You will need to fill out the battery percentage in the inspection form.</p>
                        <input type="checkbox" value=1 id="electric4" name="electric[]" /> Electric vehicles
                    </div>

                </form>
            </div>
        </div>

        <div class="collaps-div">
            <button class="collapsible" onclick="toggleSection(5)">Fivth Vehicle</button>
            <div class="content" id="section5" style="display: none;">
                <form id="car_registration5">
                
                    <label><i class="fa-solid fa-car"></i> Vehicle information</label>
                    <input name="registration[]" id="registration" type="text" placeholder="Vehicle registration" required />
                    <input name="brand[]" id="brand" type="text" placeholder="Vehicle brand" required />
                    <input name="model[]" id="model" type="text" placeholder="Vehicle model" required />
                    <input name="year[]" id="year" type="text" placeholder="Vehicle year" required />
                    
                </form>
                
                <form id="accessory_form5">

                    <label><i class="fa-solid fa-id-card-clip"></i> Permit</label>
                    <input name="accessory_number[]" id="accessory_number" type="text" placeholder="Government Accessory Number" required />
                    
                    <div class="electric">

                        <label><i class="fa-solid fa-bolt"></i> Electric vehicles</label>

                        <p>Ccheck if your vehicle is electric.</p>
                        <p>You will need to fill out the battery percentage in the inspection form.</p>
                        <input type="checkbox" value=1 id="electric5" name="electric[]" /> Electric vehicles
                    </div>

                </form>
            </div>
        </div>
        
        
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

    function toggleSection(sectionNumber) {
        var section = document.getElementById('section' + sectionNumber);
        if (section.style.display === 'block') {
            section.style.display = 'none';
        } else {
            section.style.display = 'block';
        }
    }

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

        var valid = true;

        $('.collaps-div:visible').each(function () {
            var sectionNumber = $(this).find('.collapsible').attr('onclick').match(/\d+/)[0]; 
            var carForm = $(this).find('form#car_registration' + sectionNumber);
            var accessoryForm = $(this).find('form#accessory_form' + sectionNumber);

            if (!carForm.valid() || !accessoryForm.valid()) {
                valid = false;
                alert('Please fill all the fields.');
            }
        });

        if(valid){
            var formDataArray = [];

            $('.collaps-div:visible').each(function () {
                var sectionNumber = $(this).find('.collapsible').attr('onclick').match(/\d+/)[0];

                var formData = $(this).find('form#car_registration' + sectionNumber + ', form#accessory_form' + sectionNumber).serializeArray();

                formDataArray.push(formData);
            });
            
            $.ajax({
                type: "POST",
                url: "{{route('car_register')}}",
                data: { formDataArray: formDataArray },
                success:function(response){
                    if(response.success == true){
                        window.location.href = "{{route('add_driver_form')}}";
                    }else{
                        alert(response.msg);
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
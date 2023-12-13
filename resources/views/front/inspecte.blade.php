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

    <interface>
    
        <h1>
            <a href="{{asset('')}}">
                <img src="{{asset('frontend/img/Logo_Pro_Inspecte_en.png')}}" alt="Pro Inspected - the inspection of your vehicule in total simplicity." title="Pro Inspected - the inspection of your vehicule in total simplicity.">
            </a> 
        </h1>
        <div class="car_01"></div>
        <div class="car_02"></div>

        <div class="clear_all"></div>

        <div class="id_user">

            <ul>
                <li><i class="fa-solid fa-circle-user"></i> {{@$data->first_name}} {{@$data->last_name}}</li>
                <li><i class="fa-solid fa-car-rear"></i> {{@$data->registration}}</li>
                <li><i class="fa-solid fa-taxi"></i> Authorized driver's license num.: <span class="permis">{{@$data->license}}</span></li>
                <li><i class="fa-solid fa-id-card-clip"></i> Government accessory num.: <span class="permis">{{@$data->accessory_number}}</span></li>
                <li><i class="fa-solid fa-calendar-days"></i> {{date('d/m/y')}}</li>
                <li><i class="fa-solid fa-clock"></i> <span id="current-time"></span></li>
                <li><i class="fa-solid fa-gauge"></i> 181230 Km</li>
                @if($data->electric)
                <li><i class="fa-solid fa-battery-three-quarters"></i> 87% (Vehicule)</li>
                @endif

            </ul>


        </div>

        <div class="clear_all"></div>

        <div class="right_side">

            <form>

                <h2>INSPECTION OF YOUR VEHICLE. <span class="underline"> CHECK THE DEFECTS FOUND.</span></h2>
            
                <h3><span class="green">Facing the vehicle</span></h3>

                <ul>

                    <li>Left headlights <input type="checkbox" value="None" id="" name="check" /></li>
                    <li>Right headlights <input type="checkbox" value="None" id="" name="check" /></li>
                    <li>Left turn signals <input type="checkbox" value="None" id="" name="check" /></li>
                    <li>Right turn signals <input type="checkbox" value="None" id="" name="check" /></li>

                </ul>
                
                <h3><span class="green">Rear of vehicle</span></h3>
                
                <ul>
                    
                    <li>Phares gauches <input type="checkbox" value="None" id="" name="check" /></li>
                    <li>Phares droits <input type="checkbox" value="None" id="" name="check" /></li> 
                    <li>Clignotants gauches <input type="checkbox" value="None" id="" name="check" /></li>
                    <li>Clignotants droits <input type="checkbox" value="None" id="" name="check" /></li>
                    <li>Lumière freins gauche <input type="checkbox" value="None" id="" name="check" /></li>
                    <li>Lumière freins droits <input type="checkbox" value="None" id="" name="check" /></li>
                    <li>Lumière plaque <input type="checkbox" value="None" id="" name="check" /></li>
                    
                </ul>
                
            </form>


        </div>
        
        <div class="left_side">

            <form>
            
                <h3><span class="green">Right side of vehicle</span></h3>

                <ul>

                    <li><input type="checkbox" value="None" id="" name="check" /> Side mirror</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Front right tire</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Right rear tire</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Right tire valves</li>
                    
                </ul>
                
                <h3><span class="green">Left side of vehicle</span></h3>
                
                <ul>
                    
                    <li><input type="checkbox" value="None" id="" name="check" /> Side mirror</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Front left tire</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Left rear tire</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Left tire valves</li>
                    
                </ul>
                
                <h3><span class="green">Extra checks</span></h3>
                
                <ul>
                    
                    <li><input type="checkbox" value="None" id="" name="check" /> Honk</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Brake fluid level</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Belt extension</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Washer fluid level</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Wipers</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Hand brake</li>
                    <li><input type="checkbox" value="None" id="" name="check" /> Roof taxi lantern</li>
                    
                </ul>
                
            </form>

        </div>

        <div class="clear_all"></div>

            <form class="infos_extras">

                <h2>Additional Information.</h2>
            
                <h3><span class="green">Check if defective</span></h3>

                <ul>
                    
                    <li>
                        <input type="checkbox" value="None" id="" name="check" /> 
                        Geolocation system (Calendar)
                        <input type="text">
                    </li>
                    
                    <li>
                        <input type="checkbox" value="None" id="" name="check" /> 
                        Immobilizer device
                        <input type="text">
                    </li>
                    
                    <li>
                        <input type="checkbox" value="None" id="" name="check" /> 
                        Standard equipment missing or damaged?
                        <input type="text">
                    </li>
                    
                    <li>
                        <input type="checkbox" value="None" id="" name="check" /> 
                        The ramp or lifting platform and anchors for adapted vehicles
                    </li>
                    
                    <li>
                        Exterior abyss?
                        
                        <input type="radio" id="ext_abim_oui" name="fav_language" value="Oui">
                        <label for="Oui">Yes (explain)</label>
                        
                        <input type="radio" id="ext_abim_non" name="fav_language" value="Non">
                        <label for="Non">No</label>
                        
                    </li>
                    
                    <li>
                        Interior damaged or stained? <br>
                        
                        <input type="radio" id="ext_abim_oui" name="fav_language" value="Oui">
                        <label for="Oui">Oui (details)</label>
                        
                        <input type="radio" id="ext_abim_non" name="fav_language" value="Non">
                        <label for="Non">Non</label>
                        
                    </li>
                    
                    <li>
                        Exterior:
                        
                        <input type="radio" id="ext_abim_oui" name="fav_language" value="Oui">
                        <label for="Oui">Clean</label>
                        
                        <input type="radio" id="ext_abim_non" name="fav_language" value="Non">
                        <label for="Non">Dirty</label>
                        
                    </li>
                    
                    <li>
                        Interior:
                        
                        <input type="radio" id="ext_abim_oui" name="fav_language" value="Oui">
                        <label for="Oui">Clean</label>
                        
                        <input type="radio" id="ext_abim_non" name="fav_language" value="Non">
                        <label for="Non">Dirty</label>
                        
                    </li>
                    
                </ul>
                
            </form>

            <form class="declaration_photos">

                <h2>Description of the defects checked above and download of photos.</h2>
            
                <h3><span class="green">Description</span></h3>
            
                <textarea></textarea>

                <h3><span class="green">Photo upload</span></h3>

                <div class="btn_upload"><a href="#">Uplsodo here<i class="fa-solid fa-image"></i></a></div>
                
                <img src="{{asset('frontend/img/demo_photo.jpg')}}">
                
                <img src="{{asset('frontend/img/demo_photo_02.jpg')}}">
                
                <div class="clear_all"></div>
                
                <h2>Confirmation of my declaration.</h2>
                
                <input type="checkbox" value="None" id="" name="check" /> 
                I confirm that all elements have been verified by respecting article 55 of law 17.
                
                <div class="btn_submit"><a href="#">I submit my inspection <i class="fa-solid fa-cloud-arrow-up"></i></a></div>

                <div class="num_inspect">#0000001</div>
            
                
            
            </form>

            <div class="clear_all"></div>
            
    </div>    

<script>
        // Function to update the time
        function updateTime() {
        const userTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        const currentTime = new Date().toLocaleTimeString('en-US', { timeZone: userTimeZone, hour12: true,  hour: 'numeric', minute: 'numeric' });
        document.getElementById('current-time').innerText = currentTime;
    }

    // Update the time initially
    updateTime();
</script> 
    
</body>
    
</html>
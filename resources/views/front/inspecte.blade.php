@extends('front.layouts.master')

@section('content')

    <interface>
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

                    <li>Left headlights <input type="checkbox" value=1 id="" name="check" /></li>
                    <li>Right headlights <input type="checkbox" value=1 id="" name="check" /></li>
                    <li>Left turn signals <input type="checkbox" value=1 id="" name="check" /></li>
                    <li>Right turn signals <input type="checkbox" value=1 id="" name="check" /></li>

                </ul>
                
                <h3><span class="green">Rear of vehicle</span></h3>
                
                <ul>
                    
                    <li>Left headlights <input type="checkbox" value=1 id="" name="check" /></li>
                    <li>Right headlights <input type="checkbox" value=1 id="" name="check" /></li>
                    <li>Left turn signals <input type="checkbox" value=1 id="" name="check" /></li>
                    <li>Right turn signals <input type="checkbox" value=1 id="" name="check" /></li>
                    <li>Left brake light <input type="checkbox" value=1 id="" name="check" /></li>
                    <li>Right brake light <input type="checkbox" value=1 id="" name="check" /></li>
                    <li>License plate light <input type="checkbox" value=1 id="" name="check" /></li>
                    
                </ul>
                
            </form>


        </div>
        
        <div class="left_side">

            <form>
            
                <h3><span class="green">Right side of vehicle</span></h3>

                <ul>

                    <li><input type="checkbox" value=1 id="" name="check" /> Side mirror</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Front right tire</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Right rear tire</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Right tire valves</li>
                    
                </ul>
                
                <h3><span class="green">Left side of vehicle</span></h3>
                
                <ul>
                    
                    <li><input type="checkbox" value=1 id="" name="check" /> Side mirror</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Front left tire</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Left rear tire</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Left tire valves</li>
                    
                </ul>
                
                <h3><span class="green">Extra checks</span></h3>
                
                <ul>
                    
                    <li><input type="checkbox" value=1 id="" name="check" /> Honk</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Brake fluid level</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Belt extension</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Washer fluid level</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Wipers</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Hand brake</li>
                    <li><input type="checkbox" value=1 id="" name="check" /> Roof taxi lantern</li>
                    
                </ul>
                
            </form>

        </div>

        <div class="clear_all"></div>

            <form class="infos_extras">

                <h2>Additional Information.</h2>
            
                <h3><span class="green">Check if defective</span></h3>

                <ul>
                    
                    <li>
                        <input type="checkbox" value=1 id="" name="check" /> 
                        Geolocation system (Calendar)
                        <input type="text">
                    </li>
                    
                    <li>
                        <input type="checkbox" value=1 id="" name="check" /> 
                        Immobilizer device
                        <input type="text">
                    </li>
                    
                    <li>
                        <input type="checkbox" value=1 id="" name="check" /> 
                        Standard equipment missing or damaged?
                        <input type="text">
                    </li>
                    
                    <li>
                        <input type="checkbox" value=1 id="" name="check" /> 
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
                        <label for="Oui">Yes (explain)</label>
                        
                        <input type="radio" id="ext_abim_non" name="fav_language" value="Non">
                        <label for="Non">No</label>
                        
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

                <div class="btn_upload"><a href="#">Upload here<i class="fa-solid fa-image"></i></a></div>
                
                <img src="img/demo_photo.jpg">
                
                <img src="img/demo_photo_02.jpg">
                
                <div class="clear_all"></div>
                
                <h2>Confirmation of my declaration.</h2>
                
                <input type="checkbox" value=1 id="" name="check" /> 
                I confirm that all elements have been verified by respecting article 55 of law 17.

                <p class="saaq"><i class="fa-solid fa-circle-exclamation"></i> We respect all the requirements of the <a href="https://saaq.gouv.qc.ca/" target="_blank">SAAQ</a> and <a href="https://www.transports.gouv.qc.ca/fr/entreprises-partenaires/trpa/chauffeurs-proprietaires/Pages/chauffeurs-proprietaires.aspx" target="_blank">Transport Québec.</a></p>
                
                <div class="btn_submit"><a href="#">I submit my inspection <i class="fa-solid fa-cloud-arrow-up"></i></a></div>

                <div class="num_inspect">#0000001</div>
            
                
            
            </form>

            <div class="clear_all"></div>
    </interface> 
    
@endsection    

@push('custom-scripts')    
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
@endpush
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
                <li><i class="fa-solid fa-gauge"></i> {{$data->kilometer}} Km</li>
                @if($data->electric)
                <li><i class="fa-solid fa-battery-three-quarters"></i> 87% (Vehicule)</li>
                @endif

            </ul>


        </div>
        <div class="clear_all"></div>

        <div class="right_side">

            <form id="face_rear">
                <input type="hidden" name="vehicle_id" value="{{$data->id}}">
                @if(auth()->user()->owner_id != 0)
                <input type="hidden" value="{{auth()->user()->owner_id}}" name="owner_id">
                @endif
                <h2>INSPECTION OF YOUR VEHICLE. <span class="underline"> CHECK THE DEFECTS FOUND.</span></h2>
            
                <h3><span class="green">Facing the vehicle</span></h3>

                <ul>

                    <li>Left headlights <input type="checkbox" value=1 id="" name="face_left_headlight" /></li>
                    <li>Right headlights <input type="checkbox" value=1 id="" name="face_right_headlight" /></li>
                    <li>Left turn signals <input type="checkbox" value=1 id="" name="face_left_signal" /></li>
                    <li>Right turn signals <input type="checkbox" value=1 id="" name="face_right_signal" /></li>

                </ul>
                
                <h3><span class="green">Rear of vehicle</span></h3>
                
                <ul>
                    
                    <li>Left headlights <input type="checkbox" value=1 id="" name="rear_left_headlight" /></li>
                    <li>Right headlights <input type="checkbox" value=1 id="" name="rear_right_headlight" /></li>
                    <li>Left turn signals <input type="checkbox" value=1 id="" name="rear_left_signal" /></li>
                    <li>Right turn signals <input type="checkbox" value=1 id="" name="rear_right_signal" /></li>
                    <li>Left brake light <input type="checkbox" value=1 id="" name="rear_left_brake" /></li>
                    <li>Right brake light <input type="checkbox" value=1 id="" name="rear_right_brake" /></li>
                    <li>License plate light <input type="checkbox" value=1 id="" name="rear_licence_plate" /></li>
                    
                </ul>
                
            </form>


        </div>
        
        <div class="left_side">

            <form id="right_side">
            
                <h3><span class="green">Right side of vehicle</span></h3>

                <ul>

                    <li><input type="checkbox" value=1 id="" name="right_side_mirror" /> Side mirror</li>
                    <li><input type="checkbox" value=1 id="" name="right_front_tire" /> Front right tire</li>
                    <li><input type="checkbox" value=1 id="" name="right_rear_tire" /> Right rear tire</li>
                    <li><input type="checkbox" value=1 id="" name="right_tire_valves" /> Right tire valves</li>
                    
                </ul>
                
                <h3><span class="green">Left side of vehicle</span></h3>
                
                <ul>
                    
                    <li><input type="checkbox" value=1 id="" name="left_side_mirror" /> Side mirror</li>
                    <li><input type="checkbox" value=1 id="" name="left_front_tire" /> Front left tire</li>
                    <li><input type="checkbox" value=1 id="" name="left_rear_tire" /> Left rear tire</li>
                    <li><input type="checkbox" value=1 id="" name="left_tire_valves" /> Left tire valves</li>
                    
                </ul>
                
                <h3><span class="green">Extra checks</span></h3>
                
                <ul>
                    
                    <li><input type="checkbox" value=1 id="" name="honk" /> Honk</li>
                    <li><input type="checkbox" value=1 id="" name="brake_fuel_level" /> Brake fluid level</li>
                    <li><input type="checkbox" value=1 id="" name="belt_extension" /> Belt extension</li>
                    <li><input type="checkbox" value=1 id="" name="washer_fluid" /> Washer fluid level</li>
                    <li><input type="checkbox" value=1 id="" name="wipers" /> Wipers</li>
                    <li><input type="checkbox" value=1 id="" name="hand_brake" /> Hand brake</li>
                    <li><input type="checkbox" value=1 id="" name="roof_taxi" /> Roof taxi lantern</li>
                    
                </ul>
                
            </form>

        </div>

        <div class="clear_all"></div>

            <form class="infos_extras" id="infos_extras">

                <h2>Additional Information.</h2>
            
                <h3><span class="green">Check if defective</span></h3>

                <ul>
                    
                    <li>
                        <input type="checkbox" value=1 id="" name="geolocation_checkbox" /> 
                        Geolocation system (Calendar)
                        <input type="text" name="geolocation">
                    </li>
                    
                    <li>
                        <input type="checkbox" value=1 id="" name="immobilizer_checkbox" /> 
                        Immobilizer device
                        <input type="text" name="immobilizer">
                    </li>
                    
                    <li>
                        <input type="checkbox" value=1 id="" name="standard_equipment_checkbox" /> 
                        Standard equipment missing or damaged?
                        <input type="text" name="standard_equipment">
                    </li>

                    <li> 
                        Kilometers
                        <input type="text" name="kilometer">
                    </li>
                    
                    <li>
                        <input type="checkbox" value=1 id="" name="ramp" /> 
                        The ramp or lifting platform and anchors for adapted vehicles
                    </li>
                    
                    <li>
                        Exterior abyss?
                        
                        <input type="radio" id="ext_abim_oui" name="abyss" value="yes">
                        <label for="Oui">Yes (explain)</label>
                        
                        <input type="radio" id="ext_abim_non" name="abyss" value="no">
                        <label for="Non">No</label>
                        
                    </li>
                    
                    <li>
                        Interior damaged or stained? <br>
                        
                        <input type="radio" id="ext_abim_oui" name="interior_damage" value="yes">
                        <label for="Oui">Yes (explain)</label>
                        
                        <input type="radio" id="ext_abim_non" name="interior_damage" value="no">
                        <label for="Non">No</label>
                        
                    </li>
                    
                    <li>
                        Exterior:
                        
                        <input type="radio" id="ext_abim_oui" name="exterior" value="clean">
                        <label for="Oui">Clean</label>
                        
                        <input type="radio" id="ext_abim_non" name="exterior" value="dirty">
                        <label for="Non">Dirty</label>
                        
                    </li>
                    
                    <li>
                        Interior:
                        
                        <input type="radio" id="ext_abim_oui" name="interior" value="clean">
                        <label for="Oui">Clean</label>
                        
                        <input type="radio" id="ext_abim_non" name="interior" value="dirty">
                        <label for="Non">Dirty</label>
                        
                    </li>
                    
                </ul>
                
            </form>

            <form class="declaration_photos" id="declaration_photos">

                <h2>Description of the defects checked above and download of photos.</h2>
            
                <h3><span class="green">Description</span></h3>
            
                <textarea name="description"></textarea>

                <h3><span class="green">Photo upload</span></h3>

                <div class="btn_upload">
                    <label for="photo" style="color:#fff;">
                        Upload here<i class="fa-solid fa-image"></i>
                        <input type="file" name="photos" id="photo" mulitple id="" style="display:none;">    
                    </label>
                </div>
                <div class="clear_all"></div>
                
                <h2>Confirmation of my declaration.</h2>
                
                <input type="checkbox" value=1 id="confirm" name="confirm" /> 
                I confirm that all elements have been verified by respecting article 55 of law 17.

                <p class="saaq"><i class="fa-solid fa-circle-exclamation"></i> We respect all the requirements of the <a href="https://saaq.gouv.qc.ca/" target="_blank">SAAQ</a> and <a href="https://www.transports.gouv.qc.ca/fr/entreprises-partenaires/trpa/chauffeurs-proprietaires/Pages/chauffeurs-proprietaires.aspx" target="_blank">Transport Québec.</a></p>
                
                <div class="btn_submit"><a href="javascript:void(0)" class="submit">I submit my inspection <i class="fa-solid fa-cloud-arrow-up"></i></a></div>

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

    $('.submit').on('click', function(){
        if ($("#confirm").prop("checked")) {

            $.ajax({
                type: "POST",
                url: "{{route('inspecte')}}",
                data: $('#declaration_photos, #infos_extras, #right_side, #face_rear, #infos_extras, #declaration_photos').serialize(),
                success:function(response){
                    if(response.success == true){
                        window.location.href = "{{asset('')}}";
                    }else{
                        alert(response.msg);
                    }
                },
                error:function(response){
                    alert('Something went wrong');
                }
            })
        }else{
            alert('Please check the declaration.')
        }
    }) 



</script> 
@endpush
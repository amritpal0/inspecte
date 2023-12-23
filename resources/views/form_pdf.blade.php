<!-- pdf_template.blade.php -->

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
<style>
    ul{
        list-style: none;
    }
</style>
</head>
<body>
    <?php
        $face_side = json_decode($data->face_side); 
        $rear_side = json_decode($data->rear_side); 
        $right_side = json_decode($data->right_side); 
        $left_side = json_decode($data->left_side); 
        $extra_check = json_decode($data->extra_check); 
    ?>
    <div class="car_01"></div>
    <div class="car_02"></div>

    <div class="clear_all"></div>

    <div class="id_user">
        <table class="table">
            <tbody>
                <tr>
                <td>Driver Name</td>
                <td>{{ @$data->user->driver->first_name }} {{ @$data->user->driver->last_name }}</td>
                </tr>
                <tr>
                    <td>Driver Email</td>
                    <td>{{ @$data->user->email }}</td>
                </tr>
                <tr>
                    <td>License</td>
                    <td>{{ @$data->user->driver->license }}</td>

                </tr>
                <tr>
                    <td>Government accessory num.</td>
                    <td>{{ @$data->vehicle->accessory_number }}</td>

                </tr>
                <tr>
                    <td>Date</td>
                    <td>{{ date('d M, y', strtotime($data->created_at)) }}</td>

                </tr>
                <tr>
                    <td>Kilometers</td>
                    <td>{{ $data->vehicle->kilometer }} Km</td>

                </tr>
                @if($data->vehicle->electric)
                <tr>
                    <td>Kilometers</td>
                    <td>87% (Vehicle)</td>

                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="clear_all"></div>

    <div class="right_side">
        <form id="face_rear">
            <input type="hidden" name="vehicle_id" value="{{ $data->id }}">
            <h4>INSPECTION OF YOUR VEHICLE.</h4>
            <div class="row">
                <div class="col-md-6">

                    <h5><span class="green">Facing the vehicle</span></h5>
                    <ul>
                        <li>Left headlights <input type="checkbox" value="1" id="" name="confirm" {{ $face_side->face_left_headlight ? 'checked' : '' }}/> </li>
                        <li>Right headlights <input type="checkbox" value="1" id="" name="confirm" {{ $face_side->face_right_headlight ? 'checked' : '' }}/> </li>
                        <li>Left turn signals <input type="checkbox" value="1" id="" name="confirm" {{ $face_side->face_left_signal ? 'checked' : '' }}/> </li>
                        <li>Right turn signals <input type="checkbox" value="1" id="" name="confirm" {{ $face_side->face_right_signal ? 'checked' : '' }}/></li>
                    </ul>
                </div>
                <div class="col-md-6">

                    <h5><span class="green">Rear of vehicle</span></h5>
                    <ul>
                        <li>Left headlights <input type="checkbox" value="1" id="" name="confirm" {{ $rear_side->rear_left_headlight ? 'checked' : '' }}/> </li>
                        <li>Right headlights <input type="checkbox" value="1" id="" name="confirm" {{ $rear_side->rear_right_headlight ? 'checked' : '' }}/></li>
                        <li>Left turn signals <input type="checkbox" value="1" id="" name="confirm" {{ $rear_side->rear_left_signal ? 'checked' : '' }}/></li>
                        <li>Right turn signals <input type="checkbox" value="1" id="" name="confirm" {{ $rear_side->rear_right_signal ? 'checked' : '' }}/></li>
                        <li>Left brake light <input type="checkbox" value="1" id="" name="confirm" {{ $rear_side->rear_left_brake ? 'checked' : '' }}/></li>
                        <li>Right brake light <input type="checkbox" value="1" id="" name="confirm" {{ $rear_side->rear_right_brake ? 'checked' : '' }}/></li>
                        <li>License plate light <input type="checkbox" value="1" id="" name="confirm" {{ $rear_side->rear_licence_plate ? 'checked' : '' }}/></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><span class="green">Right side of vehicle</span></h5>
                    <ul>
                        <li>Side mirror <input type="checkbox" value="1" id="" name="confirm" {{ $right_side->right_side_mirror ? 'checked' : '' }}/></li>
                        <li>Front right tire <input type="checkbox" value="1" id="" name="confirm" {{ $right_side->right_front_tire ? 'checked' : '' }}/></li>
                        <li>Right rear tire <input type="checkbox" value="1" id="" name="confirm" {{ $right_side->right_rear_tire ? 'checked' : '' }}/></li>
                        <li>Right tire valves <input type="checkbox" value="1" id="" name="confirm" {{ $right_side->right_tire_valves ? 'checked' : '' }}/></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><span class="green">Left side of vehicle</span></h5>
                    <ul>
                        <li>Side mirror <input type="checkbox" value="1" id="" name="confirm" {{ $left_side->left_side_mirror ? 'checked' : '' }}/></li>
                        <li>Front left tire <input type="checkbox" value="1" id="" name="confirm" {{ $left_side->left_front_tire ? 'checked' : '' }}/></li>
                        <li>Left rear tire <input type="checkbox" value="1" id="" name="confirm" {{ $left_side->left_rear_tire ? 'checked' : '' }}/></li>
                        <li>Left tire valves <input type="checkbox" value="1" id="" name="confirm" {{ $left_side->left_tire_valves ? 'checked' : '' }}/></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><span class="green">Extra checks</span></h5>
                    <ul>
                        <li>Honk <input type="checkbox" value="1" id="" name="confirm" {{ $extra_check->honk ? 'checked' : '' }}/></li>
                        <li>Brake fluid level <input type="checkbox" value="1" id="" name="confirm" {{ $extra_check->brake_fuel_level ? 'checked' : '' }}/></li>
                        <li>Belt extension <input type="checkbox" value="1" id="" name="confirm" {{ $extra_check->belt_extension ? 'checked' : '' }}/></li>
                        <li>Washer fluid level <input type="checkbox" value="1" id="" name="confirm" {{ $extra_check->washer_fluid ? 'checked' : '' }}/></li>
                        <li>Wipers <input type="checkbox" value="1" id="" name="confirm" {{ $extra_check->wipers ? 'checked' : '' }}/></li>
                        <li>Hand brake <input type="checkbox" value="1" id="" name="confirm" {{ $extra_check->hand_brake ? 'checked' : '' }}/></li>
                        <li>Rooftop taxi lantern <input type="checkbox" value="1" id="" name="confirm" {{ $extra_check->roof_taxi ? 'checked' : '' }}/></li>
                    </ul>
                </div>
            </div>
            
        </form>
    </div>

    <div class="clear_all"></div>

    <form class="infos_extras" id="infos_extras">
        <h5>Additional Information.</h5>
        <table class="table">
            <tbody>
                <tr>
                <td> Geolocation system (Calendar)</td>
                <td>{{$data->geolocation}}</td>
                </tr>
                <tr>
                    <td>Immobilizer device</td>
                    <td>{{$data->immobilizer}}</td>
                </tr>
                <tr>
                    <td>Standard equipment missing or damaged?</td>
                    <td>{{$data->standard_equipment}}</td>

                </tr>
                <tr>
                    <td>Kilometers</td>
                    <td>{{$data->vehicle->kilometer}}</td>

                </tr>
            </tbody>
        </table>
        <h3><span class="green">Check if defective</span></h3>
        <ul>
            
            <li>
                <input type="checkbox" value="1" id="" name="ramp" {{ $data->ramp ? 'checked' : '' }} />
                The ramp or lifting platform and anchors for adapted vehicles
            </li>
            
            <li>
                Exterior abyss?<br>
                <input type="radio" id="ext_abim_oui" name="abyss" value="yes" {{ ($data->abyss == 'yes') ? 'checked' : '' }}>
                <label for="Oui">Yes (explain)</label>
                <input type="radio" id="ext_abim_non" name="abyss" value="no" {{ ($data->abyss == 'no') ? 'checked' : '' }}>
                <label for="Non">No</label>
            </li>
            
            <li>
                Interior damaged or stained? <br>
                <input type="radio" id="ext_abim_oui" name="interior_damage" value="yes"  {{ ($data->interior_damage == 'yes') ? 'checked' : '' }} >
                <label for="Oui">Yes (explain)</label>
                <input type="radio" id="ext_abim_non" name="interior_damage" value="no" {{ ($data->interior_damage == 'no') ? 'checked' : '' }} >
                <label for="Non">No</label>
            </li>
            
            <li>
                Exterior:<br>
                <input type="radio" id="ext_abim_oui" name="exterior" value="clean" {{ ($data->exterior == 'clean') ? 'checked' : '' }} >
                <label for="Oui">Clean</label>
                <input type="radio" id="ext_abim_non" name="exterior" value="dirty" {{ ($data->exterior == 'dirty') ? 'checked' : '' }} >
                <label for="Non">Dirty</label>
            </li>
            
            <li>
                Interior:
                <input type="radio" id="ext_abim_oui" name="interior" value="clean" {{ ($data->interior == 'clean') ? 'checked' : '' }}>
                <label for="Oui">Clean</label>
                <input type="radio" id="ext_abim_non" name="interior" value="dirty" {{ ($data->interior == 'dirty') ? 'checked' : '' }}>
                <label for="Non">Dirty</label>
            </li>
        </ul>
    </form>

    <form class="declaration_photos" id="declaration_photos">
        <h4>Description of the defects checked above and download of photos.</h4>
        <div>{{$data->description}}</div>
    </form>

    <div class="clear_all"></div>


</body>
</html>

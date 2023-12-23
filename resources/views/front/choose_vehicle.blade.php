@extends('front.layouts.master')

@section('content')

<div class="wrapper previous_section">
    <table class="table bordered ">
        <thead>
            <tr>
                <th>#</th>
                <th>Registration</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Electric</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $v)
            <tr for="vehicle">
                <td><input id="vehicle" type="radio" name="vehicle_id" vehicle-id="{{$v->id}}" class="vehicle_radio"></td>
                <td>{{ $v->registration }}</td>
                <td>{{ $v->brand }}</td>
                <td>{{ $v->model }}</td>
                <td>{{ $v->year }}</td>
                <td>
                    @if($v->electric == 1)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="submit_btn_div">
        <a href="javascript:void(0)" class="submit_btn">Submit</a>
    </div>
</div>


@endsection


@push('custom-scripts')

<script>
    $(document).ready(function() {
        // Handle click event on the table row
        $('table.bordered tbody tr').on('click', function() {
            // Find the radio button within the clicked row
            var radio = $(this).find('input[type="radio"]');

            // Check the radio button
            radio.prop('checked', true);
        });
    });

    $('.submit_btn').on('click', function(){
        if ($("input[name='vehicle_id']").prop("checked")) {
            var radio_btn = $('input[name="vehicle_id"]:checked');
            var vehicle_id = radio_btn.attr('vehicle-id');
            $.ajax({
                type: "POST",
                url: "{{route('choose_vehicle')}}",
                data:{
                    vehicle_id:vehicle_id
                } ,
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
            alert('Please select the vehicle')
        }
    })
</script>

@endpush
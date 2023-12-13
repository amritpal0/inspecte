@component('mail::message')

Enquiry details:

@component('mail::table')
|                   |                        |        
| -------------     |:----------------------:|
| Name              | {{ $data['name'] }}|
| Email             | {{ $data['email'] }}      |
| Phone Number      | {{ $data['phone'] }}       |
| Message           | {{ $data['message'] }}          |
@endcomponent

Thanks,<br>
{{ $data['name'] }}
@endcomponent

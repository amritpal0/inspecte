@component('mail::message')


Dear {{$name}}

Your order has been confirmed.
<style>
.main-table{  
  border: 1px solid #ddd;
  text-align: center !important;
}
.main-table td{
    border: 1px solid #ddd;
}
..main-table th{
    border: 1px solid #ddd;
  text-align: left;
}

.main-table {
  border-collapse: collapse;
  width: 100%;
}

.main-table th {
    padding: 15px;
}
.main-table td{
   padding: 15px; 
}

</style>

<div class="table-responsive">
    <table class="table table-bordered main-table" >
      <thead>
        <tr>
            <th>Sno.</th>
            <th>Item</th>
            <th>Price</th>
            <th>Qty.</th>
            <th>Total</th>
        </tr>
      </thead>
      @php
          $count = 0;
      @endphp
      @foreach ($items as $item)
      @php
          $count = $count+1;
      @endphp
      <tbody>
           <tr>
               <td>{{$count}}</td>
            <td>{{$item->product}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->price * $item->qty}}</td>
          </tr>           
      @endforeach
      <tr>
          <td colspan='4'>Grand Total</td>
          <td>{{$total}}</td>
      </tr>
    </tbody>
    </table>
  </div>



Thanks,<br>
{{ config('app.name') }}
@endcomponent

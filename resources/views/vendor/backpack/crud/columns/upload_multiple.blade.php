@php
    $value = data_get($entry, $column['name']);

   // print_r ($value);
@endphp

<span>


@foreach($value as $k)

    @if($k>0)
    {{ $k['name'] }} <br>
   @endif
   
@endforeach


</span>
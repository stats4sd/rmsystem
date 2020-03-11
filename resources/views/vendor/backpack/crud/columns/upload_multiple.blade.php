@php
    $value = data_get($entry, $column['name']);

   // print_r ($value);
@endphp

<span>
@if ($value && count($value))

    @foreach($value as $file)


        @if($file>0)
- <a target="_blank" href="{{ isset($column['disk'])?asset(\Storage::disk($column['disk'])->url($file['path'])):asset($file['path']) }}">{{ $file['name'] }} </a>   ({{App\Helpers\CustomHelper::formatSizeUnits($file['size'])}})<br>
   
        {{--
        -<a target="_blank" href="http://localhost/backpack/public/storage/{{$file['path']}}"> {{ $file['name'] }}<br></a>
        --}}
        @endif
   
    @endforeach

@else

    -
@endif

</span>
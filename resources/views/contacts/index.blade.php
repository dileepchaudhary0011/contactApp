<h3>Contact Page</h3>
<strong>String Value</strong> : {{ $string }}
{{ $integerValue }}
<br/>

<Strong>Array</Strong><br/>
{{ var_dump($array) }}
@foreach($array as $item)
    {{ $item }}<br/>
@endforeach

<br/>
<strong>For Loop</strong><br/>
@for($i=0;$i<count($array);$i++)
    {{ $array[$i] }}<br/>
@endfor

<br/>
@foreach($keyArray as $item )
    {{ $item['name'] }}<br/>
    {{ $item['address'] }}<br/><br/>
@endforeach

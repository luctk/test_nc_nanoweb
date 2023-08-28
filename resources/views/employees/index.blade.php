<ul>
    @foreach($tree as $node)
        <li>{{$node['name']}}</li>
        @if(!empty($node['subordinates']))
            @include('employees.index',['tree'=>$node['subordinates']])
        @endif
    @endforeach
</ul>

@props([
    'class'=>'',
    'name'=>'',
    'id'=>'',
    'style'=>'',
    'categories'=>''
    ])

<select class="{{$class}}" name="{{$name}}" id="{{$id}}" style="{{$style}}">
    @foreach ($categories as $key=>$category )

    <option value="{{$category->id }}">{{ $category->category }}</option>
    @endforeach

</select>




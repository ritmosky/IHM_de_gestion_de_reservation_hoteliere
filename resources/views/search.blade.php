
{{dd($columns)}}

{!! Form::open(array('url' => route($routeName.'.research'),'method' => 'post'))      !!}

<select name="label" class="form-control">
    @foreach($columns as $column)
        <option value="{{ $column['title']  }}">{{ $column['title'] }}</option>
    @endforeach
</select>

{!! Form::text('value')!!}


{!! Form::submit('valider')!!}
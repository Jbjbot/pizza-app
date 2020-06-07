@extends('layout')

@section('title')
Modifier votre pizza {{ $pizza->name }}
@endsection

@section('content')
{!! Form::model($pizza, ['method' => 'put' ,'url' => route('pizza.update', $pizza), 'class' => 'form-horizontal']) !!}
<fieldset>
	<div class="form-group">
		{!! Form::label('name', 'Nom de votre pizza', ['class' => 'control-label']) !!}
		{!! Form::text('name', $pizza->name, ['class' => 'form-control', 'placeholder' => 'Renseigner le nom de votre pizza']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('ingredients', 'Sélectionner les ingrédients qui vous ferez plaisir !!', ['class' => 'control-label']) !!}
		<select multiple class="form-control" id="ingredients" name="ingredients[]">
			@foreach($ingredients as $ingredient)
			<option value="{{ $ingredient['id'] }}">{{ $ingredient['name'] }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		{!! Form::submit('Mettre à jour', ['class' => 'btn btn-primary']) !!}
	</div>
</fieldset>
{!! Form::close() !!}
@endsection

@section('footer')
<a href="{{ route('home') }}" class="back__Home">
	<span>Retour à l'accueil</span>
</a>
@endsection
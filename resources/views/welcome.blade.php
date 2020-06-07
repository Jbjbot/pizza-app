@extends('layout')

@section('title', 'Compose ta pizza !!')

@section('content')
{!! Form::open(['url' => route('ingredient.store'), 'class' => 'form-horizontal']) !!}
<fieldset>
    <div class="form-group">
        {!! Form::label('name', 'Nom de l\'ingrédient', ['class' => 'control-label']) !!}
        {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Renseigner le nom de l\'ingrédient']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Prix de l\'ingrédient', ['class' => 'control-label']) !!}
        {!! Form::number('price', $value = null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Renseigner le prix de l\'ingrédient']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Ajouter un ingrédient', ['class' => 'btn btn-primary']) !!}
    </div>
</fieldset>
{!! Form::close() !!}

{!! Form::open(['url' => route('pizza.store'), 'class' => 'form-horizontal' ]) !!}
<fieldset>
    <div class="form-group">
        {!! Form::label('name', 'Nom de votre pizza', ['class' => 'control-label']) !!}
        {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Renseigner le nom de votre pizza']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('ingredients', 'Sélectionner les ingrédients qui vous ferez plaisir !!', ['class' => 'control-label']) !!}
        <select multiple class="form-control" id="ingredients" name="ingredients[]">
            @foreach($ingredients as $ingredient)
            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {!! Form::submit('Ajouter une pizza', ['class' => 'btn btn-primary']) !!}
    </div>
</fieldset>
{!! Form::close() !!}
<div class="pizzas">
    @foreach($pizzas as $pizza)
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <div class="name">{{ $pizza->name }}</div>
                <span>{{ $pizza->getPrice() }}€</span>
                <a href="{{ route('pizza.edit', $pizza) }}" class="btn btn-primary">Edit</a>
            </div>
            <ul>
                @foreach($pizza->ingredients as $ingredient)
                <li>{{ $ingredient->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection

@extends('layouts.app')

@section('title')
    <div class="text-center pt-3" style="background-color: #583037; height: 80px;">
        <h1 class="text-white"> Cadastrar Pratos </h1>
    </div>
@endsection

@section('content')    
    
    <form action="{{route('admin.foods.store')}}" method="post" class="pt-5">

        @csrf

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Nome do prato </label>
            <div class="col-sm-10">
                <input type="text" name="food_name" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Descrição </label>
            <div class="col-sm-10">
                <textarea name="food_description" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Valor </label>
            <div class="col-sm-10">
                <input type="text" name="food_price" class="valor form-control" onfocus="$('.valor').mask('#.##0.00', {reverse: true});" >
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Imagem </label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Categoria</label>
            <div class="col-sm-10">
                <select name="category_id" class="form-control">
                    <option> Selecione uma categoria </option>
                    @foreach ($categories as $category)
                        <option value=" {{$category->category_id}}"> {{$category->category_name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="text-right">
            <button type="submit" class="btn" style="color: #FFF; background-color: #583037;"> Cadastrar </button>
        </div>
    </form>

@endsection
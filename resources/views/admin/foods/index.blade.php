@extends('layouts.app')

@section('title')
    Todos os pratos
@endsection

@section('content')  
    <table class="table">
        <thead>
            <tr>
                <th>
                    Prato
                </th>
                <th>
                    Valor
                </th>
                <th>
                    Descrição
                </th>
                <th>
                    Editar
                </th>
                <th>
                    Remover
                </th>
            </tr>        
        </thead>
        <tbody>

            @foreach ($food as $foods)
                <tr>
                    <td> {{ $foods->food_name }} </td>
                    <td> R$ {{ $foods->food_price }} </td>
                    <td> {{ $foods->food_description }} </td>
                    <td> <a href="" class="btn btn-primary"> Editar </a> </td>
                    <td> <a href="" class="btn btn-danger"> Remover </a> </td>
                </tr>
            @endforeach

            

        </tbody>
        


    </table>

@endsection
         
  
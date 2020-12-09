<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>  

    <title> MealPlan </title>

    <script>
      function process(quant){
        var value = parseInt(document.getElementById("quant").value);
        value+=quant;
        if(value < 1){
          document.getElementById("quant").value = 1;
        } else{
        document.getElementById("quant").value = value;
        }
      }
    </script>

</head>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    
    <form action="{{ route('cardapio.show', ['categoria' => $categoria, 'mesa' => $mesa] ) }}" method="get">
      <input type="text" class="d-none" name="nome" value="{{$_GET['nome']}}">
      <button class="navbar-brand btn btn-link" href="#"> <img src="https://mealplan.com.br/wp-content/uploads/2020/09/Meal-Plan-Logo-horizontal-1-e1601300290795.png" alt="" srcset=""> </button>
    </form>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        @foreach ($categories as $category)
          <li class="nav-item active">
            <form action="{{ route('menu.categoria', ['categoria' => $category->category_id, 'mesa' => $mesa] ) }}" method="get">
              <input type="text" class="d-none" name="nome" value="{{$_GET['nome']}}">
              <button class="nav-link btn btn-link" href="{{ route('menu.categoria', ['categoria' => $category->category_id] ) }}"> {{$category->category_name}} </button>
            </form>
          </li>
        @endforeach
      </ul>
      <form class="form-inline my-2 my-lg-0" action="{{ route('cardapio.busca', ['mesa' => $mesa] ) }}" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="busca" aria-label="Pesquisar">
        <input type="text" class="d-none" name="nome" value="{{$_GET['nome']}}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
    </div>
  </nav>
  
  <div class="container">

    <h1 class="text-center pt-3 pb-5"> {{ $categoria_atual[0]['category_name'] }} </h1>

    @if (isset($_GET['retorno']))
      <div class="alert alert-success" role="alert">
         Pedido realizado com sucesso!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif  
    
    @foreach ($foods as $food)
      
      @if ($food->category_id == $categoria)
      
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src=" {{ asset('storage/' . $food->image ) }} " alt="Imagem de capa do card">
          <div class="card-body">
            <p class="float-right"> R$ {{ $food->food_price }} </p>
            <p class="lead"> {{ $food->food_name }} </p> 
            <p class="card-text"> {{ $food->food_description }} </p>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pedido{{ $food->food_id }}"> Fazer pedido </button>
              <div class="modal fade" id="pedido{{ $food->food_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"> Finalizar pedido </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('order.new')}}" method="post">
                        @csrf
                        <input type="text" name="mesa" class="d-none" value="{{$mesa}}">
                        <input type="text" name="nome-cliente" class="d-none" value="{{$_GET['nome']}}">
                        <input type="text" name="nome-prato" class="d-none" value="{{$food->food_name}}">
                        <input type="text" name="preco" class="d-none" value="{{$food->food_price}}">
                        <input type="text" name="url" class="d-none" value="{{$_SERVER["REQUEST_URI"]}}">
                        
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Quantidade:</label>
                          <input type="button" id="plus" value='-' onclick="process(-1)" />
                          <input id="quant" name="quant" class="text" size="1" type="text" value="1" maxlength="5" />
                          <input type="button" id="minus" value='+' onclick="process(1)">
                        </div>

                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Observação:</label>
                          <textarea class="form-control" id="message-text" name="description"></textarea>
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="submit" class="btn btn-primary"> Fazer pedido</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>

            
          </div>
        </div> <br>

      @endif

      @endforeach

  </div>


 




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
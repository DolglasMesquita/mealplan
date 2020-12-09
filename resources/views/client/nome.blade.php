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

</head>
<body>
     
    <div class="container">
        <div class="text-center pt-5">
            <img src="https://mealplan.com.br/wp-content/uploads/2020/09/Meal-Plan-Logo-horizontal-1-e1601300290795.png" width="50%">
        </div>

        <h1 class="text-center pt-5"> Seja bem vindo </h1>

        <p class="lead text-center"> Você está na mesa <span class="h3"> {{$mesa}} </span> </p>

        <form action="{{route('cardapio.show', ['mesa' => $mesa])}}" method="GET" class="pt-5">

            <p for="nome"> Digite seu nome para continuar para o cardápio </p> <br>
            
            <div class="input-group mb-3">
                
                <input type="text" class="form-control" name="nome" id="nome" required>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2"> Continuar </button>
                </div>
              </div>
        </form>

        
    </div>

     
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
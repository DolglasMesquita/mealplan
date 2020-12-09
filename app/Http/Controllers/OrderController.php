<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $quantidade = $_POST['quant'];
        $observacao = $_POST['description'];
        $nome_prato = $_POST['nome-prato'];

        $obs = "$quantidade x $nome_prato \n$observacao" ;

        $pedido = new Order();
        
        $pedido->client_name = $_POST['nome-cliente'];
        $pedido->table_number = $_POST['mesa'];
        $pedido->order_price = ($_POST['preco'] * $quantidade);
        $pedido->order_description = $obs;
        $pedido->done_order = false;
        $pedido->order_date = date("Y-m-d");
        $pedido->order_time = date('H:i:s');

        $pedido->save();

        $sucesso = 'Pedido realizado com sucesso';

       //return "<script>document.location='http://192.168.0.109:8000" . $_POST['url'] . " &retorno=true'</script>";


       return "<script>document.location='http://25.108.237.40:8000" . $_POST['url'] . " &retorno=true'</script>";

    }
}

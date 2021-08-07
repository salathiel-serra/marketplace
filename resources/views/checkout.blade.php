@extends('layouts.front')

@section('content')
  <div class="container">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <h2>Dados para pagamento</h2>
          <hr>
        </div>
      </div>
      <form action="" method="post">
        <div class="row">
          <div class="col-md-12 form-group">
            <label> Número do cartão </label>
            <input type="text" class="form-control" name="card_number">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group">
            <label>  Mês de expiração </label>
            <input type="text" class="form-control" name="card_month">
          </div>

          <div class="col-md-4 form-group">
            <label>  Ano de expiração </label>
            <input type="text" class="form-control" name="card_year">
          </div>

          <div class="col-md-4 form-group">
            <label>  CVV </label>
            <input type="text" class="form-control" name="card_cvv">
          </div>
        </div>

        <button class="btn btn-success btn-lg"> Efetuar pagamento </button>
      </form>
    </div>
  </div>
@endsection
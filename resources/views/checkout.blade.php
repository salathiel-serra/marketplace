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
            <label> Número do cartão <span class="brand"></span>  </label>
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

        <div class="row">
          <div class="col-md-12 installments form-group"> </div>
        </div>

        <button class="btn btn-success btn-lg"> Efetuar pagamento </button>
      </form>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
  <script>
    const sessionId = '{{ session()->get('pagseguro_session_code') }}'

    PagSeguroDirectPayment.setSessionId(sessionId);
  </script>

  <script>
    let cardNumber = document.querySelector('input[name=card_number]');
    let spanBrand  = document.querySelector('span.brand');
    
    cardNumber.addEventListener('keyup', ()=>{
      if (cardNumber.value.length) {
        PagSeguroDirectPayment.getBrand({
          cardBin: cardNumber.value.substr(0,6),
          success: function(res) {
            let imgFlag = `<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png">`
            spanBrand.innerHTML = imgFlag

            getInstallments(40, res.brand.name);
          },
          error: function(err) {
            // console.log(err)
          },
          complete: function(res) {
            // console.log(res)
          }
        })
      }
    });

    function getInstallments(amount, brand) {
      PagSeguroDirectPayment.getInstallments({
        amount: amount,
        brand: brand,
        maxInstallmentNoInterest: 3,
        success: (res)=>{
          let selectInstallments = drawSelectInstallments(res.installments[brand]);
          document.querySelector('div.installments').innerHTML = selectInstallments;
        },
        error: (err)=>{
          console.log(err)
        }
      })
    }

    function drawSelectInstallments(installments) {
      let select = '<label>Opções de Parcelamento:</label>';

      select += '<select class="form-control">';

      for(let l of installments) {
          select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total fica ${l.totalAmount}</option>`;
      }


      select += '</select>';

      return select;
    }
  </script>
@endsection
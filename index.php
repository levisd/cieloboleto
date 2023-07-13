
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>API 3.0 da Cielo e PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Pagamento Online Boleto</h2>
        <p class="lead">API Cielo 3.0 com Bootstrap e PHP.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Carrinho</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Produto</h6>
                <small class="text-muted">Descricao</small>
              </div>
              <span class="text-muted">R$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Segundo Produto</h6>
                <small class="text-muted">Descricao</small>
              </div>
              <span class="text-muted">R$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Terceiro Item</h6>
                <small class="text-muted">Descricao</small>
              </div>
              <span class="text-muted">R$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Codigo Promocao</h6>
                <small>Example Code</small>
              </div>
              <span class="text-success">-R$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BRL)</span>
              <strong>R$20</strong>
            </li>
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Pegar</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Dados Pessoais</h4>
          <form class="needs-validation" novalidate action="efetuar-pagamento-boleto.php" method="POST">
			<input type="hidden" name="total" id="total" value="120">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nome</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Requer Nome.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Sobrenome</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Requer Sobrenome.
                </div>
              </div>
            </div>

           

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Opcional)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Digite um email Valido.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Endereco</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Digite um endereco Valido.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Endereco Alternativo<span class="text-muted">(Opcional)</span></label>
              <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartmento ou Casa">
            </div>

            <div class="row">

			  
              <div class="col-md-4 mb-3">
                <label for="state">Estado</label>
                <select class="custom-select d-block w-100" name="state" id="state" required>
                  <option value="">Lista...</option>
                  <option>SP</option>
                  <option>MG</option>
                </select>
                <div class="invalid-feedback">
                  Insira um estado Valido.
                </div>
              </div>
			  
			  
			<div class="col-md-5 mb-3">
                <label for="city">Cidade</label>
                <select class="custom-select d-block w-100" name="city" id="city" required>
                  <option value="">Lista...</option>
                  <option>Campinas</option>
                  <option>Varginha</option>
                </select>
                <div class="invalid-feedback">
                  Insira uma cidade valida.
                </div>
              </div>
			  
			  
			  
              <div class="col-md-3 mb-3">
                <label for="zip">Cep</label>
                <input type="text" class="form-control" id="zip" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Requer o CEP.
                </div>
              </div>
            </div>
            <hr class="mb-4">
           

            <!-- <h4 class="mb-3">Pagamento</h4>


            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-flag">Bandeira</label>
                <input type="text" class="form-control" name="cc-flag" id="cc-flag" placeholder="" required>
                <div class="invalid-feedback">
                  Bandeira necessaria
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Nro do Cartao</label>
                <input type="text" class="form-control" name="cc-number" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Requer o nro do cartao
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expira</label>
                <input type="text" class="form-control" name="cc-expiration" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Requer a expiracao
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" name="cc-cvv" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Requer o cvv 
                </div>
              </div>
            </div> -->
            <!-- <hr class="mb-4"> -->
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2023</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacidade</a></li>
          <li class="list-inline-item"><a href="#">Termos</a></li>
          <li class="list-inline-item"><a href="#">Suporte</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>

<?php include "partials/header.php"; ?>

  <body>

    <div class="container mb-5">
      <div class=" text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Betalings pagina</h2>
      </div>

      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Betallings adres</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Voornaam</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Achternaam</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="Street">Straat</label>
              <input type="text" class="form-control" id="Street" placeholder="" required>
            </div>


            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Land</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Kies...</option>
                  <option>Nederlands</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
              <label for="zip">Postcode</label>
              <div class="input-group">
                <input type="text" class="form-control" id="zip" placeholder="" required>
            </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="number">Huisnummer</label>
                <input type="text" class="form-control" id="number" placeholder="" required>
              </div>
            </div>

            <h4 class="mb-3">Betallingsmethode</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Ideal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="IBAN">IBAN</label>
                <input type="text" class="form-control" id="IBAN" placeholder="" required>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Betalen</button>
          </form>
        </div>
      </div>
    </div>


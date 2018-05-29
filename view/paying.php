<?php include "partials/header.php"; ?>

  <body>

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Betalings pagina</h2>
        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus deleniti cupiditate est velit doloribus dolores temporibus, totam illum, pariatur qui animi facere debitis, necessitatibus aut quo eius. Deserunt, impedit dignissimos.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Jouw winkelwagen</span>
            <span class="badge badge-secondary badge-pill">Aantal 1</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product naam</h6>
              </div>
              <span class="text-muted">$99</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Totaal</span>
              <strong>$99</strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
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
              <label for="username">Username</label>
              <div class="input-group">
                <input type="text" class="form-control" id="username" placeholder="" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="">
            </div>

            <div class="mb-3">
              <label for="address">Adres</label>
              <input type="text" class="form-control" id="address" placeholder="" required>
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
              <label for="adres">Adres</label>
              <div class="input-group">
                <input type="text" class="form-control" id="adres" placeholder="" required>
            </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Postcode</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
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
                <label for="Naamkaart">Naam op het kaart</label>
                <input type="text" class="form-control" id="Naamkaart" placeholder="" required>
                <small class="text-muted">wat er op je kaart staat</small>
              </div>
              <div class="col-md-6 mb-3">
                <label for="IBAN">IBAN</label>
                <input type="text" class="form-control" id="IBAN" placeholder="" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="verloopdatum">Verloopdatum</label>
                <input type="text" class="form-control" id="verloopdatum" placeholder="" required>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </div>
    <?php include "partials/footer.php"; ?>


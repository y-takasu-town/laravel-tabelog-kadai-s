@extends('layouts.app')

@section('content')

  <!-- カード情報を変更したらメッセージを表示する -->
  @if (session('message'))
  <div class="alert alert-warning">
  {{ session('message') }}
  </div>
  @endif

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
          <h3 class="mt-3 mb-3 text-center">クレジットカード情報変更</h3>
          <div class="col">
            <div class="fw-bolder mb-5">
              <h5>＜現在のご登録＞</h5>
              <p>{{$user->defaultPaymentMethod()->billing_details->name}}</p>
              <p>**** **** **** {{$user->defaultPaymentMethod()->card->last4}}</p>
            </div>

            <h5>＜変更後のクレジットカード情報＞</h5>
              <form id="card_form" action="{{ route('subscript.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <div class="form-group">
                    <label for="card-holder-name">カード名義人</label>
                    <input name="card-holder-name" id="card-holder-name" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="card-number">カード番号</label>
                    <div id="card-number" class="form-control"></div>
                  </div>
                  <div class="form-group">
                    <label for="card-expiry">使用期限</label>
                    <div id="card-expiry" class="form-control"></div>
                  </div>
                  <div class="form-group">
                    <label for="card-cvc">セキュリティコード</label>
                    <div id="card-cvc" class="form-control"></div>
                  </div>
                </div>
                <input name="payment_method" type="hidden">
                <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}" class="mt-3 btn nagoyameshi-submit-button col-6 w-100">登録</button>
            </form>
          
          
          <script src="https://js.stripe.com/v3/"></script>
          <script>
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");

            const elements = stripe.elements();

            // Create an instance of each Element and mount them to the respective HTML elements
            const cardNumberElement = elements.create('cardNumber', { style: { base: { fontSize: '16px' } } });
            cardNumberElement.mount('#card-number');

            const cardExpiryElement = elements.create('cardExpiry', { style: { base: { fontSize: '16px' } } });
            cardExpiryElement.mount('#card-expiry');

            const cardCvcElement = elements.create('cardCvc', { style: { base: { fontSize: '16px' } } });
            cardCvcElement.mount('#card-cvc');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardButton.addEventListener('click', async (e) => {
              const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                  payment_method: {
                    card: cardNumberElement,
                    billing_details: { name: cardHolderName.value }
                  }
                }
              );

              if (error) {
                console.log(error);
              } else {
                const form = document.getElementById('card_form');
                form.payment_method.value = setupIntent.payment_method;
                form.submit();
              }
            });
          </script>
        </div>
      </div>
    </div>
  </div>
@endsection
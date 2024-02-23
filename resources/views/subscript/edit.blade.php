@extends('layouts.app')

@section('content')

<span>
  <a href="{{ route('mypage') }}" class="link-secondary text-decoration-none">マイページ</a> > カード情報変更
</span>


<!-- カード情報を変更したらメッセージを表示する -->
@if (session('message'))
<div class="alert alert-warning">
{{ session('message') }}
</div>
@endif



<p>{{$user->defaultPaymentMethod()->billing_details->name}}</p>
<p>**** **** **** {{$user->defaultPaymentMethod()->card->last4}}</p>
<form id="card_form" action="{{route('subscript.update')}}" method="POST">
  @csrf
  <input name="card-holder-name" id="card-holder-name" type="text" required>
  <div id="card-element"></div>
  <input name="payment_method" type="hidden">     
  <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}">登録</button>
</form>

<script src="https://js.stripe.com/v3/"></script>
<script>
  const stripe = Stripe("{{env('STRIPE_KEY')}}");

  const elements = stripe.elements();
  const cardElement = elements.create('card',{hidePostalCode: true});

  cardElement.mount('#card-element');

  const cardHolderName = document.getElementById('card-holder-name');
  const cardButton = document.getElementById('card-button');
  const clientSecret = cardButton.dataset.secret;

  cardButton.addEventListener('click', async (e) => {
      const { setupIntent, error } = await stripe.confirmCardSetup(
          clientSecret, {
              payment_method: {
                  card: cardElement,
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

@endsection
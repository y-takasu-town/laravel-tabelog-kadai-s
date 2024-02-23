@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mt-3 mb-3 text-center">有料会員登録（カード情報入力）</h3>

            <div class="col">
                <form id="card_form" action="{{ route('subscript.register') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="card-holder-name" class="form-label">カード名義人</label>
                        <input name="card-holder-name" id="card-holder-name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="card-element" class="form-label">カード番号</label>
                        <div id="card-element" class="form-control"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="card-expiry" class="form-label">使用期限</label>
                            <div id="card-expiry" class="form-control"></div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="card-cvc" class="form-label">セキュリティーコード</label>
                            <div id="card-cvc" class="form-control"></div>
                        </div>
                    </div>
                    <input name="payment_method" type="hidden">
                    <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}" class="mt-3 btn nagoyameshi-submit-button col-6 w-100">登録</button>
                </form>
                @error('card-holder-name')
                <p>カード名義人を入力してください</p>
                @enderror
            </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();

    // スタイルを設定
    const style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // カード番号
    const cardNumberElement = elements.create('cardNumber', { style });
    cardNumberElement.mount('#card-element');

    // 使用期限
    const cardExpiryElement = elements.create('cardExpiry', { style });
    cardExpiryElement.mount('#card-expiry');

    // セキュリティーコード
    const cardCvcElement = elements.create('cardCvc', { style });
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
@endsection
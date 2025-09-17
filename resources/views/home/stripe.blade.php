

<!DOCTYPE html>
<html>
<head>
  <title>PECWOM Payment</title>
  @include('home.css')
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    :root{ --pecwom-accent:#ffb366; }
    .payment-wrap{padding-top:40px;padding-bottom:40px}
    .pay-shell{max-width:980px;margin:0 auto}
    .pay-card{border:1px solid rgba(0,0,0,.06);box-shadow:0 8px 30px rgba(0,0,0,.08);border-radius:16px;background:#fff;overflow:hidden}
    .pay-header{padding:22px 26px;border-bottom:1px solid #eee;display:flex;align-items:center;justify-content:space-between}
    .pay-header h3{margin:0;font-weight:800;letter-spacing:.02em}
    .pay-body{padding:26px}
    .pay-grid{display:grid;grid-template-columns:1.25fr .95fr;gap:28px}
    .pay-panel{border:1px dashed rgba(0,0,0,.08);border-radius:12px;padding:18px}
    .pay-panel h5{margin:0 0 12px 0;font-weight:800;text-transform:uppercase;letter-spacing:.06em;font-size:13px;color:#666}
    .sum-row{display:flex;justify-content:space-between;margin:10px 0}
    .sum-total{font-weight:800;font-size:20px}
    .label{font-size:13px;color:#666;margin-bottom:6px}
    .input{width:100%;height:46px;border:1px solid #ddd;border-radius:10px;padding:10px 12px;outline:none}
    .input:focus{border-color:var(--pecwom-accent);box-shadow:0 0 0 3px rgba(255,179,102,.18)}
    .card-element{border:1px solid #ddd;border-radius:10px;padding:14px 12px}
    .btn-pay{display:inline-block;width:100%;padding:12px 16px;border-radius:12px;border:1px solid #ff4304;background:#ff4304;color:#fff;font-weight:700;transition:.25s;letter-spacing:.04em}
    .btn-pay:hover{color:var(--pecwom-accent);background:#fff;border-color:var(--pecwom-accent)}
    .note{font-size:12px;color:#777;margin-top:10px}
    .bad{display:none;margin-top:12px;border-radius:10px;padding:10px 12px;background:#ffe6e6;color:#b30000}
    .good{display:none;margin-top:12px;border-radius:10px;padding:10px 12px;background:#e9fff1;color:#026b2c}
    @media (max-width: 992px){ .pay-grid{grid-template-columns:1fr} }
  </style>
</head>
<body>
  <div class="hero_area payment_area">
    <div class="container payment-wrap animate-fade-in">
      <div class="pay-shell">
        <div class="pay-card">
          <div class="pay-header">
            <h3>Complete Your Payment</h3>
            <div style="font-weight:800;letter-spacing:.12em">PECWOM</div>
          </div>

          <div class="pay-body">
            @if (session('success'))
              <div class="good" style="display:block">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
              <div class="bad" style="display:block">
                @foreach($errors->all() as $e) <div>{{ $e }}</div> @endforeach
              </div>
            @endif

            <div class="pay-grid">
              <div class="pay-panel">
                <h5>Payment</h5>
                <form id="payment-form" action="{{ route('stripe.post', $value) }}" method="POST">
                  @csrf
                  <label class="label">Name on Card</label>
                  <input type="text" name="cardholder_name" class="input" placeholder="Full name" required>

                  <div style="height:12px"></div>
                  <label class="label">Card Details</label>
                  <div id="card-element" class="card-element"></div>

                  <div id="card-errors" class="bad"></div>

                  <div style="height:16px"></div>
                  <button type="submit" class="btn-pay">Pay ${{ number_format($value, 2) }}</button>
                  <div class="note">Your payment information is encrypted and processed securely by Stripe.</div>
                </form>
              </div>

              <div class="pay-panel">
                <h5>Order Summary</h5>
                <div class="sum-row"><span>Subtotal</span><span>${{ number_format($value, 2) }}</span></div>
                <div class="sum-row"><span>Shipping</span><span>$0.00</span></div>
                <div class="sum-row"><span>Taxes</span><span>—</span></div>
                <hr>
                <div class="sum-row sum-total"><span>Total</span><span>${{ number_format($value, 2) }}</span></div>

                <div style="height:16px"></div>
                <div class="note">Need help? Contact support via the footer links.</div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://js.stripe.com/v3/"></script>
  <script>
    (function(){
      const stripe = Stripe("{{ $stripeKey }}");
      const elements = stripe.elements({
        fonts: [{ cssSrc: 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap' }]
      });
      const style = {
        base: {
          color: '#111',
          fontFamily: 'Poppins, system-ui, -apple-system, Segoe UI, Roboto',
          fontSize: '16px',
          '::placeholder': { color: '#9aa0a6' }
        },
        invalid: { color: '#e5424d' }
      };
      const card = elements.create('card', { style, hidePostalCode: true });
      card.mount('#card-element');

      const form = document.getElementById('payment-form');
      const errors = document.getElementById('card-errors');

      card.on('change', function(e){
        if (e.error) {
          errors.style.display = 'block';
          errors.textContent = e.error.message;
        } else {
          errors.style.display = 'none';
          errors.textContent = '';
        }
      });

      form.addEventListener('submit', async function(e){
        e.preventDefault();
        const name = form.cardholder_name.value || 'Customer';

        const {token, error} = await stripe.createToken(card, { name });

        if (error) {
          errors.style.display = 'block';
          errors.textContent = error.message;
          return;
        }

        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'stripeToken';
        hidden.value = token.id;
        form.appendChild(hidden);

        form.submit();
      });
    })();
  </script>
</body>
</html>




















{{--
<!DOCTYPE html>

<html>

<head>

    <title>PECWOM Payment</title>
    @include('home.css')

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>



<body>
    <div class="hero_area payment_area">
        <div class="container animate-fade-in">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table">
                            <h3 class="panel-title">Payment Details</h3>
                            <h4>You need to pay ${{ $value }}</h4>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                                    <p>{{ Session::get('success') }}</p>

                                </div>
                            @endif

                            <!-- Added this to debug -->
                            {{-- @if(config('app.debug'))
                            <div style="background: #f0f0f0; padding: 10px; margin: 10px 0;">
                                <strong>Debug Info:</strong><br>
                                Stripe Key: {{ $stripeKey ?? 'NOT SET' }}<br>
                                Key Length: {{ strlen($stripeKey ?? '') }}<br>
                                Key Starts With: {{ substr($stripeKey ?? '', 0, 7) }}
                            </div>
                            @endif --


                            <form role="form" action="{{ route('stripe.post', $value) }}" method="post"
                                class="require-validation" data-cc-on-file="false"
                                data-stripe-publishable-key="{{ $stripeKey }}" id="payment-form">
                                @csrf
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Name on Card</label> <input class='form-control'
                                            size='4' type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label> <input autocomplete='off'
                                            class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>



<script type="text/javascript">
    $(function () {



        /*------------------------------------------

        --------------------------------------------

        Stripe Payment Code

        --------------------------------------------

        --------------------------------------------*/



        var $form = $(".require-validation");

    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });

        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }



        });



        /*------------------------------------------

        --------------------------------------------

        Stripe Response Handler

        --------------------------------------------

        --------------------------------------------*/

        function stripeResponseHandler(status, response) {

            var $form = $(".require-validation");

    // Disable the submit button to prevent double submission
    $form.find('button[type="submit"]').prop('disabled', true);

    if (response.error) {
        $('.error')
            .removeClass('hide')
            .find('.alert')
            .text(response.error.message);
        // Re-enable the submit button on error
        $form.find('button[type="submit"]').prop('disabled', false);
    } else {
        /* token contains id, last4, and card type */
        var token = response['id'];

        $form.find('input[type=text]').empty();
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

        // Submit the form only once
        $form.get(0).submit();
    }

        }



    });
</script>

</html> --}}

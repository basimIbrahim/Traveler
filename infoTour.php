<?php
include 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { 
    header('Location: TourList.php');
    exit();
    }

$query_hotel = "SELECT * FROM Tour WHERE TourID = $id";
$result_hotel = mysqli_query($conn, $query_hotel);
$row_tour = mysqli_fetch_assoc($result_hotel);
if (!$row_tour) { header('Location: TourList.php');; }

   echo "
<main>
  <section class='hero' style='background-image: url(\"{$row_tour['img2']}\");'>
    <div class='content'>
      <h1>{$row_tour['TourName']}</h1>
      <br>
      <p>{$row_tour['Moto']}</p>
      <a href='#tour' class='btnn btn-primaryy'>View Tour</a>
    </div>
  </section>

  <section id='tour' class='py-5 bg-body-tertiary'>
    <div class='container'>
      <div class='d-flex justify-content-between align-items-center mb-4'>
        <div>
          <h2 class='section-title' style='margin-bottom:12px;'>{$row_tour['TourName']}</h2>
          <p class='mb-1'>{$row_tour['TourType']} • {$row_tour['ForWho']} • {$row_tour['Place']}</p>
          <p class='mb-0'>Check-in: {$row_tour['TourCheckInHour']} • Check-out: {$row_tour['TourCheckOutHour']}</p>
        </div>
      </div>

      <div class='row g-4 mb-5'>
        <div class='col-md-7'>
          <div class='card shadow-sm'>
            <img src='{$row_tour['img3']}' class='card-img-top' alt='TourImg2'>
          </div>
        </div>
        <div class='col-md-5'>
          <div class='row g-3'>
            <div class='col-6'>
              <div class='card shadow-sm'>
                <img src='{$row_tour['img4']}' class='card-img-top' alt='TourImg3'>
              </div>
            </div>
            <div class='col-6'>
              <div class='card shadow-sm'>
                <img src='{$row_tour['img5']}' class='card-img-top' alt='TourImg4'>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class='row g-4 mb-5'>
        <div class='col-md-7'>
          <h3 class='mb-3'>About this Adventure</h3>
          <p>{$row_tour['AboutTheAdventure']}</p>
        

          <h5 class='mt-4 mb-2'>Amenities</h5>
          <p>- {$row_tour['TourAmenities']}</p>
        </div>

        <div class='col-md-5'>
          <div class='card shadow-sm p-3'>
            <h4 class='mb-3'>Highlights</h4>
            <p class='mb-1'>• {$row_tour['TourHighlight1']}</p>
            <p class='mb-3'>• {$row_tour['TourHighlight2']}</p>

            <div class='d-flex justify-content-between align-items-center mb-3'>
              <div>
                <div class='fs-5 fw-bold'>{$row_tour['TourPrice']}$</div>
                <small class='text-body-secondary'>Taxes and fees not included</small>
              </div>
              <a href='#' class='btn btn-primary room-book-btn' data-price='{$row_tour['TourPrice']}'>Book</a>
            </div>
          </div>
        </div>
      </div>
      <div class='row row-cols-1 row-cols-md-3 g-4'>
";

/* End of page */
echo "
      </div>

      <div class='text-center mt-5'>
        <a href='tourList.php' class='btnn btn-show-more'>Back to Tours</a>
      </div>
    </div>
  </section>
</main>

<!-- PAYMENT POPUP -->
<div id='payment-modal' class='payment-backdrop' style='display:none;'>
  <div class='payment-card'>
    <button type='button' class='payment-close' id='closePayment'>&times;</button>
    <h3 class='mb-3'>Complete Payment</h3>

    <form id='paymentForm'>
      <div class='row'>
        <div class='col-6 mb-3'>
          <label for='checkIn' class='form-label'>Check-in</label>
          <input type='date' class='form-control' id='checkIn' required />
        </div>
        <div class='col-6 mb-3'>
          <label for='checkOut' class='form-label'>Check-out</label>
          <input type='date' class='form-control' id='checkOut' required />
        </div>
      </div>

      <div class='mb-3'>
        <label class='form-label'>Payment Method</label>
        <div class='payment-methods'>
          <label class='form-check-label payment-pill'>
            <input type='radio' name='payMethod' value='apple' class='payment-radio-hidden' checked />
            Apple Pay
          </label>
          <label class='form-check-label payment-pill'>
            <input type='radio' name='payMethod' value='credit' class='payment-radio-hidden' />
            Credit Card
          </label>
          <label class='form-check-label payment-pill'>
            <input type='radio' name='payMethod' value='paypal' class='payment-radio-hidden' />
            PayPal
          </label>
        </div>
      </div>

      <div id='creditFields' class='credit-fields' style='display:none;'>
        <div class='mb-3'>
          <label for='cardNumber' class='form-label'>Card Number</label>
          <input type='text' class='form-control' id='cardNumber' placeholder='1234 5678 9012 3456' inputmode='numeric' />
        </div>
        <div class='row'>
          <div class='col-6 mb-3'>
            <label for='cardExpiry' class='form-label'>Expiry</label>
            <input type='text' class='form-control' id='cardExpiry' placeholder='MM/YY' />
          </div>
          <div class='col-6 mb-3'>
            <label for='cardCvv' class='form-label'>CVV</label>
            <input type='text' class='form-control' id='cardCvv' placeholder='123' inputmode='numeric' />
          </div>
        </div>
      </div>

      <div class='payment-bottom'>
        <div>
          <div class='fw-bold' id='paymentAmountLabel'>$0/night</div>
          <small class='text-body-secondary'>Secure checkout</small>
        </div>
        <button type='submit' class='btn btn-primary'>Pay Now</button>
      </div>
    </form>
  </div>
</div>
";
include 'includes/footer.php';

?>

<?php
include 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { 
    header('Location: hotelList.php');
    exit();
    }

$query_hotel = "SELECT * FROM Hotel WHERE HotelID = $id";
$result_hotel = mysqli_query($conn, $query_hotel);
$row_hotel = mysqli_fetch_assoc($result_hotel);
if (!$row_hotel) { header('Location: hotelList.php');; }

$query_rooms = "SELECT * FROM Room WHERE HotelID = $id";
$result_rooms = mysqli_query($conn, $query_rooms);

echo "
<main>
  <section class='hero' style='background-image: url(\"{$row_hotel['MainImg']}\");'>
    <div class='content'>
      <h1>{$row_hotel['HotelName']}</h1>
      <br>
      <p>{$row_hotel['HotelMoto']}</p>
      <a href='#rooms' class='btnn btn-primaryy'>View Rooms</a>
    </div>
  </section>

  <section class='py-5 bg-body-tertiary'>
    <div class='container'>
      <div class='d-flex justify-content-between align-items-center mb-4'>
        <div>
          <h2 class='section-title' style='margin-bottom:12px;'>{$row_hotel['HotelName']}</h2>
          <p class='mb-1'>{$row_hotel['HotelType']} • {$row_hotel['HotelView']} • {$row_hotel['NearPlace']}</p>
          <p class='mb-0'>Check-in: {$row_hotel['CheckInHour']} • Check-out: {$row_hotel['CheckOutHour']}</p>
        </div>
      </div>

      <div class='row g-4 mb-5'>
        <div class='col-md-7'>
          <div class='card shadow-sm'>
            <img src='{$row_hotel['img2']}' class='card-img-top' alt='HotelImg2'>
          </div>
        </div>
        <div class='col-md-5'>
          <div class='row g-3'>
            <div class='col-6'>
              <div class='card shadow-sm'>
                <img src='{$row_hotel['img3']}' class='card-img-top' alt='HotelImg3'>
              </div>
            </div>
            <div class='col-6'>
              <div class='card shadow-sm'>
                <img src='{$row_hotel['img4']}' class='card-img-top' alt='HotelImg4'>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class='row g-4 mb-5'>
        <div class='col-md-7'>
          <h3 class='mb-3'>About this stay</h3>
          <p>{$row_hotel['AboutTheStay']}</p>
        

          <h5 class='mt-4 mb-2'>Amenities</h5>
          <p> {$row_hotel['HotelAmenities']}</p>
        </div>

        <div class='col-md-5'>
          <div class='card shadow-sm p-3'>
            <h4 class='mb-3'>Highlights</h4>
            <p class='mb-1'>• {$row_hotel['Highlight1']}</p>
            <p class='mb-3'>• {$row_hotel['Highlight2']}</p>

            <div class='d-flex justify-content-between align-items-center mb-3'>
              <div>
                <div class='fs-5 fw-bold'>{$row_hotel['MinimumPrice']}/night</div>
                <small class='text-body-secondary'>Taxes and fees not included</small>
              </div>
              <a href='#rooms' class='btn btn-primary'>Choose Room</a>
            </div>
          </div>
        </div>
      </div>

      <div id='rooms' class='mb-4'>
        <h3 class='mb-3'>Rooms</h3>
      </div>

      <div class='row row-cols-1 row-cols-md-3 g-4'>
";

/* Rooms */
if (mysqli_num_rows($result_rooms) > 0) {
  while ($row_room = mysqli_fetch_assoc($result_rooms)) {

    $RoomType = $row_room['RoomType'];
    $RoomFeature = $row_room['RoomFeature'];
    $RoomView = $row_room['RoomView'];
    $RoomSize = $row_room['RoomSize'];
    $Capacity = $row_room['Capacity'];
    $RoomDescription = $row_room['RoomDescription'];
    $RoomPrice = $row_room['RoomPrice'];
    $RoomImg = $row_room['RoomImg'];

    echo "
      <div class='col'>
        <div class='card shadow-sm h-100'>
          <img src='{$RoomImg}' class='card-img-top' alt='{$RoomType}'>
          <div class='card-body d-flex flex-column'>
            <h5>{$RoomType}</h5>
            <p class='mb-2'>{$RoomFeature} • {$RoomView} • {$RoomSize} • Sleeps {$Capacity}</p>
            <p class='mb-3'>{$RoomDescription}</p>
            <div class='mt-auto d-flex justify-content-between align-items-center'>
              <small class='text-body-secondary'>{$RoomPrice}/night</small>
              <a href='#' class='btn btn-sm btn-outline-secondary room-book-btn'
                 data-room='{$RoomType}' data-price='{$RoomPrice}'>Book</a>
            </div>
          </div>
        </div>
      </div>
    ";
  }
} else {
  echo "<div class='col-12'><p class='text-body-secondary'>No rooms found.</p></div>";
}

/* End of page */
echo "
      </div>

      <div class='text-center mt-5'>
        <a href='hotelList.php' class='btnn btn-show-more'>Back to Hotels</a>
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
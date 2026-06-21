<?php
$successMessage = "";
$reservationCode = "";

if (isset($_GET['status']) && $_GET['status'] == 'success' && isset($_GET['code'])) {
    $reservationCode = htmlspecialchars($_GET['code']);
    $successMessage = "Reservation submitted successfully!";
}
?>

<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/page1style.css">

<?php if (!empty($successMessage)): ?>
  <div class="reservation-success-box">
    <h3>Reservation Submitted Successfully!</h3>
    <p>Your Reservation Code:</p>
    <div class="reservation-code-box"><?php echo $reservationCode; ?></div>
    <p>Please save this code for future inquiries, changes, or cancellation.</p>
  </div>

  <script>
    alert("Reservation submitted successfully!\nYour Reservation Code: <?php echo $reservationCode; ?>\nPlease save this code for future inquiries or cancellation.");
  </script>
<?php endif; ?>

<div id="loader">
  <div class="loader-content">
    <h1>Gajah Mada</h1>
    <p>Restaurant</p>
    <div class="loading-bar">
      <div class="loading-fill"></div>
    </div>
  </div>
</div>

<section id="page1" class="page parallax bg1">
  <div class="text">
    <h2>
      <span>Gajah Mada</span>
      <span>Restaurant</span>
    </h2>
    <h1>"Old is Gold"</h1>
    <p>And we serve that</p>
    <p class="stars">✦✦✦</p>
  </div>
</section>

<section id="page2" class="page parallax bg2">
  <div class="text">
    <h1>Where Elegance Meets Home</h1>
    <p>What can we help you with, dear?</p>
  </div>
  <div class="menu_grid">
    <div class="oval" onclick="document.getElementById('page4').scrollIntoView({behavior:'smooth'})">Best Selling Menu</div>
    <div class="oval" onclick="window.location.href='page2.html#page12'">Types of Events</div>
    <div class="oval" onclick="window.location.href='page2.html#page15'">About Us</div>
    <div class="oval" onclick="window.location.href='page2.html#page16'">Reviews</div>
    <div class="oval" onclick="window.open('https://wa.me/628115631222', '_blank')">Contact Us</div>
    <div class="oval location-oval" onclick="window.open('https://maps.app.goo.gl/SKwZN5EfHUbjXBD59', '_blank')">
      <span>Location</span>
      <div class="location-preview">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8174676095205!2d109.3431701!3d-0.03745999999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d58553a624eab%3A0xb1dc104ddd5dad9c!2sRestaurant%20Gajah%20Mada!5e0!3m2!1sen!2sid!4v1778136580227!5m2!1sen!2sid"
          width="220" height="160" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>

<section id="page4" class="page parallax bg3">
  <div class="text">
    <h1>✦ Best Selling Menu ✦</h1>
    <p>Our Signature, Your Favorite</p>
  </div>
  <section id="page4gallery" class="gallery4">
    <figure class="gallery4-item">
      <img src="image/selondeng.jpg">
      <figcaption>Selondeng</figcaption>
    </figure>
    <figure class="gallery4-item">
      <img src="image/ounie.png">
      <figcaption>Ounie</figcaption>
    </figure>
    <figure class="gallery4-item">
      <img src="image/udangmentega1.jpg">
      <figcaption>Udang Mentega</figcaption>
    </figure>
  </section>
  <div class="stars4">
    <p>✦✦✦</p>
  </div>
</section>

<section id="page7" class="page parallax bg6">

  <div class="page7-center">
    <h1>Ready to Create a Memory?</h1>
    <p>Let us take care of the rest.</p>
  </div>

  <div class="reservation-form-wrapper">
    <form action="insert_reservation.php" method="POST" class="res-form">
      <div class="form-row">
        <div class="form-field">
          <label>Name</label>
          <input type="text" name="name" placeholder="Your full name" required>
        </div>
        <div class="form-field">
          <label>Phone Number</label>
          <input type="tel" name="phone_number" placeholder="+62 812 ..." required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label>Date</label>
          <input type="date" name="date" required>
        </div>
        <div class="form-field">
          <label>Time</label>
          <input type="time" name="time" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label>Number of Guests</label>
          <select name="number_of_guests" required>
            <option value="">Select</option>
            <option value="1">1 person</option>
            <option value="2">2 people</option>
            <option value="3">3 people</option>
            <option value="4">4 people</option>
            <option value="5-6">5–6 people</option>
            <option value="7-10">7–10 people</option>
            <option value="10+">10+ people</option>
          </select>
        </div>

        <div class="form-field">
          <label>Occasion (optional)</label>
          <select name="occasion">
            <option value="">None</option>
            <option value="Birthday">Birthday</option>
            <option value="Anniversary">Anniversary</option>
            <option value="Business Dinner">Business Dinner</option>
            <option value="Family Gathering">Family Gathering</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>

      <div class="form-field">
        <label>Special Requests (optional)</label>
        <textarea name="notes" placeholder="Dietary restrictions, seating preference, etc."></textarea>
      </div>

      <button type="submit" class="wa-btn">Submit Reservation</button>
      <p class="form-note">Your data will be saved securely in our system for confirmation.</p>
    </form>
  </div>

  <div class="buttontopage2">
    <div class="button1" onclick="window.open('https://wa.me/628115631222', '_blank')">Want to Reserve?</div>
    <div class="button2" onclick="window.location.href='page2.php'">➜</div>
  </div>

  <div class="name">
    <p>Old Recipes, Warm Memories ── Explore Them All.</p>
  </div>

  <?php
  /*
  <div class="cancel-reservation-wrapper" style="margin-top: 50px; text-align: center; color: antiquewhite;">
      <h3>Want to Cancel Your Reservation?</h3>
      <p>Enter your Reservation ID below to cancel:</p>
      <form action="cancel_reservation.php" method="POST" style="display: inline-block;">
          <input type="number" name="reservation_id" placeholder="e.g. 12" required
                style="padding: 8px; border-radius: 5px; border: 1px solid #c9a96e; background: rgba(255,255,255,0.1); color: #fff;">
          <button type="submit" class="wa-btn" style="width: auto; padding: 8px 20px; margin-top: 0;">Cancel Now</button>
      </form>
  </div>
  */
  ?>

  <div class="cancel-reservation-wrapper" style="margin-top: 50px; text-align: center; color: antiquewhite;">
    <h3>Need to Change or Cancel Your Reservation?</h3>
    <p>
      Please contact us via WhatsApp and mention your <strong>Reservation Code</strong> for any cancellation or reservation changes.
    </p>
    <button type="button" class="wa-btn" style="width: auto; padding: 8px 20px; margin-top: 10px;"
      onclick="window.open('https://wa.me/628115631222', '_blank')">
      Contact via WhatsApp
    </button>
  </div>

</section>

<script>
window.addEventListener('load', function() {
    var loader = document.getElementById('loader');
    if (loader) {
        loader.style.opacity = '0';
        setTimeout(function() {
            loader.style.display = 'none';
        }, 500);
    }
});
</script>

<script src="js/page1js.js"></script>

</body>
</html>

<!DOCTYPE HTML>
<html lang="eng">
<head> 
  <meta charset="UTF-8">
  <link rel="stylesheet" href="page1style.css">
</head>

<body>

  <!-- loading -->
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
        <img src="selondeng.jpg">
        <figcaption>Selondeng</figcaption>
      </figure>
      <figure class="gallery4-item">
        <img src="ounie.png">
        <figcaption>Ounie</figcaption>
      </figure>
      <figure class="gallery4-item">
        <img src="udangmentega1.jpg">
        <figcaption>Udang Mentega</figcaption>
      </figure>
    </section>
    <div class="stars4">
      <p>✦✦✦</p>
    </div>
  </section>

  <!-- PAGE 7 - TERPISAH DARI PAGE 4 -->
  <section id="page7" class="page parallax bg6">

    <div class="page7-center">
      <h1>Ready to Create a Memory?</h1>
      <p>Let us take care of the rest.</p>
    </div>

    <div class="reservation-form-wrapper">
      <div class="res-form">
        <div class="form-row">
          <div class="form-field">
            <label>Name</label>
            <input type="text" id="res-name" placeholder="Your full name">
          </div>
          <div class="form-field">
            <label>Phone Number</label>
            <input type="tel" id="res-phone" placeholder="+62 812 ...">
          </div>
        </div>
        <div class="form-row">
          <div class="form-field">
            <label>Date</label>
            <input type="date" id="res-date">
          </div>
          <div class="form-field">
            <label>Time</label>
            <input type="time" id="res-time">
          </div>
        </div>
        <div class="form-row">
          <div class="form-field">
            <label>Number of Guests</label>
            <select id="res-guests">
              <option value="">Select</option>
              <option>1 person</option>
              <option>2 people</option>
              <option>3 people</option>
              <option>4 people</option>
              <option>5–6 people</option>
              <option>7–10 people</option>
              <option>10+ people</option>
            </select>
          </div>
          <div class="form-field">
            <label>Occasion (optional)</label>
            <select id="res-occasion">
              <option value="">None</option>
              <option>Birthday</option>
              <option>Anniversary</option>
              <option>Business Dinner</option>
              <option>Family Gathering</option>
              <option>Other</option>
            </select>
          </div>
        </div>
        <div class="form-field">
          <label>Special Requests (optional)</label>
          <textarea id="res-notes" placeholder="Dietary restrictions, seating preference, etc."></textarea>
        </div>
        <button class="wa-btn" onclick="sendToWA()">Send via WhatsApp</button>
        <p class="form-note">Clicking will open WhatsApp with your details pre-filled. We'll confirm shortly.</p>
      </div>
    </div>

    <div class="buttontopage2">
      <div class="button1" onclick="window.open('https://wa.me/628115631222', '_blank')">Want to Reserve?</div>
      <div class="button2" onclick="window.location.href='page2.html'">➜</div>
    </div>

    <div class="name">
      <p>Old Recipes, Warm Memories ── Explore Them All.</p>
    </div>

  </section>

  <script>
  function sendToWA() {
    const name = document.getElementById('res-name').value.trim();
    const phone = document.getElementById('res-phone').value.trim();
    const date = document.getElementById('res-date').value;
    const time = document.getElementById('res-time').value;
    const guests = document.getElementById('res-guests').value;
    const occasion = document.getElementById('res-occasion').value;
    const notes = document.getElementById('res-notes').value.trim();

    if (!name || !phone || !date || !time || !guests) {
      alert('Please fill in all required fields (Name, Phone, Date, Time, Guests).');
      return;
    }

    const d = new Date(date);
    const formattedDate = d.toLocaleDateString('en-GB', { weekday:'long', year:'numeric', month:'long', day:'numeric' });
    const [h, m] = time.split(':');
    const hr = parseInt(h);
    const formattedTime = `${hr > 12 ? hr - 12 : hr || 12}:${m} ${hr >= 12 ? 'PM' : 'AM'}`;

    let msg = `Hello! I'd like to make a reservation.\n\n`;
    msg += `👤 Name: ${name}\n`;
    msg += `📞 Phone: ${phone}\n`;
    msg += `📅 Date: ${formattedDate}\n`;
    msg += `🕐 Time: ${formattedTime}\n`;
    msg += `👥 Guests: ${guests}\n`;
    if (occasion) msg += `🎉 Occasion: ${occasion}\n`;
    if (notes) msg += `📝 Notes: ${notes}\n`;
    msg += `\nLooking forward to hearing from you!`;

    window.open(`https://wa.me/628115631222?text=${encodeURIComponent(msg)}`, '_blank');
  }
  </script>

  <script src="page1js.js"></script>
</body>
</html>

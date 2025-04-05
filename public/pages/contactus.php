<!DOCTYPE html>
<html>
<head>
  <title>Contact Us - DisneyVerse</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #f3e8ff, #ede9fe);
      margin: 0;
      padding: 0;
      color: #4c1d95;
    }
    .header {
      text-align: center;
      padding: 30px;
      background: #c4b5fd;
      color: white;
      font-size: 32px;
      font-weight: bold;
      box-shadow: 0 4px 12px rgba(76, 29, 149, 0.3);
    }
    .container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      background: #f5f3ff;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(76, 29, 149, 0.2);
    }
    .section {
      margin-bottom: 30px;
    }
    .section h2 {
      color: #6b21a8;
      border-bottom: 2px solid #d8b4fe;
      padding-bottom: 8px;
    }
    .contact-form input, .contact-form textarea {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      border: 2px solid #d8b4fe;
      border-radius: 8px;
      background: #fff;
      color: #4c1d95;
    }
    .contact-form button {
      background: #d8b4fe;
      border: none;
      padding: 10px 15px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      color: #4c1d95;
      margin-top: 10px;
      transition: background 0.3s;
    }
    .contact-form button:hover {
      background: #c084fc;
    }
    .social-links {
      margin-top: 10px;
    }
    .social-links a {
      display: inline-block;
      margin-right: 20px;
      font-size: 22px;
      text-decoration: none;
      color: #6b21a8;
      transition: color 0.3s, transform 0.3s;
    }
    .social-links a:hover {
      color:#6b21a8;
      transform: scale(1.1);
    }
  </style>
</head>
<body>

  <div class="header">Contact Us - DisneyVerse</div>
  
  <div class="container">
    <div class="section">
      <h2>General Inquiries</h2>
      <p>Email: support@disneyverse.com</p>
      <p>Phone: +1 234 567 890</p>
    </div>

    <div class="section">
      <h2>Support & Feedback</h2>
      <p>Have an issue or suggestion? Reach out to our team for help!</p>
      <p>Email: feedback@disneyverse.com</p>
    </div>

    <div class="section">
      <h2>Business Collaborations</h2>
      <p>Interested in partnering with us? Let's create magic together!</p>
      <p>Email: business@disneyverse.com</p>
    </div>
    
    <div class="section">
      <h2>Follow Us</h2>
      <div class="social-links">
        <a href="#">Facebook</a>
        <a href="#">Instagram</a>
        <a href="#">Twitter</a>
      </div>
    </div>

    <div class="section contact-form">
      <h2>Send Us a Message</h2>
      <form action="contact_process.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required><br>
        <input type="email" name="email" placeholder="Your Email" required><br>
        <textarea name="message" rows="4" placeholder="Your Message" required></textarea><br>
        <button type="submit">Send Message</button>
      </form>
    </div>
  </div>

</body>
</html>

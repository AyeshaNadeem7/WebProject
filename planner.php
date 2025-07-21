<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plan Your Trip | TravelMate</title>
  <link rel="stylesheet" href="assets/style.css" />
</head>
<body>

  <header class="navbar">
    <div class="logo">TravelMate</div>
    <nav class="nav-links" id="navLinks">
      <a href="index.php">Home</a>
      <a href="contact.php">Contact</a>
    </nav>
    <div class="hamburger" id="hamburger">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </div>
  </header>

  <main class="planner-section">
  <h1>Plan Your Trip</h1>

  <form action="submit_planner.php" method="POST" id="tripPlannerForm">
    <!-- ALL your planner blocks go here -->

    <!-- Destination block -->
    <section id="destination" class="planner-block">
      <label for="destinationDropdown">Choose Destination</label>
      <select id="destinationDropdown" name="destination">
        <option value="">-- Select a destination --</option>
        <option value="hunza">Hunza</option>
        <option value="swat">Swat</option>
        <option value="murree">Murree</option>
        <option value="skardu">Skardu</option>
      </select>
    </section>

    <!-- Hotel block -->
    <section id="hotel" class="planner-block">
      <label for="hotelDropdown">Choose Hotel</label>
      <select id="hotelDropdown" name="hotel">
        <option value="">-- Select a hotel --</option>
        <option value="serena">Serena Hotel</option>
        <option value="hilltop">Hilltop Resort</option>
        <option value="valleyview">Valley View Inn</option>
      </select>
    </section>

    <!-- Meal block -->
    <section id="meal" class="planner-block">
      <label for="mealDropdown">Select Meal Preference</label>
      <select id="mealDropdown" name="meal">
        <option value="">-- Select meals --</option>
        <option value="veg">Vegetarian</option>
        <option value="non-veg">Non-Vegetarian</option>
        <option value="both">Both</option>
      </select>
    </section>

    <!-- Dates -->
    <section id="date" class="planner-block">
      <label for="startDate">Start Date</label>
      <input type="date" id="startDate" name="start_date" />

      <label for="endDate">End Date</label>
      <input type="date" id="endDate" name="end_date" />
    </section>

    <!-- Persons and Duration -->
    <section class="planner-block">
      <label for="persons">Number of Persons</label>
      <input type="number" id="persons" name="persons" min="1" required />

      <label for="duration">Number of Days</label>
      <input type="text" id="duration" name="duration_days" readonly />
    </section>

    <!-- Meal Plan & Transport -->
    <section class="planner-block">
      <label for="mealPlan">Meal Plan</label>
      <select id="mealPlan" name="meal_plan">
        <option value="">-- Select Plan --</option>
        <option value="standard">Standard (Rs. 1000 per person/day)</option>
        <option value="deluxe">Deluxe (Rs. 1500 per person/day)</option>
      </select>

      <label for="transport">Transportation Rent</label>
      <select id="transport" name="transport">
        <option value="">-- Select --</option>
        <option value="none">No Transport</option>
        <option value="included">Include (Rs. 4000 per day)</option>
      </select>
    </section>

    <!-- Submit button -->
    <button class="btn" id="generatePlanBtn" type="submit">Generate Plan</button>
  </form>

</main>

  <!-- Suggestion Box -->
  <div id="suggestionBox" class="suggestion-box"></div>

  <!-- Modal Summary -->
  <div id="summaryModal" class="modal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">×</span>
      <h2>Your Trip Summary</h2>
      <p><strong>Destination:</strong> <span id="summaryDestination"></span></p>
      <p><strong>Hotel:</strong> <span id="summaryHotel"></span></p>
      <p><strong>Meal:</strong> <span id="summaryMeal"></span></p>
      <p><strong>Start Date:</strong> <span id="summaryStart"></span></p>
      <p><strong>End Date:</strong> <span id="summaryEnd"></span></p>
      <p><strong>Places to Visit:</strong> <span id="summaryPlaces"></span></p>
      <p><strong>Breakfast:</strong> <span id="summaryBreakfast"></span></p>
      <p><strong>Lunch:</strong> <span id="summaryLunch"></span></p>
      <p><strong>Dinner:</strong> <span id="summaryDinner"></span></p>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 TravelMate. All rights reserved.</p>
  </footer>

  <script src="js/navbar.js"></script>
  <script src="js/planner.js"></script>
</body>
</html>

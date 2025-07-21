document.getElementById("generatePlanBtn").addEventListener("click", () => {
  const destination = document.getElementById("destinationDropdown").value;
  const hotel = document.getElementById("hotelDropdown").value;
  const meal = document.getElementById("mealDropdown").value;
  const start = document.getElementById("startDate").value;
  const end = document.getElementById("endDate").value;

  if (!destination || !hotel || !meal || !start || !end) {
    alert("Please fill in all fields before generating your plan.");
    return;
  }

const persons = parseInt(document.getElementById("persons").value);
const duration = parseInt(durationInput.value); // from auto calculation
const mealPlan = document.getElementById("mealPlan").value;
const transport = document.getElementById("transport").value;

const hotelCost = hotelPrices[hotel] * duration;
const mealCost = mealPrices[mealPlan] * persons * duration;
const transportCost = transport === "included" ? transportPerDay * duration : 0;
const total = hotelCost + mealCost + transportCost;

document.getElementById("summaryDestination").textContent = capitalize(destination);
document.getElementById("summaryHotel").textContent = capitalize(hotel);
document.getElementById("summaryMeal").textContent = capitalize(mealPlan);
document.getElementById("summaryStart").textContent = start;
document.getElementById("summaryEnd").textContent = end;

// 💸 Add total cost display inside the modal
const summaryBox = document.querySelector(".modal-content");
const existingTotal = document.getElementById("totalCostDisplay");
if (existingTotal) existingTotal.remove();

const costElement = document.createElement("p");
costElement.id = "totalCostDisplay";
costElement.innerHTML = `<strong>Total Estimated Cost:</strong> Rs. ${total.toLocaleString()}`;
summaryBox.appendChild(costElement);
// Places to visit
document.getElementById("summaryPlaces").textContent =
  destination in placesToVisit
    ? placesToVisit[destination].join(", ")
    : "Not available";

// Recommended meals
const meals = mealsByPlan[mealPlan];
if (meals) {
  document.getElementById("summaryBreakfast").textContent = meals.breakfast;
  document.getElementById("summaryLunch").textContent = meals.lunch;
  document.getElementById("summaryDinner").textContent = meals.dinner;
}

showSuggestions(persons, duration, mealPlan, transport);

  document.getElementById("summaryModal").style.display = "flex";
});




function closeModal() {
  document.getElementById("summaryModal").style.display = "none";
}

function capitalize(text) {
  return text.charAt(0).toUpperCase() + text.slice(1);
}

const startInput = document.getElementById("startDate");
const endInput = document.getElementById("endDate");
const durationInput = document.getElementById("duration");

function calculateDays() {
  const startDate = new Date(startInput.value);
  const endDate = new Date(endInput.value);

  if (startInput.value && endInput.value && endDate >= startDate) {
    const diffTime = Math.abs(endDate - startDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // include both start & end
    durationInput.value = diffDays + " days";
  } else {
    durationInput.value = "";
  }
}

startInput.addEventListener("change", calculateDays);
endInput.addEventListener("change", calculateDays);

const hotelPrices = {
  serena: 7000,
  hilltop: 5000,
  valleyview: 4000
};

const mealPrices = {
  standard: 1000,
  deluxe: 1500
};

const transportPerDay = 4000;

const placesToVisit = {
  hunza: ["Altit Fort", "Attabad Lake", "Passu Cones"],
  swat: ["Malam Jabba", "Fizagat Park", "White Palace"],
  murree: ["Mall Road", "Patriata Chairlift", "Pindi Point"],
  skardu: ["Shangrila Resort", "Deosai Plains", "Shigar Fort"]
};

const mealsByPlan = {
  standard: {
    breakfast: "Paratha, Omelette, Tea",
    lunch: "Daal Fry, Chicken Curry, Roti",
    dinner: "Biryani, Mixed Vegetables, Salad"
  },
  deluxe: {
    breakfast: "Halwa Puri, Boiled Eggs, Coffee",
    lunch: "Chicken Handi, Mutton Qorma, Naan",
    dinner: "BBQ Platter, Chicken Biryani, Green Salad"
  }
};

function showSuggestions(persons, days, mealPlan, transport) {
  const box = document.getElementById("suggestionBox");
  let suggestions = [];

  if (days <= 2 && mealPlan === "deluxe") {
    suggestions.push("💡 For short trips, Standard meal plan may be more budget-friendly.");
  }

  if (days >= 5 && mealPlan === "standard") {
    suggestions.push("🍽️ For longer trips, consider upgrading to Deluxe meals for more variety.");
  }

  if (transport === "included" && days >= 5) {
    suggestions.push("🚗 Consider renting transport locally to save up to Rs. 5,000+.");
  }

  if (suggestions.length > 0) {
    box.innerHTML = suggestions.join("<br>");
    box.style.display = "block";
  } else {
    box.style.display = "none";
  }
}

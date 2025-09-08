document.addEventListener("DOMContentLoaded", () => {
  const paymentForm = document.querySelector("form"); // Make sure this is your actual payment form
  const paymentTableBody = document.querySelector("table tbody");

  paymentForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const tenant = document.getElementById("tenant").value;
    const room = document.getElementById("room").value.trim();
    const date = document.getElementById("date").value;

    const rent = parseFloat(document.getElementById("rent").value) || 0;
    const electric = parseFloat(document.getElementById("electric").value) || 0;
    const water = parseFloat(document.getElementById("water").value) || 0;
    const internet = parseFloat(document.getElementById("internet").value) || 0;
    const laundry = parseFloat(document.getElementById("laundry").value) || 0;
    const paid = parseFloat(document.getElementById("paid").value) || 0;

    // Validation
    if (!tenant || !room || !date) {
      alert("Please complete all required fields.");
      return;
    }

    const total = rent + electric + water + internet + laundry;
    const balance = total - paid;

    const balanceDisplay = balance <= 0
      ? `<span class="text-success">₱0</span>`
      : `<span class="text-danger">₱${balance.toLocaleString()}</span>`;

    const newRow = document.createElement("tr");
    newRow.innerHTML = `
      <td>${date}</td>
      <td>${tenant}</td>
      <td>${room}</td>
      <td>₱${rent.toLocaleString()}</td>
      <td>₱${electric.toLocaleString()}</td>
      <td>₱${water.toLocaleString()}</td>
      <td>₱${internet.toLocaleString()}</td>
      <td>₱${laundry.toLocaleString()}</td>
      <td>₱${paid.toLocaleString()}</td>
      <td>${balanceDisplay}</td>
    `;

    paymentTableBody.appendChild(newRow);
    paymentForm.reset();
  });
});
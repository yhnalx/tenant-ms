const tenantData = {
  rentDueDate: 'July 1, 2025',
  totalDue: 4500,
  maintenanceInProgress: 2,
  unreadNotifications: 3
};

// Wait until DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  // Rent Status
  document.querySelector('.card.bg-success .card-text').innerHTML =
    `Next Due: <strong>${tenantData.rentDueDate}</strong><br>Total Due: <strong>₱${tenantData.totalDue.toLocaleString()}</strong>`;

  // Maintenance Requests
  document.querySelector('.card.bg-warning .card-text').textContent =
    `${tenantData.maintenanceInProgress} Request(s) In Progress`;

  // Notifications
  document.querySelector('.card.bg-info .card-text').textContent =
    `${tenantData.unreadNotifications} Unread Notification(s)`;
});
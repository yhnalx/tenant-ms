document.addEventListener('DOMContentLoaded', () => {
  const ctx = document.getElementById('rentChart').getContext('2d');

  const rentChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [{
        label: 'Rent Collected (₱)',
        data: [20000, 25000, 23000, 28000, 26000, 30000],
        backgroundColor: 'rgba(54, 162, 235, 0.7)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        borderRadius: 4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top'
        },
        title: {
          display: true,
          text: 'Monthly Rent Collection (Sample Data)'
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
});

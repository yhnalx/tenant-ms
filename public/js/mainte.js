document.addEventListener('DOMContentLoaded', () => {
  const table = document.getElementById('maintenanceTable');
  if (!table) {
    console.warn('maintenanceTable not found');
    return;
  }

  // VIEW BUTTON
  table.querySelectorAll('.viewBtn').forEach(button => {
    button.addEventListener('click', (e) => {
      const row = e.target.closest('tr');
      if (!row) return;
document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('viewModal');
  const maintenanceTable = document.getElementById('maintenanceTable');

  // Listen to modal before it shows
  modal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget; // Button that triggered the modal
    const row = button.closest('tr');

    // Populate modal content
    document.getElementById('modalUnit').textContent = row.children[1].textContent;
    document.getElementById('modalIssue').textContent = row.children[2].textContent;
    document.getElementById('modalSubmitter').textContent = row.children[4].textContent;
    document.getElementById('modalDate').textContent = row.children[5].textContent;
    document.getElementById('modalStatus').textContent = row.querySelector('.status').textContent.trim();
  });

  // Optional: clear fields when modal is hidden
  modal.addEventListener('hidden.bs.modal', () => {
    document.getElementById('modalUnit').textContent = '---';
    document.getElementById('modalIssue').textContent = '---';
    document.getElementById('modalSubmitter').textContent = '---';
    document.getElementById('modalDate').textContent = '---';
    document.getElementById('modalStatus').textContent = '---';
  });
});

      document.getElementById('modalUnit').textContent = row.children[1].textContent;
      document.getElementById('modalIssue').textContent = row.children[2].textContent;
      document.getElementById('modalSubmitter').textContent = row.children[4].textContent;
      document.getElementById('modalDate').textContent = row.children[5].textContent;
      document.getElementById('modalStatus').textContent = row.querySelector('.status').textContent.trim();
    });
  });

  // START BUTTON
  table.querySelectorAll('.startBtn').forEach(button => {
    button.addEventListener('click', (e) => {
      const row = e.target.closest('tr');
      const statusCell = row.querySelector('.status');
      statusCell.innerHTML = '<span class="badge bg-primary">In Progress</span>';
      button.remove();

      const completeBtn = document.createElement('button');
      completeBtn.className = 'btn btn-sm btn-success completeBtn ms-1';
      completeBtn.textContent = 'Mark as Completed';
      row.querySelector('td:last-child').appendChild(completeBtn);

      completeBtn.addEventListener('click', () => markAsCompleted(row, completeBtn));
    });
  });

  // COMPLETE BUTTON
  table.querySelectorAll('.completeBtn').forEach(button => {
    button.addEventListener('click', (e) => {
      const row = e.target.closest('tr');
      markAsCompleted(row, button);
    });
  });

  function markAsCompleted(row, button) {
    row.querySelector('.status').innerHTML = '<span class="badge bg-success">Completed</span>';
    button.remove();
  }
});

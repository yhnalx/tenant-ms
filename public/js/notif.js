document.addEventListener('DOMContentLoaded', () => {
  const titleEl = document.getElementById('modalNotifTitle');
  const messageEl = document.getElementById('modalNotifMessage');

  // Auto mark as read when viewing message
  document.querySelectorAll('.viewMessageBtn').forEach(button => {
    button.addEventListener('click', () => {
      const row = button.closest('tr');
      const statusCell = row.querySelector('.status-cell');
      const actionCell = row.querySelector('.action-cell');
      const isUnread = statusCell.textContent.trim().toLowerCase() === 'unread';

      // Show modal content
      titleEl.textContent = button.getAttribute('data-title');
      messageEl.textContent = button.getAttribute('data-message');

      if (isUnread) {
        statusCell.innerHTML = `<span class="badge bg-success">Read</span>`;
        row.classList.remove('table-warning');
        actionCell.innerHTML = `
          <button type="button" class="btn btn-sm btn-outline-warning toggle-status-btn">Mark as Unread</button>
        `;
        rebindToggle(row);
      }
    });
  });

  // Manual toggle (Mark as Read/Unread)
  document.querySelectorAll('.toggle-status-btn').forEach(button => {
    button.addEventListener('click', () => {
      toggleStatus(button.closest('tr'));
    });
  });

  // Toggle logic
  function toggleStatus(row) {
    const statusCell = row.querySelector('.status-cell');
    const actionCell = row.querySelector('.action-cell');
    const isUnread = statusCell.textContent.trim().toLowerCase() === 'unread';

    if (isUnread) {
      statusCell.innerHTML = `<span class="badge bg-success">Read</span>`;
      actionCell.innerHTML = `<button type="button" class="btn btn-sm btn-outline-warning toggle-status-btn">Mark as Unread</button>`;
      row.classList.remove('table-warning');
    } else {
      statusCell.innerHTML = `<span class="badge bg-warning text-dark">Unread</span>`;
      actionCell.innerHTML = `<button type="button" class="btn btn-sm btn-outline-success toggle-status-btn">Mark as Read</button>`;
      row.classList.add('table-warning');
    }

    rebindToggle(row);
  }

  // Rebind button after DOM update
  function rebindToggle(row) {
    const newBtn = row.querySelector('.toggle-status-btn');
    if (newBtn) {
      newBtn.addEventListener('click', () => {
        toggleStatus(row);
      });
    }
  }
});

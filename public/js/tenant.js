document.addEventListener('DOMContentLoaded', () => {
  const viewModal = document.getElementById('viewTenantModal');
  const editModal = document.getElementById('editTenantModal');

  if (viewModal) {
    viewModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      document.getElementById('viewName').textContent = button.getAttribute('data-name');
      document.getElementById('viewEmail').textContent = button.getAttribute('data-email');
      document.getElementById('viewPhone').textContent = button.getAttribute('data-phone');
      document.getElementById('viewAddress').textContent = button.getAttribute('data-address');
      document.getElementById('viewLease').textContent = button.getAttribute('data-lease');
      const status = button.getAttribute('data-status');
      const badge = document.getElementById('viewStatus');
      badge.textContent = status;
      badge.className = 'badge ' + (status === 'Approved' ? 'bg-success' : status === 'Pending' ? 'bg-warning' : 'bg-danger');
    });
  }

  if (editModal) {
    editModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const form = document.getElementById('editTenantForm');

      form.action = `/tenants/${button.getAttribute('data-id')}`;
      form.querySelector('[name=name]').value = button.getAttribute('data-name');
      form.querySelector('[name=email]').value = button.getAttribute('data-email');
      form.querySelector('[name=phone]').value = button.getAttribute('data-phone');
      form.querySelector('[name=address]').value = button.getAttribute('data-address');
      form.querySelector('[name=lease_start]').value = button.getAttribute('data-start');
      form.querySelector('[name=lease_end]').value = button.getAttribute('data-end');

      const badge = document.getElementById('editStatusBadge');
      const status = button.getAttribute('data-status');
      badge.textContent = status;
      badge.className = 'badge ' + (status === 'Approved' ? 'bg-success' : status === 'Pending' ? 'bg-warning' : 'bg-danger');
    });
  }

  document.querySelectorAll('form[action*="approve"], form[action*="reject"], form[action*="archive"]').forEach(form => {
    form.addEventListener('submit', e => {
      if (!confirm('Are you sure you want to continue?')) e.preventDefault();
    });
  });
});

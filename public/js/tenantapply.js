function showTenantDetails(tenant) {
  document.getElementById('viewFullName').innerText = tenant.full_name ?? '';
  document.getElementById('viewEmail').innerText = tenant.email ?? '';
  document.getElementById('viewPhone').innerText = tenant.contact ?? '';
  document.getElementById('viewAddress').innerText = tenant.current_address ?? '';
  document.getElementById('viewPreferred_unit_type').innerText = tenant.preferred_unit_type ?? '';
  document.getElementById('viewPreferred_movein_date').innerText = tenant.preferred_movein_date ?? '';
  document.getElementById('viewReason_renting').innerText = tenant.reason_renting ?? '';
  document.getElementById('viewEmployment_status').innerText = tenant.employment_status ?? '';
  document.getElementById('viewEmployer_name').innerText = tenant.employer_name ?? '';
  document.getElementById('viewEmergency_name').innerText = tenant.emergency_name ?? '';
  document.getElementById('viewEmergency_contact').innerText = tenant.emergency_contact ?? '';
  document.getElementById('viewEmergency_relationship').innerText = tenant.emergency_relationship ?? '';

  // ✅ Show status badge
  const badge = document.getElementById('viewStatus');
  badge.innerText = tenant.status ?? 'Unknown';
  badge.className = 'badge bg-' + (tenant.status === 'approved' ? 'success' : (tenant.status === 'rejected' ? 'danger' : 'secondary'));

   const idFile = tenant.id_file ? `/storage/${tenant.id_file}` : '#';
  document.getElementById('viewId_file_link').href = idFile;

  // Show photo image
  const photoFile = tenant.photo_file ? `/storage/${tenant.photo_file}` : '';
  document.getElementById('viewPhoto_file_img').src = photoFile;
}
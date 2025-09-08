document.addEventListener('DOMContentLoaded', () => {
  console.log('Manager profile page loaded');
});
document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebarClose = document.getElementById('sidebarClose');
  const mainContent = document.getElementById('mainContent');

  // Toggle sidebar
  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('show');
    if (sidebar.classList.contains('show')) {
      mainContent.classList.add('shifted');
    } else {
      mainContent.classList.remove('shifted');
    }
  });

  // Close sidebar
  sidebarClose.addEventListener('click', () => {
    sidebar.classList.remove('show');
    mainContent.classList.remove('shifted');
  });

  // Hide sidebar on content click (mobile only)
  mainContent.addEventListener('click', () => {
    if (window.innerWidth <= 768 && sidebar.classList.contains('show')) {
      sidebar.classList.remove('show');
      mainContent.classList.remove('shifted');
    }
  });

  // Reset sidebar on resize
  window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
      sidebar.classList.remove('show');
      mainContent.classList.remove('shifted');
    }
  });
});

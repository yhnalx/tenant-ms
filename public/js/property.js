document.addEventListener("DOMContentLoaded", function () {
  const rows = document.querySelectorAll("tbody tr");
  let currentRow = null;

  rows.forEach((row) => {
    const viewBtn = row.querySelector(".btn-primary");
    const editBtn = row.querySelector(".btn-warning");
    const assignBtn = row.querySelector(".btn-success");

    const unit = row.children[0].textContent.trim();

    // Check status value
    const statusSpan = row.children[3].querySelector("span");
    const status = statusSpan ? statusSpan.textContent.trim() : row.children[3].textContent.trim();

    // Hide Assign button if not Available
    if (assignBtn && status !== "Available") {
      assignBtn.style.display = "none";
    }

    // View Button
    if (viewBtn) {
      viewBtn.addEventListener("click", function () {
        currentRow = row;
        const modalBody = document.getElementById("modalBodyContent");
        modalBody.innerHTML = `
          <p><strong>Unit No.:</strong> ${row.children[0].textContent}</p>
          <p><strong>Type:</strong> ${row.children[1].textContent}</p>
          <p><strong>Monthly Rent:</strong> ${row.children[2].textContent}</p>
          <p><strong>Status:</strong> ${row.children[3].textContent}</p>
          <p><strong>Tenant:</strong> ${row.children[4].textContent}</p>
          <p><strong>Lease Start:</strong> ${row.children[5].textContent}</p>
          <p><strong>Lease End:</strong> ${row.children[6].textContent}</p>
        `;
        new bootstrap.Modal(document.getElementById("propertyModal")).show();
      });
    }

    // Edit Button
    if (editBtn) {
      editBtn.addEventListener("click", function () {
        currentRow = row;

        document.getElementById("editUnit").value = row.children[0].textContent.trim();
        document.getElementById("editType").value = row.children[1].textContent.trim();
        document.getElementById("editRent").value = row.children[2].textContent.replace(/[₱,]/g, '').trim();
        document.getElementById("editStatus").value = status;
        document.getElementById("editTenant").value = row.children[4].textContent.trim() !== '-' ? row.children[4].textContent.trim() : '';
        document.getElementById("editLeaseStart").value = row.children[5].textContent.trim() !== '-' ? row.children[5].textContent.trim() : '';
        document.getElementById("editLeaseEnd").value = row.children[6].textContent.trim() !== '-' ? row.children[6].textContent.trim() : '';

        new bootstrap.Modal(document.getElementById("editModal")).show();
      });
    }

    // Assign Button
    if (assignBtn && status === "Available") {
      assignBtn.addEventListener("click", function () {
        currentRow = row;
        document.getElementById("assignUnit").value = row.children[0].textContent.trim();
        new bootstrap.Modal(document.getElementById("assignModal")).show();
      });
    }
  });

  // Save changes from Edit Modal
  document.querySelector("#editForm button.btn-primary").addEventListener("click", function () {
    if (!currentRow) return;

    currentRow.children[0].textContent = document.getElementById("editUnit").value;
    currentRow.children[1].textContent = document.getElementById("editType").value;
    currentRow.children[2].textContent = "₱" + document.getElementById("editRent").value;

    const status = document.getElementById("editStatus").value;
    const statusSpan = document.createElement("span");
    statusSpan.classList.add("badge");
    statusSpan.classList.add(
      status === "Occupied" ? "bg-success" :
      status === "Available" ? "bg-secondary" : "bg-danger"
    );
    statusSpan.textContent = status;
    currentRow.children[3].innerHTML = '';
    currentRow.children[3].appendChild(statusSpan);

    currentRow.children[4].textContent = document.getElementById("editTenant").value || '-';
    currentRow.children[5].textContent = document.getElementById("editLeaseStart").value || '-';
    currentRow.children[6].textContent = document.getElementById("editLeaseEnd").value || '-';

    // Show or hide assign button based on new status
    const assignBtn = currentRow.querySelector(".btn-success");
    if (assignBtn) {
      assignBtn.style.display = (status === "Available") ? "inline-block" : "none";
    }

    currentRow = null;
  });

  // Save from Assign Modal
  document.querySelector("#assignForm button.btn-primary").addEventListener("click", function () {
    if (!currentRow) return;

    const tenant = document.getElementById("assignTenant").value;
    const start = document.getElementById("assignLeaseStart").value;
    const end = document.getElementById("assignLeaseEnd").value;

    currentRow.children[4].textContent = tenant || '-';
    currentRow.children[5].textContent = start || '-';
    currentRow.children[6].textContent = end || '-';

    const statusSpan = document.createElement("span");
    statusSpan.classList.add("badge", "bg-success");
    statusSpan.textContent = "Occupied";
    currentRow.children[3].innerHTML = '';
    currentRow.children[3].appendChild(statusSpan);

    // Hide the assign button after assigning
    const assignBtn = currentRow.querySelector(".btn-success");
    if (assignBtn) {
      assignBtn.style.display = "none";
    }

    currentRow = null;
  });
});

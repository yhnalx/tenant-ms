document.addEventListener("DOMContentLoaded", function () {
    // Status Chart (Pie)
    const ctxStatus = document.getElementById("statusChart");
    if (ctxStatus) {
        new Chart(ctxStatus, {
            type: "pie",
            data: {
                labels: ["Active", "Inactive"],
                datasets: [
                    {
                        data: [12, 2],
                        backgroundColor: ["#28a745", "#dc3545"],
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: "bottom" },
                },
            },
        });
    }

    // Properties Chart (Pie)
    const ctxProperties = document.getElementById("propertiesChart");
    if (ctxProperties) {
        new Chart(ctxProperties, {
            type: "pie",
            data: {
                labels: ["Vacant", "Occupied"],
                datasets: [
                    {
                        data: [12, 8],
                        backgroundColor: ["#28a745", "#ffc107"],
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: "bottom" },
                },
            },
        });
    }

    // Rent Outstanding Chart (Bar)
    const ctxRent = document.getElementById("rentChart");
    if (ctxRent) {
        new Chart(ctxRent, {
            type: "bar",
            data: {
                labels: ["Paid", "Unpaid"],
                datasets: [
                    {
                        label: "Rent Status",
                        data: [15, 5],
                        backgroundColor: ["#007bff", "#dc3545"],
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    }

    // Maintenance Chart (Pie)
    const ctxMaintenance = document.getElementById("maintenanceChart");
    if (ctxMaintenance) {
        new Chart(ctxMaintenance, {
            type: "pie",
            data: {
                labels: ["In Progress", "Resolved", "New", "In Review"],
                datasets: [
                    {
                        data: [9, 6, 5, 1],
                        backgroundColor: [
                            "#17a2b8",
                            "#28a745",
                            "#dc3545",
                            "#ffc107",
                        ],
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: "bottom" },
                },
            },
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    fetch("get_data.php")
        .then(response => response.json())
        .then(data => {
            console.log(data)
            const branches = data.map(row => row.branch);
            const counts = data.map(row => row.count);

            const ctx = document.getElementById("placementChart").getContext("2d");
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: branches,
                    datasets: [{
                        label: "Number of Placed Students",
                        data: counts,
                        backgroundColor: "blue"
                    }]
                }
            });
        });
});

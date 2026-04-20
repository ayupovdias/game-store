<!DOCTYPE html>
<html>
<head>
    <title>Statistics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container">

    @include("layout.header")

    <div>
        <div style="width:700px; height:400px;" class="m-auto border">
            <canvas id="bar"></canvas>
        </div>
        <div style="width:700px; height:400px;" class="m-auto border">
            <canvas id="pie"></canvas>
        </div>
        <div style="width:700px; height:400px;" class="m-auto border">
            <canvas id="doughnut"></canvas>
        </div>
        <div style="width:700px; height:400px;" class="m-auto border">
            <canvas id="polarArea"></canvas>
        </div>
        <div style="width:700px; height:400px;" class="m-auto border">
            <canvas id="line"></canvas>
        </div>
    </div>

    @include("layout.footer")

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0">

</script>
<script>
    let bar = document.getElementById("bar")
    let chartBar = new Chart(bar, {
        type: 'bar',
        data: {
            labels: ["19.02.2026", "20.02.2026", "21.02.2026", "22.02.2026", "23.02.2026", "24.02.2026", "25.02.2026"],
            datasets: [
                {
                    label: "Users' activity",
                    data: [50, 28, 63, 100, 23, 32, 98],
                    backgroundColor: ["red", "blue", "green", "yellow", "lime", "orange", "purple"]
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })

    let pie = document.getElementById("pie")
    let chartPie = new Chart(pie, {
        type: 'pie',
        data: {
            labels: ["0-12", "13-19", "20-35", "36-64", "65-120"],
            datasets: [
                {
                    label: "User's age statistics",
                    data: [15, 50, 25, 5, 5],
                    backgroundColor: [
                        "blue", "green", "yellow", "orange", "grey"
                    ]
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    tricks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })

    let doughnut = document.getElementById("doughnut")
    let chartDoughnut = new Chart(doughnut, {
        type: "doughnut",
        data: {
            labels: ["PC", "PlayStation", "Xbox", "Nintendo", "Mobile"],
            datasets: [
                {
                    label: "Platform Distribution",
                    data: [40, 25, 15, 10, 10],
                    backgroundColor: [
                        "blue",
                        "green",
                        "purple",
                        "orange",
                        "red"
                    ]
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    tricks: {
                        beginAtZero: true
                    }
                }]
            }
        }

    })

    let polarArea = document.getElementById("polarArea")
    let chartPolar = new Chart(polarArea, {
        type: "polarArea",
        data: {
            labels: ["Action", "RPG", "Strategy", "Sports", "Horror", "Adventure"],
            datasets: [{
                label: "Popular game genres",
                data: [120, 90, 70, 60, 50, 80],
                backgroundColor: [
                    "red",
                    "blue",
                    "green",
                    "orange",
                    "purple",
                    "cyan"
                ]
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    tricks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })

    let line = document.getElementById("line")
    let chartLine = new Chart(line, {
        type: "line",
        data: {
            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            datasets: [{
                label: "Daily Revenue ($)",
                data: [500, 700, 650, 900, 1200, 1500, 1100],
                borderColor: "blue",
                backgroundColor: "blue",
                fill: false,
                lineTension: 0.5
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous">
</script>

</body>
</html>

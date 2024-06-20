<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="date"],
        select {
            padding: 8px;
            margin: 5px;
            width: 100%;
        }

        input[type="submit"] {
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #result {
            display: none;
            /* Sembunyikan hasil awalnya */
            margin-top: 20px;
        }

        #bmiChart {
            display: none;
            /* Sembunyikan diagram awalnya */
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Kalkulator BMI/IMT</h2>
        <div class="row">
            <div class="col-md-12" id="formDiv">
                <!-- Formulir untuk input data -->
                <form id="bmiForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Tanggal Lahir:</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin:</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                         <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="height" class="form-label">Tinggi (cm):</label>
                        <input type="text" id="height" name="height" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Berat (kg):</label>
                        <input type="text" id="weight" name="weight" class="form-control" required>
                    </div>
                    <div>
                    <label for="addres" class="form-label">Alamat:</label>
                    <input type="text" id="addres" name="addres" class="form-control" required>
    </div>
                    <div>
                    <input type="submit" value="Hitung" name="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-12" id="resultDiv">
                <?php
                // Proses form saat dikirim
                if (isset($_POST['submit'])) {
                    // Ambil data dari form
                    $birthdate = $_POST['birthdate'];
                    $gender = $_POST['gender'];
                    $height = floatval($_POST['height']);
                    $weight = floatval($_POST['weight']);
                    $name = $_POST['name'];
                    $addres = $_POST ['addres'];

                    // Hitung BMI
                    $bmi = $weight / (($height / 100) * ($height / 100));
                    // Tentukan kategori BMI
                    $bmiCategory = "";
                    if ($bmi < 18.5) {
                        $bmiCategory = "Kurus";
                    } else if ($bmi >= 18.5 && $bmi < 23) {
                        $bmiCategory = "Normal";
                    } else if ($bmi >= 23 && $bmi < 27.5) {
                        $bmiCategory = "Gemuk";
                    } else {
                        $bmiCategory = "Obesitas";
                    }
                    // Tentukan gambar avatar berdasarkan jenis kelamin
                    $imgSrc = "";
                    if ($gender === "male") {
                        $imgSrc = "https://i.pinimg.com/564x/d7/fd/9e/d7fd9e0b952d5f9b9adff6ec29a8b20d.jpg";
                    } else {
                        $imgSrc = "https://i.pinimg.com/564x/70/e9/6e/70e96e9521754ef1c32684dbf9d8f8cb.jpg";
                    }
                    // Tampilkan hasil BMI dan avatar
                    echo '<div id="result" class="mt-4">
                            <div class="text-center">
                                <img src="' . $imgSrc . '" alt="Person" class="img-fluid rounded-circle mb-3">
                                <p>Nama         :'.$name.'</p>
                                <p>Tanggal Lahir: ' . $birthdate . '</p>
                                <p>Jenis Kelamin: ' . ($gender === "male" ? "Laki-laki" : "Perempuan") . '</p>
                                <p>BMI Anda: ' . number_format($bmi, 2) . '</p>
                                <p>Kategori BMI: ' . $bmiCategory . '</p>
                                <p>Alamat : '.$addres.'</p>
                            </div>
                        </div>';
                    // Tampilkan diagram BMI
                    echo '<canvas id="bmiChart" width="400" height="400" class="mt-4"></canvas>';
                    // Tampilkan hasil dan diagram, sembunyikan form
                    echo '<script>
                            document.getElementById("result").style.display = "block";
                            document.getElementById("bmiChart").style.display = "block";
                            document.getElementById("bmiForm").style.display = "none";
                        </script>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php
        if (isset($_POST['submit'])) {
            // Inisialisasi dan konfigurasi Chart.js
            echo 'var ctx = document.getElementById(\'bmiChart\').getContext(\'2d\');
                var myChart = new Chart(ctx, {
                    type: \'bar\',
                    data: {
                        labels: [\'Kurus\', \'Normal\', \'Gemuk\', \'Obesitas\'],
                        datasets: [{
                            label: \'Jumlah\',
                            data: [1, 1, 1, 1],
                            backgroundColor: [
                                \'rgba(255, 99, 132, 0.2)\',
                                \'rgba(54, 162, 235, 0.2)\',
                                \'rgba(255, 206, 86, 0.2)\',
                                \'rgba(75, 192, 192, 0.2)\',
                            ],
                            borderColor: [
                                \'rgba(255, 99, 132, 1)\',
                                \'rgba(54, 162, 235, 1)\',
                                \'rgba(255, 206, 86, 1)\',
                                \'rgba(75, 192, 192, 1)\',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });';
            // Perbarui data diagram berdasarkan kategori BMI
            switch ($bmiCategory) {
                case "Kurus":
                    echo 'myChart.data.datasets[0].data[0]++;';
                    break;
                case "Normal":
                    echo 'myChart.data.datasets[0].data[1]++;';
                    break;
                case "Gemuk":
                    echo 'myChart.data.datasets[0].data[2]++;';
                    break;
                case "Obesitas":
                    echo 'myChart.data.datasets[0].data[3]++;';
                    break;
                default:
                    break;
            }
            // Perbarui tampilan diagram
            echo 'myChart.update();';
        }
        ?>
    </script>
</body>

</html>
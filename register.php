<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = trim($_POST["nama"]);
    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $konfirmasi = trim($_POST["confirmPassword"]);

    if ($password !== $konfirmasi) {
        echo "<script>alert('Konfirmasi password tidak cocok!'); window.history.back();</script>";
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "pesona_db");
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $cek_email = "SELECT * FROM regist_user WHERE email = '$email'";
    $result = mysqli_query($conn, $cek_email);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.history.back();</script>";
    } else {
        $query = "INSERT INTO regist_user (nama, email, password) 
                  VALUES ('$nama', '$email', '$password')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Pendaftaran berhasil!'); window.location.href='login.html';</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

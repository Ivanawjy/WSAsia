<?php 
//VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$namaErr = $usernameErr = $passwordErr = $emailErr = "";

//JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if(isset($_POST['save'])){
    //JIKA DATA ADA YANG KOSONG
    if(!isset($_POST['fullname']) || !isset($_POST['username']) || !isset($_POST['role']) || !$_POST['email'] || !$_POST['password']){
        if($_POST['name'] == ""){
        $namaErr = "Name must be filled in!";
        }
        if($_POST['username'] == ""){
            $usernameErr = "Username must be filled in!";
        }
        if($_POST['password'] == ""){
            $passwordErr = "Role must be filled in!";
        }
        if($_POST['email'] == ""){
            $emailErr = "Email must be filled in!";
        }
        if($_POST['password'] == ""){
            $emailErr = "Password must be filled in!";
        }
    }else{
        //SELAIN DATA ADA YANG KOSONG (BERARTI SEMUA FORM TERISI)
        $nama = $_POST['fullname'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $query = "INSERT INTO user (fullname,username,role,password,email) VALUES('$nama', '$username','$role','$password', '$email')";

        //KONEKSI DATABASE DAN EKSEKUSI QUERY 
        if (mysqli_query($con, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">User has been created</div>";
        }else{
            //JIKA GAGAL KONEK DATABASE / EKSEKUSI QUERY
            echo "<div class=\"alert alert-danger\" role=\"alert\">Unable to create new user</div>";
        }
    }
}
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>adminprofile.php" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Back To Data
</a>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputNama">Name</label>
            <input type="text" name="fullname" class="form-control" id="inputNama" maxlength="40" required autofocus>
            <!-- TAMPILKAN ISI VARIABEL JIKA ADA -->
            <small class="text-danger"><?= $namaErr == "" ? "":"* $namaErr " ?></small>
        </div>
        <div class="form-group">
            <label for="inputUsername">Username</label>
            <input type="username" name="username" class="form-control" id="inputUsername" maxlength="30" required>
            <small class="text-danger"><?= $usernameErr == "" ? "":"* $usernameErr" ?></small>
        </div>
        <div class="form-group">
            <label for="role">Role: </label>
                <select class="form-control" id="role" name='role'>
                    <option value="none">Select Your Role</option>
                     <option value="administrator">Administrator</option>
                     <option value="staff">Staff</option>
                </select>
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" maxlength="50" required>
            <small class="text-danger"><?= $emailErr == "" ? "":"* $emailErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" maxlength="30" minlength="3" required>
            <small class="text-danger"><?= $passwordErr == "" ? "":"* $passwordErr" ?></small>
        </div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
    </form>
</div>
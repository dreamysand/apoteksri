<?php
// Tahap 1: Memverifikasi email
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    $table = "adminusers";
    $stmt = $conn->prepare("SELECT id, use_safety_question FROM $table WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;

    if ($result) {
        if ($result['use_safety_question'] == 'Ya') {
            $_SESSION['reset_id'] = $result['id'];
            $_SESSION['reset'] = 1; // Menandakan tahap reset password
            $_SESSION['email'] = $email;
        } else {
            $_SESSION['reset_id'] = $result['id'];
            $_SESSION['reset'] = 2; // Menandakan tahap reset password
            $_SESSION['email'] = $email;
        }
        
    } else {
        ?>
        <script>
            alert("Email Tidak Ada");
        </script>
        <?php
    }
}

// Tahap 2: Memproses reset password
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password']) && isset($_POST['confirmpassword'])) {
    if (isset($_SESSION['reset']) && $_SESSION['reset'] == 2) {
        $table = "adminusers";
        $id = $_SESSION['reset_id'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if ($password === $confirmpassword) {
            // Hash password dan update database
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE $table SET password=:password WHERE id=:id");
            $stmt->bindParam(":password", $passwordHash);
            $stmt->bindParam(":id", $id);
            if ($stmt->execute()) {
                ?>
                <script>
                    alert("Password Berhasil Direset");
                    window.location.href = "login.php"
                </script>
                <?php
                session_unset();
                session_destroy();
            } else {
                ?>
                <script>
                    alert("Password Gagal Direset");
                </script>
                <?php
            }
            $stmt = null;
        } else {
            ?>
            <script>
                alert("Password Gagal Dikonfirmasi");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Sesi Gagal");
        </script>
        <?php
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['question_1']) && isset($_POST['question_2']) && isset($_POST['question_3']) && isset($_POST['question_4']) && isset($_POST['question_5'])) {
    if (isset($_SESSION['reset']) && $_SESSION['reset'] == 1) {
        $question_1 = $_POST['question_1'];
        $question_2 = $_POST['question_2'];
        $question_3 = $_POST['question_3'];
        $question_4 = $_POST['question_4'];
        $question_5 = $_POST['question_5'];
        $table_question = "safety_question_answer";

        $stmt_question = $conn->prepare("SELECT * FROM $table_question WHERE id_user=:id_user");
        $stmt_question->bindParam(":id_user", $_SESSION['reset_id']);
        $stmt_question->execute();
        $result_question = $stmt_question->fetchAll(PDO::FETCH_ASSOC);

        // Cek jika hasilnya ada dan cocok dengan jawaban yang diberikan
        foreach ($result_question as $row) {
            if ($question_1 == $row['answer_question_number_1'] && 
                $question_2 == $row['answer_question_number_2'] && 
                $question_3 == $row['answer_question_number_3'] && 
                $question_4 == $row['answer_question_number_4'] && 
                $question_5 == $row['answer_question_number_5']) {
                if (isset($_POST['remember'])) {
                    setcookie("user", $_SESSION['email'], time() + (86400 * 30), "/");
                } else {
                    setcookie("user", $_SESSION['email'], 0, "/");
                }
                $_SESSION['reset'] =  2;
            } else {
                ?>
                <script>
                    alert("Konfirmasi Salah");
                </script>
                <?php  
            }
        }   
    }
}

$conn = null;
?>
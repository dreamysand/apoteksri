<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roles = "user";
    $status = "inactive";
    $gambar = "asset/layout/account.png";
    $table = "adminusers";
    $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $valueEmail = $stmt->fetchColumn();
    $stmt = null;
    if ($valueEmail>0) {
        ?>
        <script>
            alert("Email Sudah Ada");
        </script>
        <?php
    } else {
        $password_Hash = password_hash($password, PASSWORD_DEFAULT);
        $use_safety_question = isset($_POST['securityquest']) ? "Ya" : "Tidak";
        $stmt = $conn->prepare("INSERT INTO $table (email, username, password, roles, status, gambar, use_safety_question) VALUES (:email, :username, :password, :roles, :status, :gambar, :use_safety_question)");//buat template sql
        $stmt->bindParam(":email", $email);//input value ke template sql
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password_Hash);
        $stmt->bindParam(":roles", $roles);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":gambar", $gambar);
        $stmt->bindParam(":use_safety_question", $use_safety_question);
        if ($use_safety_question == 'Ya') {
            $_SESSION['safetyquest'] = 1;
            if ($stmt->execute()) {
                $last_id = $conn->lastInsertId();
                $_SESSION['last_id'] = $last_id;
                
            }
        } else {
            if ($stmt->execute()) {
                ?>
                <script>
                    alert("Berhasil Terdaftar");
                    window.location.href = "login.php";
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("<?php echo $username ?> Gagal Terdaftar");
                    window.location.href = "login.php";
                </script>
                <?php 
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['question_1']) && isset($_POST['question_2']) && isset($_POST['question_3']) && isset($_POST['question_4']) && isset($_POST['question_5'])) {
    $question_1 = $_POST['question_1'];
    $question_2 = $_POST['question_2'];
    $question_3 = $_POST['question_3'];
    $question_4 = $_POST['question_4'];
    $question_5 = $_POST['question_5'];
    $last_id = $_SESSION['last_id'];
    $table_question = "safety_question_answer";

    $sql_question = "INSERT INTO $table_question (id_user ,answer_question_number_1, answer_question_number_2, answer_question_number_3, answer_question_number_4, answer_question_number_5) VALUES (:id_user, :answer_question_1, :answer_question_2, :answer_question_3, :answer_question_4, :answer_question_5)";

    $stmt_question = $conn->prepare($sql_question);
    $stmt_question->bindParam(':id_user', $last_id);
    $stmt_question->bindParam(':answer_question_1', $question_1);
    $stmt_question->bindParam(':answer_question_2', $question_2);
    $stmt_question->bindParam(':answer_question_3', $question_3);
    $stmt_question->bindParam(':answer_question_4', $question_4);
    $stmt_question->bindParam(':answer_question_5', $question_5);

    if ($stmt_question->execute()) {
        ?>
        <script>
            alert("Berhasil Terdaftar");
            window.location.href = "login.php";
        </script>
        <?php
        session_unset();
        session_destroy();
    } else {
        ?>
        <script>
            alert("Gagal Terdaftar");
            window.location.href = "login.php";
        </script>
        <?php
        session_unset();
        session_destroy();
    }
}
?>
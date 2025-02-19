<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $table = "adminusers";
    $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    $stmt = null;
    // Lakukan verifikasi email & password dari database
    if ($result > 0) {
        $stmt = $conn->prepare("SELECT * FROM $table WHERE email=:email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $password_DB = $row['password'];
            $roles = $row['roles'];
            $username = $row['username'];
            if ($roles == 'admin') {
                if (password_verify($password, $password_DB)) {
                    $sql_status = "UPDATE $table SET status = 'active' WHERE id = :id"; 
                    $stmt_status = $conn->prepare($sql_status);
                    $stmt_status->bindParam(':id', $row['id']);
                    $stmt_status->execute();
                    $stmt_status = null;
                    $_SESSION['id_adminusers'] = $row['id'];
                    if ($row['use_safety_question'] == "Ya") {
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['safetyquest'] = 1;
                    } else {
                        if (isset($_POST['remember'])) {
                            setcookie("admin", $email, time() + (86400 * 30), "/");
                        } else {
                            setcookie("admin", $email, 0, "/");
                        }
                        $_SESSION['roles'] = $roles;
                        ?>
                        <script>
                            alert("Selamat Datang <?php echo $roles?> <?php echo $username ?>");
                            window.location.href = "index.php";
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script>
                        alert("Password salah");
                    </script>
                    <?php 
                }
            } else if ($roles == 'user') {
                if (password_verify($password, $password_DB)) {
                    $sql_status = "UPDATE $table SET status = 'active' WHERE id = :id"; 
                    $stmt_status = $conn->prepare($sql_status);
                    $stmt_status->bindParam(':id', $row['id']);
                    $stmt_status->execute();
                    $stmt_status = null;
                    $_SESSION['id_adminusers'] = $row['id'];
                    if ($row['use_safety_question'] == "Ya") {
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['safetyquest'] = 1;
                    } else {
                        if (isset($_POST['remember'])) {
                            setcookie("user", $email, time() + (86400 * 30), "/");
                        } else {
                            setcookie("user", $email, 0, "/");
                        }
                        $_SESSION['roles'] = $roles;
                        ?>
                        <script>
                            alert("Selamat Datang <?php echo $roles?> <?php echo $username ?>");
                            window.location.href = "index.php";
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script>
                        alert("Password salah");
                    </script>
                    <?php 
                }
            }
            $stmt = null;  
        }
    } else {
        echo "Login gagal";
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['question_1']) && isset($_POST['question_2']) && isset($_POST['question_3']) && isset($_POST['question_4']) && isset($_POST['question_5'])) {
    $question_1 = $_POST['question_1'];
    $question_2 = $_POST['question_2'];
    $question_3 = $_POST['question_3'];
    $question_4 = $_POST['question_4'];
    $question_5 = $_POST['question_5'];
    $table_question = "safety_question_answer";
    $table = 'adminusers';

    $stmt = $conn->prepare("SELECT * FROM $table WHERE email=:email");
    $stmt->bindParam(":email", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt_question = $conn->prepare("SELECT * FROM $table_question WHERE id_user=:id_user");
    $stmt_question->bindParam(":id_user", $_SESSION['id_adminusers']);
    $stmt_question->execute();
    $result_question = $stmt_question->fetchAll(PDO::FETCH_ASSOC);

    // Cek jika hasilnya ada dan cocok dengan jawaban yang diberikan
    foreach ($result_question as $row) {
        foreach ($result as $row_adminusers) {
            $roles = $row_adminusers['roles'];
            $username = $row_adminusers['username'];
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
                $_SESSION['roles'] = $roles;
                ?>
                <script>
                    alert("Selamat Datang <?php echo $roles?> <?php echo $username ?>");
                    window.location.href = "index.php";
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Konfirmasi Salah");
                    window.location.href = "login.php";
                </script>
                <?php  
            }
        }
    }   
}

$conn = null;//nutup koneksi conn
?>
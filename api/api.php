<?php
session_start();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header(
    'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept'
);

//local
$pdo = new PDO('mysql:dbname=franko;host=localhost', 'root', '');
function getConnexion()
{
    return new PDO(
        'mysql:host=localhost; dbname=franko; charset=UTF8',
        'root',
        ''
    );
}

$error = ['error' => false];
$action = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

function str_random($length)
{
    $alphabet =
        '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';

    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}
//controle des input
function verifyInput($inputContent)
{
    $inputContent = htmlspecialchars($inputContent);

    $inputContent = trim($inputContent);

    return $inputContent;
}

function getUsers()
{
    $pdo = getConnexion();
    $req = $pdo->prepare('SELECT *  FROM
        users ORDER BY id DESC ');
    $req->execute();
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function getCar($id)
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars
        WHERE id = ?");
    $req->execute([$id]);
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function getCars()
{
    $pdo = getConnexion();
    $req = $pdo->prepare('SELECT *  FROM cars ORDER BY id DESC');
    $req->execute([]);
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    //  return $datas;
}

function getCarsToSell()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars
        WHERE category = ? ORDER BY id DESC");
    $req->execute(['A vendre']);
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function getCarsToRent()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars
        WHERE category = ? ORDER BY id DESC");
    $req->execute(['A louer']);
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function getAllCars()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars
        WHERE status = ? ORDER BY id DESC");
    $req->execute(['Disponible']);
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function getLastAdded()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars ORDER BY id DESC
    LIMIT 3");
    $req->execute();
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function getFooterCars()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars ORDER BY views DESC
    LIMIT 2");
    $req->execute();
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    //  return $datas;
}

function getLastSaleAdded()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars
    WHERE category = ? ORDER BY id DESC
    LIMIT 3");
    $req->execute(['A vendre']);
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function getLastRentAdded()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars
    WHERE category = ? ORDER BY id DESC
    LIMIT 3");
    $req->execute(['A louer']);
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function getLastSold()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars
    WHERE category = 'A vendre' AND status = 'Non disponible'
    ORDER BY id DESC LIMIT 3");
    $req->execute();
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function getMostRated()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM cars
    ORDER BY rate DESC LIMIT 3");
    $req->execute();
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function newCar()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {
        $errors = [];
        if (empty($_POST['name'])) {
            $errors['name'] = 'Nom non valide';
        }

        if (empty($_POST['price'])) {
            $errors['price'] = 'Veuillez definir le prix';
        }

        if (empty($_POST['color'])) {
            $errors['color'] = 'Veuillez définir la couleur';
        }

        if (empty($_POST['brand_name'])) {
            $errors['brand_name'] = 'Veuillez définir la marque';
        }

        if (empty($_POST['category'])) {
            $errors['category'] = "Veuillez definir l'action";
        }

        if (empty($_POST['year'])) {
            $errors['year'] = "Veuillez definir l'année";
        }

        if (empty($_POST['rate'])) {
            $errors['year'] = "Veuillez definir l'état";
        }

        $_SESSION['car'] = [
            'name' => verifyInput($_POST['name']),
        ];

        if (!empty($errors)) { ?>
<ul>
    <?php foreach ($errors as $error): ?>
    <li style="color: red"><?= $error ?></li>
    <?php endforeach; ?>
</ul>
<?php }

        if (empty($errors)) {

            $name = verifyInput($_POST['name']);
            $price = verifyInput($_POST['price']);
            $description = verifyInput($_POST['description']);
            $year = verifyInput($_POST['year']);
            $category = verifyInput($_POST['category']);
            $color = verifyInput($_POST['color']);
            $brand_name = verifyInput($_POST['brand_name']);
            $rate = verifyInput($_POST['rate']);
            $status = 'Disponible';

            //On insere dans la table cars
            $sql = $pdo->prepare('INSERT INTO cars SET  date_of_insertion = NOW(),
                         name = ?, price = ?, description = ?, year = ?, category = ?, color = ?,
                         brand_name = ?, status = ?, rate = ?');

            $sql->execute([
                $name,
                $price,
                $description,
                $year,
                $category,
                $color,
                $brand_name,
                $status,
                $rate,
            ]);

            //on insere l'image
            $car_id = $pdo->lastInsertId();
            $pic1 = time() . '_' . $_FILES['pic1']['name'];
            $pic2 = time() . '_' . $_FILES['pic2']['name'];
            $pic3 = time() . '_' . $_FILES['pic3']['name'];
            $pic4 = time() . '_' . $_FILES['pic4']['name'];

            $target = '../public/img/' . $pic1;

            if (move_uploaded_file($_FILES['pic1']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE cars SET
                    pic1 = ? WHERE id = ? ");

                $req->execute([$pic1, $car_id]);
            }

            if (move_uploaded_file($_FILES['pic2']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE cars SET
                    pic2 = ? WHERE id = ? ");

                $req->execute([$pic2, $car_id]);
            }

            if (move_uploaded_file($_FILES['pic3']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE cars SET
                    pic3 = ? WHERE id = ? ");

                $req->execute([$pic3, $car_id]);
            }

            if (move_uploaded_file($_FILES['pic4']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE cars SET
                    pic4 = ? WHERE id = ? ");

                $req->execute([$pic4, $car_id]);
            }
            ?>
<script>
alert('Nouveau véhicule ajouté avec succs');
window.location.replace('./index.php?action=dashboard');
</script>
<?php
        }
    }
}

function searchCar()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {
        if (!empty($_POST['category'])) {
            $category = verifyInput($_POST['category']);
        }

        if (!empty($_POST['min_price'])) {
            $min_price = verifyInput($_POST['min_price']);
        }

        if (!empty($_POST['max_price'])) {
            $max_price['max_price'] = verifyInput($_POST['max_price']);
        }

        $req = $pdo->prepare(
            'SELECT * FROM cars WHERE category = ? AND price < ? AND price > ?'
        );
        $req->execute([$category, $min_price, $max_price]);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        sendJSON($datas);
        return $datas;
    }
}

function login()
{
    if (!empty($_POST)) {
        $pdo = getConnexion();

        $errors = [];

        if (
            isset($_POST['username'], $_POST['pass']) &&
            !empty($_POST['username'] && !empty($_POST['pass']))
        ) {
            $sql = 'SELECT * FROM `users` WHERE `username` = ?';

            $query = $pdo->prepare($sql);

            $query->execute([verifyInput($_POST['username'])]);

            $user = $query->fetch();

            if (!$user) {
                $errors['username'] = 'Utilisateur/mot de passe incorrect';
            }

            if (!password_verify($_POST['pass'], $user['pass'])) {
                $errors['pass'] = 'Utilisateur/mot de passe incorrect';
            }

            if (!empty($errors)) {
                $_SESSION['login'] = [
                    'username' => verifyInput($_POST['username']),
                    'pass' => verifyInput($_POST['pass']),
                ]; ?>

<script>
alert('Veuillez verifier vos identifiants');
window.location.replace('../index.php?action=login')
</script>
<?php
            }

            if (empty($errors)) {
                $_SESSION['user'] = [
                    'username' => $user['username'],
                    'role' => $user['admin'],
                ];
                header('Location: ../index.php?action=dashboard');
            }
        }
    }
}

function register()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {
        $errors = [];

        if (empty($_POST['first_name'])) {
            $errors['first_name'] = 'Prénom non valide';
        }

        if (empty($_POST['last_name'])) {
            $errors['last_name'] = 'Nom non valide';
        }

        if (
            empty($_POST['email']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $errors['email'] = 'Email non valide';
        } else {
            $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
            $req->execute([$_POST['email']]);
            $email = $req->fetch();
            if ($email) {
                $errors['email'] = 'Ce email est déjà utilisé';
            }
        }

        if (
            empty($_POST['phone_code']) ||
            !preg_match('/^[0-9]+$/', $_POST['phone_code'])
        ) {
            $errors['phone_code'] = 'Code téléphone non valide';
        }

        if (
            empty($_POST['phone_number']) ||
            !preg_match('/^[0-9]+$/', $_POST['phone_code'])
        ) {
            $errors['phone_number'] = 'Numero de téléphone non valide';
        }

        if (!empty($errors)) {
            include '../errors.php';
        }

        if (empty($errors)) {

            $email = verifyInput($_POST['email']);
            $first_name = verifyInput($_POST['first_name']);
            $last_name = verifyInput($_POST['last_name']);
            $phone_code = verifyInput($_POST['phone_code']);
            $phone_number = verifyInput($_POST['phone_number']);
            // $token = str_random(60);

            $sql = $pdo->prepare("INSERT INTO users SET date_of_insertion = NOW(),
                        email = ?, role = 'user', status='Active',
                        first_name = ?, last_name = ?, phone_code = ?,
                        phone_number = ?, username = 'use', pass='oklm'");

            $sql->execute([
                $email,
                $first_name,
                $last_name,
                $phone_code,
                $phone_number,
            ]);

            $user_id = $pdo->lastInsertId();

            $card = time() . '_' . $_FILES['pic']['name'];

            $target = './public/img/' . $card;

            if (move_uploaded_file($_FILES['pic']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE users SET
                          pic = ? WHERE id = ? ");

                $req->execute([$pic, $user_id]);
            }
            ?>
<script>
alert("Inscription réussie !! Vous serez rédirigé vers votre tableau de bord");
window.location.replace("../index.php?action=dashboard");
</script>
<?php
        }
    }
}

function logout()
{
    unset($_SESSION['user']);

    header('Location: ../index.php');
}

function search()
{
    if (!empty($_POST)) {

        $pdo = getConnexion();

        $errors = [];

        if (isset($_POST['brand'])) {
            $brand = verifyInput($_POST['brand']);
        } else {
            $brand = 'All';
        }

        if (isset($_POST['order'])) {
            $order = verifyInput($_POST['order']);
        } else {
            $order = 'Croissant';
        }

        if ($order = 'Croissant') {
            if ($brand = 'All') {
                $req = $pdo->prepare('SELECT * FROM cars
                 ORDER BY price ASC');
                $req->execute();
            } else {
                $req = $pdo->prepare('SELECT * FROM cars
                WHERE brand_name = ? ORDER BY price ASC');
                $req->execute([$brand]);
            }
        }

        if ($order = 'Décroissant') {
            if ($brand = 'All') {
                $req = $pdo->prepare('SELECT * FROM cars
                     ORDER BY price DESC');
                $req->execute();
            } else {
                $req = $pdo->prepare('SELECT * FROM cars
                    WHERE brand_name = ? ORDER BY price DESC');
                $req->execute([$brand]);
            }
        }

        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        sendJSON($datas);
        return $datas;
        ?>
<script>
window.location.replace('../search.php');
</script>
<?php
    } else {
         ?>
<script>
alert('Veuillez faire des selections');
</script>
<?php
    }
}

if ($action == 'login') {
    login();
}

if ($action == 'register') {
    register();
}

if ($action == 'newCar') {
    newCar();
}

if ($action == 'logout') {
    logout();
}

function sendJSON($infos)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}
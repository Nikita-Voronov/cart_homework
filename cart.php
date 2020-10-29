<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = ['sum' => 0, 'items' => []];
}
include 'W:\domains\cart.ua\list.php';
include 'W:\domains\cart.ua\delete.php';
$errors = [];
if (!empty ($_POST)) {
    if (isset($_POST['product']) && $_POST['product'] != 0) {
        $prod = $_POST['product'];
    } else {
        echo $errors['product'] = 'Выберите товар' . "<br>";
    }
}
if (isset ($_POST['count']) && $_POST['count'] != 0) {
    $count = $_POST['count'];
} else {
    echo $errors['count'] = 'Выберите количество' . "<br>";
}
if (empty($errors)) {
    $id=$product;
    $product = $product[$_POST['product']];
  //  $_SESSION['cart']['sum'] += $product['price'] * $count;
    if(isset($_SESSION['cart']['items']['id'])) {
        $count+=$_SESSION['cart']['items']['id']['count'];
       // calc ();
    }
    $_SESSION['cart']['items']['id'] = [
            'id'=>$product['id'],
        'name' => $product['name'],
        'count' => $count
    ];
}
function calc() {
    $items=$_SESSION['cart']['items'];
    $sum=0;
    foreach ($items as $key=>$item){
        $sum+=$item[$key]['price']*$item['count'];
    }
    $_SESSION['cart']['sum']=$sum;
    return $sum;
}

?>


<html lang="ru">
<head>
    <meta charset="utf-8">

    <title></title>
</head>
<body>
<div style="color: green;">
    К оплате <?php echo $_SESSION['cart']['sum']; ?><br>
    <table>
        <?php
        foreach ($_SESSION['cart']['items'] as $key => $items) {
            echo '<tr><td>' . $product['id'] . '</td><td>'
                . $items['name'] . '</td><td>' . $items['count'] . '</td><td><a href=/delete.php?id = ' . $key . '>Удалить</a></td ></tr>';
        }//var_dump($_SESSION['cart']['items']);
        ?>
    </table>
    <form action="" method="POST">
        <?php if ($errors['product']) {
            echo $errors['product'] . "<br>";
        } ?>
        <select name="product">
            <option value="0"> Choose your destiny</option>
            <?php foreach($product as $key=>$product){
            echo '<option value="'.$key.'">'.$product['name'].'</option>';
            } ?>
        </select> <br>
        <?php if (isset($errors['count'])) {
            echo $errors['count']  ;
        } ?>
        Количество: <br>
        <input name="count" type="text"/><br>
        <input type="submit" value="kupit`"/>
    </form>

</div>
</body>
</html>


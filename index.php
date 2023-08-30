<?
include_once 'setting.php';
try {
    $guestbook = new DB('message');
} catch (Exception $e) {
    echo $e;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>訪客留言版</title>
</head>

<body>
    <?
    include 'header.php';
    $total_columns = $guestbook->countColumns();
    $data = $guestbook->orderByDescend('date');
    $row_per_page = 5;

    $total_page = ceil($total_columns / $row_per_page);
    if (!empty($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $bg[0] = "#D9D9FF";
    $bg[1] = "#FFCAEE";
    $bg[2] = "#FFFFCC";
    $bg[3] = "#B9EEB9";
    $bg[4] = "#B9E9FF";
    ?>
    <table align="center" style="height: 75px;width:70%;border: 1px solid;">
        <?
        for ($i = ($current_page - 1) * $row_per_page; $i < ($current_page - 1) * $row_per_page + $row_per_page; $i++) {
            if ($i < $total_columns) {
        ?>
                <tr style="background-color:<?= $bg[$i % $row_per_page]; ?>;">
                    <td style="width:15%;" align='center'><img src="image/<?= $i % 10; ?>.gif"></td>
                    <td style="width:45%">
                        作者 : <?= $data[$i]['author']; ?>.<br>
                        主題 : <?= $data[$i]['subject']; ?>.<br>
                        時間 : <?= $data[$i]['date']; ?>.<br>
                        <hr>
                        內容 : <?= $data[$i]['content']; ?>
                    </td align="center" style="width:5%;">
                    <td align="center" style="width:5%;">
                        <form action="edit.php?do=update" method="post">
                            <input type="hidden" name="id" value=<?= $data[$i]['id']; ?>>
                            <input type="submit" value="編輯">
                        </form>
                    </td>
                    <td align="center" style="width:5%;">
                        <form action="api/delete.php" method="post">
                            <input type="hidden" name="id" value=<?= $data[$i]['id']; ?>>
                            <input type="submit" value="刪除">
                        </form>
                    </td>
                </tr>
        <?
            }
        }
        ?>
    </table>
    <br><br>
    <div style="height: 30px;width:100%;" align="center">
        <?
        if ($current_page > 1) {
        ?>
            <a href="?page=<?= $current_page - 1; ?>">上一頁</a>
        <?
        }
        for ($i = 1; $i <= $total_page; $i++) {
        ?>
            <a href="?page=<?= $i; ?>"><?= $i; ?></a>
        <?
        }
        if ($current_page <  $total_page) {
        ?>
            <a href="?page=<?= $current_page - 1; ?>">下一頁</a>
        <?
        }
        ?>
    </div>
    <div style="height: 50px;width:100%;" align="center">
        <button onclick="location='edit.php?do=post'">
            <font size="7">新增貼文</font>
        </button>
    </div>

</body>

</html>
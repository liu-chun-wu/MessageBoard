<?
include_once 'setting.php';
$guestbook = new DB('message');
$data = $guestbook->findById($_POST['id']);
?>
<h2 align="center">編輯貼文</h2>
<form action="api/update.php" method="post">
    <table align="center" style="height: 75px;width:70%;border: 1px solid;">
        <tr align="center">
            <td><label for="author">作者 : </label><input type=" ext" name="author" value="<?= $data['author']; ?>"></td>
        </tr>
        <tr align="center">
            <td><label for="subject">主題 : </label><input type="text" name="subject" value="<?= $data['author']; ?>"></td>
        </tr>
        <tr align="center">
            <td><label for="content">內容 : </label><input type="text" name="content" value="<?= $data['author']; ?>"></td>
        </tr>
        <td><input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>"></td>
        <td><input type="hidden" name="id" value="<?= $data['id']; ?>"></td>
        <tr align="center">
            <td><input type="submit" value="儲存變更"><input type="reset" value="重新輸入"></td>
        </tr>
    </table>
</form>
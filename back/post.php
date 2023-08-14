<h2 align="center">新增貼文</h2>
<form action="api/post.php" method="post">
    <table align="center" style="height: 75px;width:70%;border: 1px solid;">
        <tr align="center">
            <td><label for=" author">作者 : </label><input type=" text" name="author"></td>
        </tr>
        <tr align="center">
            <td><label for="subject">主題 : </label><input type=" text" name="subject"></td>
        </tr>
        <tr align="center">
            <td><label for="content">內容 : </label><input type=" text" name="content"></td>
        </tr>
        <td><input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>"></td>
        <tr align="center">
            <td><input type="submit" value="新增文章"><input type="reset" value="重新輸入"></td>
        </tr>
        <tr></tr>
        <tr></tr>
    </table>
</form>
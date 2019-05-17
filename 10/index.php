<?php 

phpinfo();
 ?>

<form id="form1" name="form1" method="post" action="post.php">
    <input type="text" name="code" />
    <img  src="verifyRand.php" id = "refresh" title="刷新验证码" align="absmiddle" onclick="document.getElementById('refresh').src='verifyRand.php' ">
    <font color="#ffffff">点击图片刷新</font>
    <input type="submit" value="登录"/>
</form>



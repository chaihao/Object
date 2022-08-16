<script type="text/javascript">
	// 127.0.0.1换成实际workerman所在ip
ws = new WebSocket("ws://127.0.0.1:4236");
ws.onmessage = function(e) {
    alert("收到服务端的消息：" + e.data);
};
ws.send('hello world');

</script>
<!-- 
<?php 

 ?> -->

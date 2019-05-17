<?php
/* Smarty version 3.1.34-dev-1, created on 2019-02-26 07:58:53
  from '/Users/chaihao/object/php/DqWeb/templates/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-1',
  'unifunc' => 'content_5c74f1bd84f224_23907613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '158113682343495c610e4474051c52a3b56b29a4' => 
    array (
      0 => '/Users/chaihao/object/php/DqWeb/templates/add.tpl',
      1 => 1546797228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c74f1bd84f224_23907613 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html style="height:100%;">
<head>
    <meta charset="utf-8">
    <title>延迟队列配置系统</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/dq.js"><?php echo '</script'; ?>
>
</head>
<body style="min-height:100%;margin:0;padding:0;position:relative;">
<div style="height: 40px; width: 100%;background-color: #337ab7;color: white;padding-top: 8px;font-size: 18px;font-weight: bold;padding-left: 20px">延时队列配置系统</div>
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['id'];?>
" id="task_id">
<ul id="myTab" class="nav nav-tabs">
    <li  class="<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'topic_server' || empty($_smarty_tpl->tpl_vars['tab']->value)) {?>active<?php }?>"  >
        <a href="#topic_server" data-toggle="tab">
            添加redis
        </a>
    </li>
    <li  class="<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'topic_add') {?>active<?php }?>"  >
        <a href="#topic_add" data-toggle="tab">
            新增topic
        </a>
    </li>
    <li class="<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'topic_list') {?> active<?php }?>"  ><a href="#topic_list" data-toggle="tab">topic列表</a></li>
    <li class="<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'alert') {?> active<?php }?>"  ><a href="#alert" data-toggle="tab">告警设置</a></li>
</ul>

<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in <?php if ($_smarty_tpl->tpl_vars['tab']->value == 'topic_server' || empty($_smarty_tpl->tpl_vars['tab']->value)) {?>active<?php }?>" id="topic_server">
        <form class="form-horizontal" role="form" style="margin-top: 30px">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control t_name"
                           placeholder="请输入名称 " style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['t_name'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">redis信息</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control t_content" id="lastname"
                           placeholder="请输入redis信息" style="width: 400px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['t_content'];?>
">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default btn-redis">提交</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>名称</th>
                <th>配置</th>
                <th>状态</th>
                <th>版本</th>
                <th>内存使用</th>
                <th>总写入</th>
                <th>总消费</th>
                <th>总删除</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['redis_list']->value, 'redis');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['redis']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['redis']->value['t_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['redis']->value['t_content'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['redis']->value['online_desc'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['redis']->value['redis_version'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['redis']->value['used_memory_human'];?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['redis']->value['total_nums'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['redis']->value['notify_nums'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['redis']->value['total_del'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><a href="/index.php?op=redis_add&id=<?php echo $_smarty_tpl->tpl_vars['redis']->value['id'];?>
&<?php echo http_build_query($_smarty_tpl->tpl_vars['redis']->value);?>
">修改</a>|<a href="#" class="op-del"  data-url="/add.php?op=del&table=dq_redis&id=<?php echo $_smarty_tpl->tpl_vars['redis']->value['id'];?>
">删除</a></td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade in <?php if ($_smarty_tpl->tpl_vars['tab']->value == 'topic_add') {?>active<?php }?>" id="topic_add">
        <form class="form-horizontal" role="form" style="margin-top: 30px">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control t_name" id="firstname"
                           placeholder="请输入名称 " style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['t_name'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">topic</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control topic" id="lastname"
                           placeholder="请输入topic" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['topic'];?>
">
                    <span style="color: red;display: none" id="topic-err">topic已存在请重新输入</span>
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">延迟时间:(单位秒)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control delay" id="lastname"
                           placeholder="请输入延迟时间" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['delay'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">回调通知url</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control callback" id="lastname"
                           placeholder="请输入地址" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['callback'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">请求方式</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control method" id="lastname"
                           placeholder="请输入请求方式GET|POST" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['method'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">重试标记</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control re_notify_flag" id="lastname"
                           placeholder="" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['re_notify_flag'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">超时时间</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control timeout" id="lastname"
                           placeholder="请输入超时时间" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['timeout'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">优先级</label>
                <div class="col-sm-10">
                    <select id="priority">
                        <option value="1"  <?php if ($_smarty_tpl->tpl_vars['get']->value['priority'] == '1') {?>selected = "selected"<?php }?>>高</option>
                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['get']->value['priority'] == '2') {?>selected = "selected"<?php }?>>中</option>
                        <option value="3" <?php if ($_smarty_tpl->tpl_vars['get']->value['priority'] == '3') {?>selected = "selected"<?php }?>>低</option>
                    </select>
                    备注：优先级越高越快被消费
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">异常通知</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control email" id="lastname"
                           placeholder="请输入邮箱地址" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['email'];?>
">
                    备注:(回调接口出现问题，dns解析超时,接口超时，302错误邮件通知)
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label  ">创建人</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control createor" id="lastname"
                           placeholder="请输入创建人" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['createor'];?>
">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default btn-topic">提交</button>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane fade in <?php if ($_smarty_tpl->tpl_vars['tab']->value == 'topic_list') {?> active<?php }?>" id="topic_list">

        <table class="table table-bordered">
            <caption>
                <div class="col-sm-10">
                    <input type="text" class="form-control s_topic"
                           placeholder="请输入topic查找 " style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['s_topic'];?>
"><br>
                    <input type="text" class="form-control s_name"
                           placeholder="请输入名称查找 " style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['get']->value['s_name'];?>
">
                    <br>
                    <button type="submit" class="btn btn-default btn-search" >查找</button>
                </div>
            </caption>
            <thead>
            <tr>
                <th>编号</th>
                <th>名称</th>
                <th>topic</th>
                <th>回调地址</th>
                <th>超时时间</th>
                <th>延迟时间(单位:s)</th>
                <th>异常通知地址</th>
                <th>优先级</th>
                <th>总写入</th>
                <th>总删除</th>
                <th>总消费</th>
                <th>今日写入</th>
                <th>今日删除</th>
                <th>今日消费</th>
                <th>今日异常</th>
                <th>状态</th>
                <th>创建人</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['topic_list']->value, 'topic');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['topic']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['topic']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['topic']->value['t_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['topic']->value['topic'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['topic']->value['callback'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['topic']->value['timeout'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['topic']->value['delay'];?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['email'])===null||$tmp==='' ? '-' : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['priority_name'])===null||$tmp==='' ? '-' : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['total_write'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['total_del'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['total_notfiy'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['today_write'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['today_del'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['today_notify'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['today_exp'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['topic']->value['status_desc'];?>
</td>
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value['createor'])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                <td>
                    <a href="/index.php?tab=topic_add&<?php echo http_build_query($_smarty_tpl->tpl_vars['topic']->value);?>
">修改</a>|
                    <a href="#" class="op-del"  data-url="/add.php?op=del&table=dq_topic&id=<?php echo $_smarty_tpl->tpl_vars['topic']->value['id'];?>
">删除</a>
                    <a href="#" class="update-status" data-status="<?php echo $_smarty_tpl->tpl_vars['topic']->value['online_status'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['topic']->value['id'];?>
" data-table="dq_topic"><?php echo $_smarty_tpl->tpl_vars['topic']->value['online'];?>
</a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['page']->value) {?>active<?php }?>"><a href="/index.php?tab=topic_list&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
            <?php }
}
?>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
    <div class="tab-pane fade in <?php if ($_smarty_tpl->tpl_vars['tab']->value == 'alert') {?>active<?php }?>" id="alert">
        <div class="form-horizontal" role="form" style="margin-top: 30px">
            <input type="hidden" id="alert-id" value="<?php echo $_smarty_tpl->tpl_vars['alert']->value['id'];?>
">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">SMTP服务器</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control t_smtp_host"
                           placeholder="输入smtp服务器地址" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['alert']->value['host'];?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">端口</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control t_smtp_port"
                           placeholder="输入smtp服务器端口" style="width: 200px" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['alert']->value['port'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">用户名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control t_smtp_user" id="lastname"
                           placeholder="输入用户名" style="width: 200px" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['alert']->value['user'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">密码</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control t_smtp_pwd"
                           placeholder="输入密码" style="width: 200px" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['alert']->value['pwd'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
">
                </div>
            </div>
            <div style="width:100%;height:0px;border-top:1px black dashed;"></div>
            <br>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label ">redis宕机通知</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control t_redis_down" id="lastname"
                           placeholder="输入通知邮件列表逗号','分隔" style="width: 300px" value="<?php echo $_smarty_tpl->tpl_vars['alert']->value['ext']['redis'];?>
">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default btn-alert">保存</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<br><br>
<div style="background-color: gray;width: 100%;height: 40px;position:absolute;bottom:0;color: white;padding-top: 10px;float: right;padding-left: 20px">
    <a href="https://github.com/chenlinzhong/php-delayqueue" style="color: white">Github</a> | designed 2018.09
</div>
</body>
</html><?php }
}

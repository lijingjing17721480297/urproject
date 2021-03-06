<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/lib/html5.js"></script>
    <script type="text/javascript" src="/Public/lib/respond.min.js"></script>
    <script type="text/javascript" src="/Public/lib/PIE_IE678.js"></script>
    <![endif]-->
    <link href="/Public/static//h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="/Public/static//h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
    <link href="/Public/static//h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--<title>后台登录 - H-ui.admin v2.5</title>-->
    <meta name="keywords" content="上海幽然后台模版">
    <meta name="description" content="H-ui.admin v2.3，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
    <!--<script src="../../../phpstudy/WWW/newProject/Public//Public/static//h-ui/js/H-ui.js"></script>-->
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form class="form form-horizontal login-form"  action="/home/users/do_login" method="post">
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="username" type="text" placeholder="账户" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="vcode" class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
                    <img id="code" src="/home/parent/create_vcode" width="30%" style="height: 33px;"> <a id="kanbuq" onclick="change_vcode()">看不清，换一张</a>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <label for="online">
                        <input type="checkbox" name="online" id="online" value="">
                        使我保持登录状态</label>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                    <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">Copyright 上海幽然实业 by H-ui.admin.v2.5</div>
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/static//h-ui/js/H-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
    //修改验证码
    function change_vcode(){
        $('#code').attr('src',"/home/parent/create_vcode");
    }

    $(function () {
        $('.login-form').validate({
            submitHandler: function() {
                //验证通过后 的js代码写在这里
                var request=$('.login-form').serialize();
//                console.log(request);
                $.ajax({
                    type:'POST',
                    url:'/home/users/do_login',
                    data:request,
                    dataType:'json',
                    success:function(data,status){
                        console.log(status);
                        console.log(data);
                        var id = data.id;
                        if(data.status=="OK"){
                            console.log(data.msg);
                            window.location.href="/home/Category/categoryList/?id="+id;
                        }else{
                            console.log(data.msg);
                            change_vcode();
                        }
                    }
                });
                return false;
            }
        });

        $('#forget-password').click(function() {
            $('.login-form').hide();
            $('.forget-form').show();
        });

        $('#back-btn').click(function() {
            $('.login-form').show();
            $('.forget-form').hide();
        });

        $('#register-btn').click(function() {
            $('.login-form').hide();
            $('.register-form').show();
        });

        $('#register-back-btn').click(function() {
            $('.login-form').show();
            $('.register-form').hide();
        });
    });
</script>

</body>
</html>
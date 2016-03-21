<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="utf-8">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <style>div{display: block;} .errors{color: red;}</style>
</head>
<body>
    <h1>Please Login</h1>
    <?php echo form_open('Login/login');?>
    <p>
        <?php 
            echo form_label('Email: ', 'email');
            echo form_input('email', set_value('email'), 'id="email" autofocus'); // set_value 如果密码输入有误, 返回时,默认写入值
        ?>
    </p>
    <p>
        <?php 
            echo form_label('Password: ', 'password');
            echo form_input('password', '', 'id="password"');
        ?>
    </p>
    <p>
        <?php echo form_submit('submit','Login');?>
    </p>
    <?php echo form_close();?>
    
    <div class="errors"><?php echo validation_errors();?></div>
</body>
</html>
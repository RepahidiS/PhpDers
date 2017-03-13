<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/materialize.min.css">
    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Php Ders - Giriş Yap</title>
</head>
<body>
<div class="container">
    <h1>Giriş Yap</h1>
    <div class="row">
        <?=form_open("loginController/login");?>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">email</i>
                <?=form_input(array("name" => "email", "id" => "email", "class" => "validate"));?>
                <?=form_label("E-Mail", "", array("for" => "name"));?>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">vpn_key</i>
                <?=form_input(array("name" => "password", "id" => "password", "class" => "validate", "type" => "password"));?>
                <?=form_label("Şifre", "", array("for" => "password"));?>
            </div>
            <div class="input-field col s12">
                <?=form_submit(array("value" => "Giriş Yap", "class" => "btn col s12", "type" => "submit"));?>
            </div>
        </div>
        <?=form_close();?>
    </div>
    <?php if(isset($msg)):?>
        <h5 style="background-color:red;padding:5px;color:white;"><?=$msg?></h5>
    <?php endif;?>
</div>
</body>
</html>
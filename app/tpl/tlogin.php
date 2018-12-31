<?php

include 'head_common.php';
?>
<body>
<div class="container-fluid">
    <div class="jumbotron">
        <h2 align="center"><a href="home">TODO</a></h2>
        <h3 align="center"><?= $this->page; ?></h3>
    </div>
    <form class="form-horizontal" method="post" action="login/log">
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">email</label>

            <div class="col-sm-8">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="passwd" id="password" placeholder="Password">
            </div>
        </div>

        <div class="form-group">

            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default" id="btn-log" >Sign up</button>
            </div>
        </div>
    </form>
</div>

<?php include 'footer_common.php'; ?>

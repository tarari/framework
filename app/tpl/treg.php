<?php
 include 'head_common.php';?>
<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>TODO</h1>
            <h2>Sign up</h2>
        </div>
        <form id="form-reg" class="form-horizontal" method="post" action="reg/reg">
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                <input type="email" class="form-control"  id="email-reg" name="email">

                </div>
            </div>
            <div class="form-group">
                <label for="password1" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password1">
                </div>
            </div>
            <div class="form-group">
                <label for="password2" class="col-sm-2 control-label">Repeat pass</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password2">
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" id="btn-reg" class="btn btn-default">Sign up</button>
            </div>
            </div>
        </form>
        <div class="alert alert-danger  col-sm-offset-2 col-sm-8" id="msg">

        </div>
    </div>

<?php include 'footer_common.php';?>

<?php flash(); ?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg" style="margin-top: 25%">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row ">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-success mb-4">Login Page</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <!-- <form class="user" id="login"> -->
                                <form class="user" method="post" action="<?= base_url('index.php/'); ?>auth">
                                    <div class="form-group">
                                        <?= form_input(['name' => 'username', 'id' => 'username', 'class' => 'form-control form-control-user', 'value' => set_value('username'), 'autocomplete' => 'off', 'placeholder' => 'Username']); ?>
                                        <small id="username_error" class="form-text text-danger ml-3"><?= form_error('username', '<p>', '</p>'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <?= form_password(['name' => 'pass', 'id' => 'pass', 'class' => 'form-control form-control-user', 'placeholder' => 'Password']); ?>
                                        <small id="password_error" class="form-text text-danger ml-3"><?= form_error('pass', '<p>', '</p>'); ?></small>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <?= form_submit('btnLogin', 'Login', [
                                            'id' => 'get',
                                            'class' => 'btn btn-success btn-user btn-block'
                                        ]); ?>
                                        <?php
                                        ?>
                                    </div>
                                    <hr>
                                    <input type="text" id="lat" name="lat" hidden>
                                    <input type="text" id="long" name="long" hidden>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    navigator.geolocation.getCurrentPosition(function(location) {
        $("#lat").val(location.coords.latitude)
        $("#long").val(location.coords.longitude)
    })
</script>
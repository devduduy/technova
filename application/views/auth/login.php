<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo" data-aos="fade-up">
      <h2>Login Page</h2>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card" data-aos="zoom-in" data-aos-delay="200" style="border-radius: 12px;">
      <div class="card-body login-card-body" style="border-radius: 12px; box-shadow: 0px 2px 8px 3px #ccc">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?= base_url('auth') ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username ..." name="username" value="<?= set_value('username'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="text-danger"><?= form_error('username'); ?></div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password ..." name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="text-danger"><?= form_error('password'); ?></div>
          <div class="social-auth-links text-center mb-3">
            <button type="submit" class="btn btn-block btn-primary">
              <i class="fas fa-sign-in-alt mr-2"></i>
              Sign in
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
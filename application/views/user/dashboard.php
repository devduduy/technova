<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark" data-aos="fade-up">Dashboard</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-12" data-aos="zoom-in" data-aos-delay="200">
          <a href="<?= base_url('employee/task'); ?>">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $countTaskAssignedByEmpId; ?></h3>
                <p>Task "Assigned"</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-clipboard"></i>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-12" data-aos="zoom-in" data-aos-delay="400">
          <a href="<?= base_url('employee/task'); ?>">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $countTaskDoneByEmpId; ?></h3>
                <p>Task "Done"</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-done"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
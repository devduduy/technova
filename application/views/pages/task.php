  <?php

  $role_id = $this->session->userdata('role_id');

  if ($role_id == '1') :

  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 data-aos="fade-up">Data Task</h1>
            </div>
          </div>
          <div class="col-4 col-lg-2 p-0 mt-3 mb-2" data-aos="fade-up">
            <a href="" class="btn btn-primary btn-block" data-target="#addTaskModal" data-toggle="modal">Add Task</a>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="col-sm-6">
                <?php if ($this->session->flashdata('flash')) : ?>

                  <div class="row mt-3">
                    <div class="col md-6">
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data task <strong>berhasil</strong> <?php echo $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

              </div>
              <div class="card" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Tugas</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Deadline</th>
                        <th>PIC Karyawan</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($task as $t) : ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $t['tugas'] ?></td>
                          <td><?= $t['tanggal_mulai'] ?></td>
                          <td><?= $t['tanggal_deadline'] ?></td>
                          <td><?= $t['name'] ?></td>
                          <td class="<?= $t['status_pekerjaan'] == 'assigned' ? "text-warning font-italic initialism" : "text-success font-italic initialism" ?>"><?= $t['status_pekerjaan'] ?></td>
                          <td><?= $t['keterangan'] ?></td>
                          <td>
                            <a href="" data-target="#editTaskModal<?= $t['task_id']; ?>" data-toggle="modal" class="btn btn-success btn-inline-block mb-1 mt-1">Update</a>
                            <a href="<?= base_url(); ?>admin/deleteTask/<?= $t['task_id']; ?>" class="btn btn-danger btn-inline-block" onclick="return confirm('Sure Delete Task ?');">Delete?</a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    </div>


    <!-- MODAL add Task-->
    <div class="modal fade" id="addTaskModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Data Task</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/task');  ?>" method="post">
              <div class="form-group">
                <label for="">Tugas</label>
                <input class="form-control mb-2" placeholder="Tugas ..." type="text" id="tugas" name="tugas">
                <small class="form-text text-danger"><?= form_error('tugas'); ?></small>
                <label for="">Tanggal Mulai</label>
                <input class="form-control mb-2" type="date" id="tanggal_mulai" name="tanggal_mulai">
                <small class="form-text text-danger"><?= form_error('tanggal_mulai'); ?></small>
                <label for="">Tanggal Deadline</label>
                <input class="form-control mb-2" type="date" id="tanggal_deadline" name="tanggal_deadline">
                <small class="form-text text-danger"><?= form_error('tanggal_deadline'); ?></small>
                <label for="">PIC Karyawan</label>
                <select name="emp_id" id="emp_id" class="form-control">
                  <option value="" disabled selected>Select PIC</option>
                  <?php foreach ($employees as $e) : ?>
                    <option value="<?= $e['emp_id']; ?>">
                      <?= $e['name']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('status'); ?></small>
                <label for="email">Keterangan</label>
                <textarea name="keterangan" class="form-control mb-2" cols="20" rows="5" placeholder="Keterangan ..."></textarea>
                <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                <label for="">Status Pekerjaan</label>
                <select name="status_pekerjaan" id="status_pekerjaan" class="form-control">
                  <option value="" disabled selected>Select Status</option>
                  <option value="assigned">Assigned</option>
                  <option value="done" disabled>Done</option>
                </select>
                <small class="form-text text-danger"><?= form_error('status_pekerjaan'); ?></small>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary btn-block w-25 ml-auto">Add Data</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- MODAL edit Task-->
    <?php foreach ($task as $t) : ?>
      <div class="modal fade" id="editTaskModal<?= $t['task_id']; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Task</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= base_url('admin/edittask'); ?>/<?= $t['task_id']; ?>" method="post">
                <div class="form-group">
                  <label for="">Tugas</label>
                  <input class="form-control mb-2" placeholder="Tugas ..." type="text" id="tugas" name="tugas" value="<?= $t['tugas']; ?>">
                  <small class="form-text text-danger"><?= form_error('tugas'); ?></small>
                  <label for="">Tanggal Mulai</label>
                  <input class="form-control mb-2" type="date" id="tanggal_mulai" name="tanggal_mulai" value="<?= $t['tanggal_mulai']; ?>">
                  <small class="form-text text-danger"><?= form_error('tanggal_mulai'); ?></small>
                  <label for="">Tanggal Deadline</label>
                  <input class="form-control mb-2" type="date" id="tanggal_deadline" name="tanggal_deadline" value="<?= $t['tanggal_deadline']; ?>">
                  <small class="form-text text-danger"><?= form_error('tanggal_deadline'); ?></small>
                  <label for="">PIC Karyawan</label>
                  <select name="emp_id" id="emp_id" class="form-control">
                    <option value="" disabled selected>Select PIC</option>
                    <?php foreach ($employees as $e) : ?>
                      <option value="<?= $e['emp_id']; ?>" <?= ($t['emp_id'] == $e['emp_id']) ? "selected" : "" ?>>
                        <?= $e['name']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('status'); ?></small>
                  <label for="email">Keterangan</label>
                  <textarea name="keterangan" class="form-control mb-2" cols="20" rows="5" placeholder="Keterangan ..."><?= $t['keterangan']; ?></textarea>
                  <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                  <label for="">Status Pekerjaan</label>
                  <select name="status_pekerjaan" id="status_pekerjaan" class="form-control">
                    <?php if ($t['status_pekerjaan'] == 'assigned') : ?>
                      <option value="assigned">Assigned</option>
                      <option value="done">Done</option>
                    <?php else :  ?>
                      <option value="done">Done</option>
                      <option value="assigned">Assigned</option>
                    <?php endif; ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('status_pekerjaan'); ?></small>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary btn-block w-25 ml-auto">Update Data</button>
            </div>
            </form>
          </div>
        </div>

      </div>
    <?php endforeach; ?>

  <?php else : ?>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 data-aos="fade-up">Data Task</h1>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Tugas</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Deadline</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($task as $t) : ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $t['tugas'] ?></td>
                          <td><?= $t['tanggal_mulai'] ?></td>
                          <td><?= $t['tanggal_deadline'] ?></td>
                          <td class="<?= $t['status_pekerjaan'] == 'assigned' ? "text-warning font-italic initialism" : "text-success font-italic initialism" ?>"><?= $t['status_pekerjaan'] ?></td>
                          <td><?= $t['keterangan'] ?></td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    </div>

  <?php endif; ?>
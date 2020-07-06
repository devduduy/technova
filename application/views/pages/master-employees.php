<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 data-aos="fade-up">Data Employees</h1>
        </div>
      </div>
      <div class="add-employees col-4 col-lg-2 p-0 mt-3 mb-2" data-aos="fade-up">
        <a href="<?= base_url('admin/addEmployee') ?>" class="btn btn-primary btn-block" data-target="#addEmployeeModal" data-toggle="modal">Add Employee</a>
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
                    Data employee <strong>berhasil</strong> <?php echo $this->session->flashdata('flash'); ?>
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
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($employees as $employee) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $employee['nip'] ?></td>
                      <td><?= $employee['name'] ?></td>
                      <td><?= $employee['tanggal_lahir'] ?></td>
                      <td><?= $employee['status'] ?></td>
                      <td><?= $employee['email'] ?></td>
                      <td>
                        <a href="" data-target="#editEmployeeModal<?= $employee['emp_id']; ?>" data-toggle="modal" class="btn btn-success btn-inline-block">Update</a>
                        <a href="<?= base_url(); ?>admin/deleteEmployee/<?= $employee['emp_id']; ?>" class="btn btn-danger btn-inline-block" onclick="return confirm('Sure Delete Employee?');">Delete?</a>
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


<!-- MODAL add Employee-->
<div class="modal fade" id="addEmployeeModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Data Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/addemployee');  ?>" method="post">
          <div class="form-group">
            <label for="">NIP</label>
            <input class="form-control mb-2" placeholder="NIP ..." type="text" name="nip">
            <small class="form-text text-danger"><?= form_error('nip'); ?></small>
            <label for="">Nama</label>
            <input class="form-control mb-2" placeholder="Nama ..." type="text" name="name">
            <small class="form-text text-danger"><?= form_error('name'); ?></small>
            <label for="">Tanggal Lahir</label>
            <input class="form-control mb-2" type="date" name="tanggalLahir">
            <small class="form-text text-danger"><?= form_error('tanggalLahir'); ?></small>
            <label for="">Status</label>
            <select name="status" class="form-control">
              <option value="" disabled selected>Select Status</option>
              <option value="kawin">Kawin</option>
              <option value="belum kawin">Belum Kawin</option>
            </select>
            <small class="form-text text-danger"><?= form_error('status'); ?></small>
            <label for="email">Email</label>
            <input class="form-control mb-2" placeholder="Email ..." type="text" name="email">
            <small class="form-text text-danger"><?= form_error('email'); ?></small>
            <hr>
            <label for="">Username</label>
            <input class="form-control mb-2" placeholder="Username ..." type="text" name="username">
            <label for="">Password</label>
            <input class="form-control mb-2" placeholder="Password ..." type="password" name="password">
          </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-primary btn-block w-25 ml-auto">Add Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL edit Employee-->
<?php foreach ($employees as $employee) : ?>
  <div class="modal fade" id="editEmployeeModal<?= $employee['emp_id']; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('admin/editemployee');  ?>/<?= $employee['emp_id']; ?>" method="post">
            <div class="form-group">
              <label for="">NIP</label>
              <input class="form-control mb-2" placeholder="NIP ..." type="text" name="nip" value="<?= $employee['nip']; ?>">
              <small class="form-text text-danger"><?= form_error('nip'); ?></small>
              <label for="">Nama</label>
              <input class="form-control mb-2" placeholder="Nama ..." type="text" name="name" value="<?= $employee['name']; ?>">
              <small class="form-text text-danger"><?= form_error('name'); ?></small>
              <label for="">Tanggal Lahir</label>
              <input class="form-control mb-2" type="date" name="tanggalLahir" value="<?= $employee['tanggal_lahir']; ?>">
              <small class="form-text text-danger"><?= form_error('tanggalLahir'); ?></small>
              <label for="">Status</label>
              <select name="status" class="form-control">
                <?php if ($employee['status'] == 'kawin') : ?>
                  <option value="kawin">Kawin</option>
                  <option value="belum kawin">Belum Kawin</option>
                <?php else :  ?>
                  <option value="belum kawin">Belum Kawin</option>
                  <option value="kawin">Kawin</option>
                <?php endif; ?>
              </select>
              <small class="form-text text-danger"><?= form_error('status'); ?></small>
              <label for="email">Email</label>
              <input class="form-control mb-2" placeholder="Email ..." type="text" name="email" value="<?= $employee['email']; ?>">
              <small class="form-text text-danger"><?= form_error('email'); ?></small>
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
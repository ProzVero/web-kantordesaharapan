<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Mutasi Datang</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>
<?php include('../dasbor/data-index.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>No.</th>
      <th>NIK</th>
      <th>Nama Mutasi</th>
      <th>L/P</th>
      <!-- <th>Lahir</th>
      <th>Usia</th>
      <th>Pendidikan</th>
      <th>Pekerjaan</th>
      <th>Kawin</th> -->
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($data_mutasi as $mutasi) : ?>
    <tr>
      <td><?php echo $nomor++ ?>.</td>
      <td><?php echo $mutasi['nik_warga'] ?></td>
      <td><?php echo $mutasi['nama_warga'] ?></td>
      <td><?php echo $mutasi['jenis_kelamin_warga'] ?></td>
      <!-- <td>
        <?php echo ($mutasi['tanggal_lahir_mutasi'] != '0000-00-00') ? date('d-m-Y', strtotime($mutasi['tanggal_lahir_mutasi'])) : ''?>
      </td> -->
      <td><?php echo $mutasi['status_warga'] ?></td>
      <td>
        <!-- Single button -->
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <span class="caret"></span>
          </button>
          <ul class="dropdown-menu pull-right" role="menu">
            <li>
              <a href="show.php?id_mutasi_masuk=<?php echo $mutasi['id_mutasi_masuk'] ?>"><i class="glyphicon glyphicon-sunglasses"></i> Detail</a>
            </li>
          <!--   <li>
              <a href="cetak-show.php?id_mutasi_masuk=<?php echo $mutasi['id_mutasi_masuk'] ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</a>
            </li> -->
            <?php if ($_SESSION['user']['status_user'] != 'RW'): ?>
            <li class="divider"></li>
            <li>
              <a href="delete.php?id_mutasi_masuk=<?php echo $mutasi['id_mutasi_masuk'] ?>" onclick="return confirm('Yakin hapus data ini?')">
                <i class="glyphicon glyphicon-trash"></i> Hapus
              </a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<br><br>

<div class="well">
  <dl class="dl-horizontal">
    <dt>Total Mutasi</dt>
    <dd><?php echo $jumlah_mutasi_masuk['total'] ?> orang</dd>

    <dt>Jumlah Laki-laki</dt>
    <dd><?php echo $jumlah_mutasi_masuk_l['total'] ?> orang</dd>

    <dt>Jumlah Perempuan</dt>
    <dd><?php echo $jumlah_mutasi_masuk_p['total'] ?> orang</dd>

    <dt>Warga < 17 tahun</dt>
    <dd><?php echo $jumlah_mutasi_masuk_kd_17['total'] ?> orang</dd>

    <dt>Warga >= 17 tahun</dt>
    <dd><?php echo $jumlah_mutasi_masuk_ld_17['total'] ?> orang</dd>
  </dl>
</div>

<?php include('../_partials/bottom.php') ?>

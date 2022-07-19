<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kartu Keluarga</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nomor KK</th>
      <th>Kepala Keluarga</th>
      <th>NIK Kepala</th>
    <!--   <th>Jml. Anggota</th>
      <th>Alamat</th>
      <th>RT</th>
      <th>RW</th> -->
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($data_kartu_keluarga as $kartu_keluarga) : ?>

    <?php
    // hitung anggota
    $query_jumlah_anggota = "SELECT COUNT(*) AS total FROM warga_has_kartu_keluarga WHERE id_keluarga = ".$kartu_keluarga['id_keluarga'];
    $hasil_jumlah_anggota = mysqli_query($db, $query_jumlah_anggota);
    $jumlah_jumlah_anggota = mysqli_fetch_assoc($hasil_jumlah_anggota);
    ?>

    <tr>
      <td><?php echo $nomor++ ?>.</td>
      <td><?php echo $kartu_keluarga['nomor_keluarga'] ?></td>
      <td><?php echo $kartu_keluarga['nama_warga'] ?></td>
      <td><?php echo $kartu_keluarga['nik_warga'] ?></td>
 <!--      <td><?php echo $jumlah_jumlah_anggota['total'] ?></td>
      <td><?php echo $kartu_keluarga['alamat_keluarga'] ?></td>
      <td><?php echo $kartu_keluarga['rt_keluarga'] ?></td>
      <td><?php echo $kartu_keluarga['rw_keluarga'] ?></td> -->
      <td>
        <!-- Single button -->
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <span class="caret"></span>
          </button>
          <ul class="dropdown-menu pull-right" role="menu">

            <li class="divider"></li>
            <li>
              <a href="show.php?id_keluarga=<?php echo $kartu_keluarga['id_keluarga'] ?>"><span class="glyphicon glyphicon-sunglasses"></span> Detail</a>
            </li>
            <li>
              <a href="cetak-show.php?id_keluarga=<?php echo $kartu_keluarga['id_keluarga'] ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </li>
            <?php if ($_SESSION['user']['status_user'] != 'RW'): ?>
            <li class="divider"></li>
            <li>
              <a href="edit-anggota.php?id_keluarga=<?php echo $kartu_keluarga['id_keluarga'] ?>"><span class="glyphicon glyphicon-list"></span> Ubah Anggota</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="edit.php?id_keluarga=<?php echo $kartu_keluarga['id_keluarga'] ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
            </li>
            <li class="divider"></li>
            <!--
            <li>
              <a href="delete.php?id_keluarga=<?php echo $kartu_keluarga['id_keluarga'] ?>" onclick="return confirm('Yakin hapus dari anggota?')"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
            </li>
          -->
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
    <dt>Total Kartu Keluarga</dt>
    <dd><?php echo $jumlah_kartu_keluarga['total'] ?> keluarga</dd>
  </dl>
</div>

<div class="card mb-4 well well-sm">
      <div class="card-header">
        <i class="fas fa-chart-bar me-1"></i>
          Data Kartu Keluarga
        </div>
        <div class="card-body"><canvas id="barChart" width="100%" height="40"></canvas></div>
    </div>

<?php include('../_partials/bottom.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
<script>
      var ctx = document.getElementById("barChart");
      var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["CAMPUREJO", "BIBANG", "HARAPAN", "PATOKO", "-"],
          datasets: [{
            label: "Jumlah",
            backgroundColor: "#0E3AD1",
            borderColor: "rgba(2,117,216,1)",
            data: [
              <?php echo $jml1 ?>,
              <?php echo $jml2 ?>,
              <?php echo $jml3 ?>,
              <?php echo $jml4 ?>,
              <?php echo $jml5 ?>
            ],
          }],
        },
        options: {
          scales: {
            xAxes: [{
              time: {
                unit: 'Jumlah'
              },
              gridLines: {
                display: false
              },
              ticks: {
                maxTicksLimit: 5
              }
            }],
            yAxes: [{
              ticks: {
                min: 0,
                maxTicksLimit: 5
              },
              gridLines: {
                display: true
              }
            }],
          },
          legend: {
            display: false
          }
        }
      });
    </script>

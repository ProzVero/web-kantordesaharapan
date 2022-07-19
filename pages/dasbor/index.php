<?php include('../_partials/top.php') ?>
<!--
<h1 class="page-header">Dasbor</h1>
-->
<?php include('data-index.php') ?>
<!-- dashbord template -->
<div class="row" style="" >
      <div class="panel well">
        <div class="row">
            <div class="col-md-12">
                <img src="../../assets/img/logo_luwu.png" alt="" width="70" class="img-responsive" style="float:left;">
                <h2><center><strong><font color="blue">Hai <?php echo $_SESSION['user']['nama_user'];?><i class="fa fa-user"></i></font></strong></center></h2><span></span>
                    <div class="col-xs-12">
                    <center><font color="grey"><h4>Selamat datang di Aplikasi Kantor Desa Harapan</h4></font></center>
                </div>
                </div>
                <!-- /.col-lg-12 -->
            <!-- /.row -->
        </div>
        </div>
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-group fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div><h3>Data Penduduk</h3><br>
                                    </div>
                                    
                                </div>
                                <div>
                                      <div class="col-md-6">
                                      
                                        <canvas id="jkChart"></canvas>
                                      </div>
                                      <div class="col-md-6">
                                      
                                        <canvas id="umurChart"></canvas>
                                      </div>
                                    </div>
                                    <div>
                                      <p>  Total ada <?php echo $jumlah_warga['total'] ?> data warga. 
                                      </p>

                                    </div>
                            </div>
                        </div>
                        <a href="../warga">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3 text-right">
                                    <i class="fa fa-user fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                </div>
                                
                                <div class="col-lg-12 th">
                                      
                                      <canvas id="dusunChart"></canvas>
                                    </div>
                                    <div><h3>Data Kartu Keluarga</h3></div>
                                    <div><p>  Total ada <?php echo $jumlah_kartu_keluarga['total'] ?> data kartu keluarga</p></div>
                            </div>
                        </div>
                        <a href="../kartu-keluarga">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-exchange fa-fw fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div><h3>Data Mutasi</h3></div>
                                    <div>
                                      <p>
                                        Total ada <?php echo $jumlah_mutasi_masuk['total'] ?> data mutasi masuk.
                                      </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="../mutasi-datang">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-exchange fa-fw fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div><h3>Data Input</h3></div>
                                    
                                </div>
                                
                                <div class="col-xs-12 text-right">
                                  <div>
                                      <p>
                                        Data Warga Terinput <?php echo $jumlah_warga['total'] ?> dari 2019 Data.
                                      </p>
                                    </div>
                                    <div>
                                      <p>
                                        Data Kepala Keluarga Terinput <?php echo $jumlah_kartu_keluarga['total'] ?> dari 645 Data.
                                      </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="../mutasi-datang">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              
</div>
<?php include('../_partials/bottom.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>

<script>
      var ctxP1 = document.getElementById("jkChart").getContext('2d');
      var myPieChart1 = new Chart(ctxP1, {
        type: 'pie',
        data: {
          labels: ["Laki-Laki", "Perempuan"],
          datasets: [{
            data: [
              <?php echo $jumlah_warga_l['total'] ?>,
              <?php echo $jumlah_warga_p['total'] ?>             
            ],
            backgroundColor: ["#F7464A", "#46BFBD"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
          }]
        },
        options: {
          responsive: true
        }
      });
</script>

<script>
  var ctxP2 = document.getElementById("umurChart").getContext('2d');
      var myPieChart2 = new Chart(ctxP2, {
        type: 'pie',
        data: {
          labels: ["17 Tahun Keatas", "Di bawah 17 Tahun"],
          datasets: [{
            data: [
              <?php echo $jumlah_warga_ld_17['total'] ?>,
              <?php echo $jumlah_warga_kd_17['total'] ?>             
            ],
            backgroundColor: ["#FDB45C", "#949FB1"],
            hoverBackgroundColor: ["#FFC870", "#A8B3C5"]
          }]
        },
        options: {
          responsive: true
        }
      });
</script>

<script>
  var ctxP3 = document.getElementById("dusunChart").getContext('2d');
      var myPieChart3 = new Chart(ctxP3, {
        type: 'pie',
        data: {
          labels: ["Campurejo", "Bibang", "Harapan", "Patoko", "Lainnya"],
          datasets: [{
            data: [
              <?php echo $jml1 ?>,
              <?php echo $jml2 ?>,
              <?php echo $jml3 ?>,
              <?php echo $jml4 ?>,
              <?php echo $jml5 ?>            
            ],
            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
          }]
        },
        options: {
          responsive: true
        }
      });
</script>

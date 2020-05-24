{% extends 'layout.html' %}

{% block title %} Rekap {% endblock %}

{% block body %}
    
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php
$konek = mysqli_connect("localhost", "root", "", "skripsi");

$sql = mysqli_query("SELECT round((SELECT COUNT(*) FROM `tanggapan` WHERE sentimen = '1') / (SELECT COUNT(*) FROM `tanggapan`) * 100) as positif, round((SELECT COUNT(*) FROM `tanggapan` WHERE sentimen = '0') / (SELECT COUNT(*) FROM `tanggapan`) * 100) as negatif from tanggapan LIMIT 1");

while($r = mysqli_fetch_array($sql)){
  $positif = $r['positif'];
  $negatif = $r['negatif'];
}
?>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript">
var x, pos, neg
$.get("http://localhost:5000/graph", function(dat){
      //  data2.push(data);
      x = JSON.parse(dat);
  });
      pos = 85;
      neg = 15;

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    
    var data_knn = google.visualization.arrayToDataTable([
      ['Label', 'Jumlah'],['Positif', pos], ['Negatif', neg]
    ]);

    var options = {
        width: 700,
        height: 300,
    };

    var chart_knn = new google.visualization.PieChart(document.getElementById('chart'));

    chart_knn.draw(data_knn, options);
}
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rekap Data
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Rekap Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
                <h4>Grafik Hasil Rekap Sentimen</h4>
                <div id="chart"></div>
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {% endblock %}
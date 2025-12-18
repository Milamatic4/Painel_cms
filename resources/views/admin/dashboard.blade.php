@extends('admin.layouts.master')
@section('content')

        <section class="section">
            <div class="section-header">
              <h1>Painel de Controle</h1>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                      {{ $totalUsuarios }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Notícias</h4>
                    </div>
                    <div class="card-body">
                       {{ $totalPosts }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Páginas</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalPaginas }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fa fa-check-square" style="font-size:23px; color:#fff;"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Serviços</h4>
                    </div>
                    <div class="card-body">
                      {{ $totalServicos }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- FIM CONTADORES  -->


          <!-- INICIO ESTATISTICAS   -->
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Estatísticas Painel Central TT</h4>
                </div>
                <div class="card-body">
                  <canvas id="centralTTChart" height="182"></canvas>
                </div>
              </div>
            </div>
          <!-- FIM ESTATISTICAS   --->



</section>

@push('scripts')
  

        <script>
        var ctx = document.getElementById("centralTTChart").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ["Notícias", "Paginas", "Videos", "Serviços"],
            datasets: [{
              label: 'Statísticas Central TT',
              data: [{{$totalPosts}}, {{$totalPaginas}}, {{$totalVideos}}, {{$totalServicos}}],
              borderWidth: 2,
              backgroundColor: '#6777ef',
              borderColor: '#6777ef',
              borderWidth: 2.5,
              pointBackgroundColor: '#ffffff',
              pointRadius: 4
            }]
          },
          options: {
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                gridLines: {
                  drawBorder: false,
                  color: '#f2f2f2',
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 150
                }
              }],
              xAxes: [{
                ticks: {
                  display: false
                },
                gridLines: {
                  display: false
                }
              }]
            },
          }
        });
        </script>
@endpush    
@endsection
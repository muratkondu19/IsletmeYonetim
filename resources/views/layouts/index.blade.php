@extends('layouts.app')

@section('icerik')


    <section class="content-header">
        <h1>
          Ana Sayfa
        </h1>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3> {{\App\Models\Muhasebe\Cari::getCariCount()}} </h3>
    
                  <p>Cari Sayınız</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('muhasebe.cari')}}" class="small-box-footer">Cari Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{\App\Models\Urun\UretimGiris::getUretimGirisCount()}}</h3>
    
                  <p>Üretim Girişleriniz</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('urun.uretimgiris')}}" class="small-box-footer">Üretim Girişleri <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{\App\Models\Urun\Isemri::getIsemriCount()}}</h3>
    
                  <p>İş Emirleriniz</p>
                </div>
                <div class="icon">
                    <i class="fa fa-barcode" aria-hidden="true"></i>
                </div>
                <a href="{{route('urun.isemri')}}" class="small-box-footer">İş Emileri <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{\App\Models\Urun\Urunagaci::getUrunagacCount()}}</h3>
    
                  <p>Ürün Ağaçlarınız</p>
                </div>
                <div class="icon">
                    <i class="fa fa-tree" aria-hidden="true"></i>
                </div>
                <a href="{{route('urun.urunagaci')}}" class="small-box-footer">Ürün Ağaçları <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>


          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text"> Satış Siparişleriniz</span>
                  <span class="info-box-number">{{\App\Models\Satis\SatisSiparis::getSatisCount()}}</span>
    
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                      <span class="progress-description">
                        <a style="color: white" href="{{route('satis.satissiparis')}}" >Satış Siparişlerine Git <i class="fa fa-arrow-circle-right"></i></a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Satış Teklifleriniz</span>
                  <span class="info-box-number">{{\App\Models\Satis\SatisTeklif::getSatisTeklifCount()}}</span>
    
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                      <span class="progress-description">
                        <a style="color: white" href="{{route('satis.satisteklif')}}" >Satış Tekliflerine Git <i class="fa fa-arrow-circle-right"></i></a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Satınalma Siparişleri</span>
                  <span class="info-box-number">{{\App\Models\Satinalma\Satinalma::getSatinalmaCount()}}</span>
    
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                      <span class="progress-description">
                        <a style="color: white" href="{{route('satinalma.satinalmasiparis')}}" >Satınalma Siparilerine Git <i class="fa fa-arrow-circle-right"></i></a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Satınalma Teklifleri</span>
                  <span class="info-box-number">{{\App\Models\Satinalma\SatinalmaTeklif::getSatinalmaTeklifCount()}}</span>
    
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                      <span class="progress-description">
                        <a style="color: white" href="{{route('satinalma.satinalmateklif')}}" >Satınalma Tekliflerine Git <i class="fa fa-arrow-circle-right"></i></a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <div class="box box-primary col-6">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">İşlem Kayıtları</h3>
            </div>
            <div class="box-body">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>İşlem</th>
                    <th>Açıklama</th>
                    <th>İşlem Tarihi</th>
                  </tr>
                  @foreach($logger as $k=>$v)
                  <tr>
                    <td> <span class="label label-success">{{$v['islem']}}</span></td>
                    <td>{{$v['text']}}</td>
                    <td><span class="label label-primary">{{$v['created_at']}}</span></td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
       
    </section>


@endsection
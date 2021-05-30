<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Perizinan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Blank Page</h1>
  </div>

  <div class="section-body">
    <h3>Perizinan</h3>
    <hr />
    <div class="card">
      <div class="card-header">
        <h4>DAFTAR PEMAKAIAN TANAH</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody>
              <tr>
                <th>#</th>
                <th>Nama Pemegang Ijin</th>
                <th>Jenis Tanah</th>
                <th>Lokasi Tanah</th>
                <th>Nomor Ijin/Tanggal</th>
                <th>Jangka Waktu</th>
                <th>Peruntukan</th>
                <th>Luas M Persegi</th>
                <th>Nilai Tarif M Persegi(Rp)</th>
                <th>Nilai Retribusi M Persegi(Rp)</th>
                <th>Relasi</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
              <tr>
                <td>1</td>
                <td>Kel. Dampyak Rt.3/6</td>
                <td>Bantaran Kali Gung</td>
                <td>Kel. Dampyak</td>
                <td>593/1291/2020 - 6 Februari 2020</td>
                <td>6 Februari 2020 s/d 5 Februari 2023</td>
                <td>Cocok tanam palawija</td>
                <td>144,00</td>
                <td>250</td>
                <td>360.000</td>
                <td>LUNAS</td>
                <td>LUNAS</td>
                <td>
                  <div class="">
                    <a href="#" class="btn-sm btn-secondary">Pindah</a>
                    <hr />
                    <a href="#" class="btn-sm btn-secondary">Perpanjang</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer text-right">
        <nav class="d-inline-block">
          <ul class="pagination mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
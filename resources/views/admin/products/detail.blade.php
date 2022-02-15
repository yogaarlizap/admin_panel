<div class="modal fade" id="modal-form-detail" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <form class="form-horizontal" data-toggle="validator" method="POST">
        @method('POST')
        @csrf
        <div class="modal-header">
          <h3 class="modal-title-detail"></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <div class="mt-2">
                <label for="nama_produk" class="col-md-6 control-label">Nama Produk</label>
                <div class="col-md-12">
                  <input readonly id="detail_nama_produk" type="text" class="form-control nama_produk" name="detail_nama_produk" autofocus required>
                  <span class="help-block with-errors"></span>
                </div>
            </div>
            <div class="mt-2">
                <label for="kategori" class="col-md-6 control-label">Kategori</label>
                <div class="col-md-12">
                  <select readonly name="detail_kategori" id="detail_kategori" class="form-control">
                      <option value="0">Pilih Kategori</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                      @endforeach
                  </select>
                  <span class="help-block with-errors"></span>
                </div>
            </div>
            <div class="mt-2">
                <label for="stok" class="col-md-6 control-label">Stok</label>
                <div class="col-md-12">
                  <input readonly id="detail_stok" type="number" class="form-control stok" name="stok" autofocus required>
                  <span class="help-block with-errors"></span>
                </div>
            </div>
            <div class="mt-2">
                <label for="harga" class="col-md-6 control-label">Harga</label>
                <div class="col-md-12">
                  <input readonly id="detail_harga" type="number" class="form-control harga" name="harga" autofocus required>
                  <span class="help-block with-errors"></span>
                </div>
            </div>
            <div class="mt-2">
                <label for="berat" class="col-md-6 control-label">Berat (Kg)</label>
                <div class="col-md-12">
                  <input readonly id="detail_berat" type="text" class="form-control berat" name="berat" autofocus required>
                  <span class="help-block with-errors"></span>
                </div>
            </div>
            <div class="mt-2">
                <label for="gambar" class="col-md-6 control-label">Gambar</label>
                <div class="col-md-12">
                  <img src="#" id="detail_gambar" style="width: 100px; height: 100px" alt="">
                </div>
            </div>
            <div class="mt-2">
                <label for="uom" class="col-md-6 control-label">Keterangan</label>
                <div class="col-md-12">
                  <input readonly id="detail_keterangan" type="text" class="form-control keterangan" name="keterangan" autofocus required>
                  <span class="help-block with-errors"></span>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary btn-save">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
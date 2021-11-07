<div class="container-fluid mt-3 mb-3">

    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
    <div class="row">
        <div class="col text-center">
            <h3>PRODI TEKNIK KENDARAAN RINGAN - OTOMOTIF</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5 ml-4">
        <div class="card">
            <div class="card-body">
                <form>

                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Ka. Prodi</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $prodi['kaprodi'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
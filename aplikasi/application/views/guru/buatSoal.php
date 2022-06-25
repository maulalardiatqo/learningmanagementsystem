<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small><b>Buat Soal Pilihan Ganda</b></small> <br>
        <?php foreach ($parent as $p) : ?>
            <small>Mapel : <?= $p['nama_mapel'] ?> </small><br>
        <?php endforeach; ?>
    </div>
</div>
<hr />
<div class="container" style="font-size: 12px; color:aliceblue;">
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pertanyaan</label>
            <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jawaban A</label>
            <input type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jawaban B</label>
            <input type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jawaban C</label>
            <input type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jawaban D</label>
            <input type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jawaban E</label>
            <input type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="benar" class="form-label">Jawaban Benar</label>
            <select class="form-control form-select-sm" aria-label=".form-select-sm example" name="benar" id="benar">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
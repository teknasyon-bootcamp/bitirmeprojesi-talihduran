<?php include "_shared/admin_header.php";?>
<div class="d-flex">
    <?php include "_shared/admin_sidebar.php";?>

    <div class="admin-wrapper">
        <div class="container-fluid">
            <form action="/admin-post-handler" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label >Haber Başlığı</label>
                    <input type="text" class="form-control" name ="title" placeholder="Haber başlığını giriniz">
                </div>
                <div class="form-group">
                    <label >Haber içeriği</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control" style="resize: none" placeholder="Yazmaya başlayın..."></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Resim dosyası yükleyiniz</label>
                    <input class="form-control" type="file" id="formFile" name="images">
                </div>

                <label>Haber Durumlarını Seçiniz</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="breaking_news" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Son Dakika Haberi</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="active" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Haber Aktifliği</label>
                        </div>
                    </div>

                </div>

                    <label>Kategorileri Seçiniz</label>
                    <div class="input-group mb-3">

                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="haber" value=1>
                                <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Haber</label>
                            </div>
                        </div>
                        <div class="input-group-prepend" style="margin-left: 0.5rem">
                            <div class="input-group-text">
                                <input type="checkbox" name="spor" value=1>
                                <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Spor</label>
                            </div>
                        </div>
                        <div class="input-group-prepend" style="margin-left: 0.5rem">
                            <div class="input-group-text">
                                <input type="checkbox" name="finans" value=1>
                                <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Finans</label>
                            </div>
                        </div>
                        <div class="input-group-prepend" style="margin-left: 0.5rem">
                            <div class="input-group-text">
                                <input type="checkbox" name="seyahat" value=1>
                                <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Seyahat</label>
                            </div>
                        </div>
                        <div class="input-group-prepend" style="margin-left: 0.5rem">
                            <div class="input-group-text">
                                <input type="checkbox" name="oyun" value=1>
                                <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Oyun</label>
                            </div>
                        </div>
                        <div class="input-group-prepend" style="margin-left: 0.5rem">
                            <div class="input-group-text">
                                <input type="checkbox" name="egitim" value=1>
                                <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Eğitim</label>
                            </div>
                        </div>
                        <div class="input-group-prepend" style="margin-left: 0.5rem">
                            <div class="input-group-text">
                                <input type="checkbox" name="sinema" value=1>
                                <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Sinema</label>
                            </div>
                        </div>
                        <div class="input-group-prepend" style="margin-left: 0.5rem">
                            <div class="input-group-text">
                                <input type="checkbox" name="sanat" value=1>
                                <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Sanat</label>
                            </div>
                        </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>

</div>


<?php include "_shared/admin_footer.php";?>


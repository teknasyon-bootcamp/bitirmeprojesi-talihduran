
<?php include "_shared/admin_header.php";?>
<div class="d-flex">
    <?php include "_shared/admin_sidebar.php";?>
    <div class="admin-wrapper">
        <div class="container-fluid">
            <form action="/admin-users-edit" method="post" ">

                <label>Kullanıcını Rollerini Seçin</label>
                <div class="input-group mb-3">

                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="admin" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Admin</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="moderator" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Moderator</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="editor" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Editor</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="user" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">User</label>
                        </div>
                    </div>

                </div>
                <input type="text" hidden name="newsId" value='<?php echo $_POST['newsId']; ?>'>
                <input type="text" hidden name="userId" value='<?php echo $_POST['userId']; ?>'>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>

</div>

<?php include "_shared/admin_footer.php";?>



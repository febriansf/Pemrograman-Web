$(function () {
    $('.dropify').dropify({
        messages: {
            default: 'Pilih Gambar',
            replace: 'Ganti',
            remove: 'Hapus',
            error: 'error'
        }
    });

    // Bagian Restaurant

    var table = $('#restaurant').DataTable({
        columnDefs: [{
            width: "10%",
            targets: 6
        }],
        paging: true,
        lengthChange: false,
        searching: false,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true
    });

    $('#add-menu').ajaxForm({
        url: "src/act_food.php?add=y",
        contentType: false,
        cache: false,
        processData: false,
        success: function (msg) {
            $('#modal-add').modal('hide');
            location.reload();
        }
    });

    $('#edit-menu #save-edit').on('click', function () {
        var form = $(this).closest('form');
        form.submit();
    });

    $('#restaurant').on('click', '#hapus-menu', function () {
        var row = table.row(this.closest('tr'));
        $('#load').show();
        if (confirm("Apakah anda yakin ingin menghapus ?")) {
            $.ajax({
                type: "post",
                url: "src/act_food.php?delete=y",
                data: "id=" + $(this).data('id'),
                success: function () {
                    row.remove().draw(false);
                    $('#load').hide();
                }
            });
        }
    });
});

$(function () {
    $('.dropify').dropify({
        messages: {
            default: 'Pilih Gambar',
            replace: 'Ganti',
            remove: 'Hapus',
            error: 'error'
        }
    });
    
    // Bagian Rooms

    var table = $('#room-type').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    $('#add-room').ajaxForm({
        url: "src/act_room.php?add=y",
        contentType: false,
        cache: false,
        processData: false,
        success: function (msg) {
            $('#modal-add').modal('hide');
            location.reload();
        }
    });

    $('#edit-room #save-edit').on('click', function () {
        var form = $(this).closest('form');
        form.submit();
    });

    $('#room-type').on('click', '#hapus-room', function () {
        var row = table.row(this.closest('tr'));
        $('#load').show();
        if (confirm("Apakah anda yakin ingin menghapus ?")) {
            $.ajax({
                type: "post",
                url: "src/act_room.php?delete=y",
                data: "id=" + $(this).data('id'),
                success: function () {
                    row.remove().draw(false);
                    $('#load').hide();
                }
            });
        }
    });
});
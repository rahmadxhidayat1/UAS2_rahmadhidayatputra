$("#btnsimpan").click(function () {
    let nmkategori = $("#nmkategori_ins").val();
    if (nmkategori == "") {
      alert("nama kategori Wajib diisi!!");
    } else {
      $("#ModalKonfirmasi").modal("show");
    }
  });
  $("#btnyes").click(function () {
    $("#kategori_produk").attr("action", "?modul=mod_kategoriproduk&action=save");
    $("#kategori_produk").submit();
  });

  $("#btnsimpan_edit").click(function () {
    let nmkategori = $("#nmkategori_edt").val();
    if (nmkategori == ""||nmkategori == null) {
      alert("nama kategori Wajib diisi!!");
    } else {
      $("#ModalKonfirmasi2").modal("show");
    }
  })
  $("#btnyes_edit").click(function () {
    $("#kategoriproduk_edit").attr("action", "?modul=mod_kategoriproduk&action=update");
    $("#kategoriproduk_edit").submit();
  });
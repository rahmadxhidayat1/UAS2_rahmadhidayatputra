$("#btn_sim").click(function () {
    let cont = $("#nm_cont").val();
    let merk = $("#nm_merk").val();
    let stock = $("#stock").val();
    let datetime = $("#datetime").val();
    let price = $("#price").val();
    let desc = $("#desc").val();
    let pict = $("#picture").val();
      if (cont == ""||cont==null) {
        alert("cont Wajib diisi!!");
      }else if(merk==""||merk==null){
        alert("merk wajib diisi");
      }else if(stock==""||stock==null){
        alert("stock wajib diisi!");
      }else if(datetime==""||datetime==null){
        alert("datetime wajib diisi");
      }else if(price==""||price==null){
        alert("price wajib diisi");
      }else if(desc==""||desc==null){
        alert("deskripsi wajib diisi");
      }else if(pict==""||pict==null){
        alert("picture harus diisi");
      }else{
        $("#themodal").modal("show");
      }
  });
  $("#btnsimp").click(function () {
    $("#formproduk").attr("action", "?modul=mod_produk&action=save");
    $("#formproduk").submit();
  });
  
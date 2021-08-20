function validasi(form){
  if (form.nama.value == ""){
    alert("Nama tidak boleh kosong !");
    form.nama.focus();
    return (false);
  }

  pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (form.email.value == ""){
    alert("Email tidak boleh kosong !");
    form.email.focus();
    return (false);
  }
  if (!pola_email.test(form.email.value)){
    alert ('Penulisan Email tidak benar');
    form.email.focus();
    return false;
  }
  if (form.isi.value == ""){
    alert("Masih ada field yang kosong !");
    form.isi.focus();
    return (false);
  }

return (true);
}
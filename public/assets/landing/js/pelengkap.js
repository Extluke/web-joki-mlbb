document.getElementById('phone').addEventListener('input', function (e) {
  let value = e.target.value;

  // Hapus spasi dan karakter tak diperlukan
  value = value.replace(/\s+/g, '');

  // Jika dimulai dengan angka tanpa '+62', tambahkan '+62'
  if (!value.startsWith('+') && value.startsWith('0')) {
    value = '+62' + value.slice(1);
  } else if (!value.startsWith('+')) {
    value = '+62' + value;
  }

  // Update input field
  e.target.value = value;
});
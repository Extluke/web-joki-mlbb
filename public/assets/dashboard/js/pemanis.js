document.addEventListener('DOMContentLoaded', function() {
  // Validasi untuk setiap input
  const form = document.querySelector('form');
  const inputs = form.querySelectorAll('input, select');
  
  inputs.forEach(input => {
      input.addEventListener('input', function() {
          const commentElement = document.getElementById(input.id + '-comment');

          if (input.value.trim() === '') {
              commentElement.style.display = 'block';
              commentElement.textContent = `${input.placeholder} tidak boleh kosong`;
          } else {
              commentElement.style.display = 'none';
          }
      });
  });

  // Validasi WhatsApp
  document.getElementById('whatsapp').addEventListener('input', function () {
      let phoneInput = this.value;
      let commentElement = document.getElementById('whatsapp-comment');

      // Menghapus karakter non-digit selain '+'
      phoneInput = phoneInput.replace(/[^\d\+]/g, '');

      // Memastikan nomor dimulai dengan +628, jika tidak tambahkan
      if (phoneInput.startsWith('+628')) {
          // Tidak perlu ubah jika sudah valid
      } else if (phoneInput.startsWith('+62')) {
          // Ganti +62 menjadi +628
          phoneInput = '+628' + phoneInput.substring(3);
      } else if (phoneInput.startsWith('62')) {
          // Ganti 62 menjadi +628
          phoneInput = '+628' + phoneInput.substring(2);
      } else if (phoneInput.startsWith('+')) {
          // Jika nomor diawali dengan '+', tambahkan +628 jika tidak valid
          phoneInput = '+628' + phoneInput.substring(1);
      } else {
          // Jika tidak ada tanda '+', tambahkan +628 di depan
          phoneInput = '+628' + phoneInput.replace(/^0/, ''); // Ganti angka pertama 0 dengan +628
      }

      this.value = phoneInput; // Update input dengan nilai yang sudah diformat

      // Validasi jika nomor diawali dengan +628 dan panjangnya minimal 12 digit
      if (phoneInput.startsWith('+628') && phoneInput.length >= 12) {
          // Jika nomor valid, sembunyikan komentar
          commentElement.style.display = 'none';
      } else {
          // Jika nomor tidak valid, tampilkan komentar
          commentElement.style.display = 'block';
          commentElement.textContent = 'Nomor WhatsApp harus dimulai dengan +628 dan panjang minimal 10 digit.';
      }
  });
});
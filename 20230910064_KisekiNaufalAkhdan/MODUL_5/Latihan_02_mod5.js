$(document).ready(function () {
  // Menambahkan baris baru ke tabel
  $("#addRow").click(function () {
    const rowCount = $("#alumniTable tbody tr").length + 1; // Calculate new row number
    const newRow = `
      <tr>
        <td>${rowCount}</td>
        <td>Nama Baru</td>
        <td>email@baru.com</td>
        <td>
          <button class="edit">Edit</button>
          <button class="delete">Hapus</button>
        </td>
      </tr>
    `;
    $("#alumniTable tbody").append(newRow);
  });

  // Mengedit baris yang ada
  $("#alumniTable").on("click", ".edit", function () {
    const row = $(this).closest("tr");
    const no = row.find("td").eq(0).text();
    const name = row.find("td").eq(1).text();
    const email = row.find("td").eq(2).text();

    // Tampilkan prompt untuk mengedit
    const newNomor = prompt("Edit Nomor:", no);
    const newName = prompt("Edit Nama:", name);
    const newEmail = prompt("Edit Email:", email);

    // Validate inputs before updating
    if (newNomor !== null && newName !== null && newEmail !== null) {
      if (
        newNomor.trim() !== "" &&
        newName.trim() !== "" &&
        validateEmail(newEmail)
      ) {
        row.find("td").eq(0).text(newNomor);
        row.find("td").eq(1).text(newName);
        row.find("td").eq(2).text(newEmail);
      } else {
        alert("Input tidak valid! Pastikan semua kolom diisi dan email valid.");
      }
    }
  });

  // Menghapus baris dari tabel
  $("#alumniTable").on("click", ".delete", function () {
    if (confirm("Apakah Anda yakin ingin menghapus baris ini?")) {
      $(this).closest("tr").remove();
    }
  });

  // Function to validate email format
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }
});

        <script src="<?= base_url('assets/js/mdb.min.js')?>"></script>
		<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
		<script src="<?= base_url('assets/js/sweetalert2.all.min.js')?>"></script>
		<!-- <script src="<?= base_url('assets/js/main.js')?>"></script> -->
		<script>
			const flashData = $(".flash-data").data("flash");

			if (flashData) {
				Swal.fire({
					title: "Data Karyawan",
					text: "Berhasil " + flashData,
					icon: "success",
				});
			}

			// tombol-hapus
			$(".tombol-hapus").on("click", function (e) {
				e.preventDefault();
				const href = $(this).attr("href");

				Swal.fire({
					title: "Apakah anda yakin",
					text: "data karyawan akan dihapus",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Hapus Data!",
				}).then((result) => {
					if (result.value) {
						document.location.href = href;
					}
				});
			});

		</script>
	</body>
</html>
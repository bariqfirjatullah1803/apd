const flashdata = $('.flash-data').data('flashdata');

if(flashdata){
//bisa Swal atau Swal.fire
    Swal.fire(
        'Berhasil!',
        'Data sudah'+flashdata,
        'success'
    )
}

$('.tombol-hapus').on('click', function(e){

	e.preventDefault();
	//Jquery carrin tombol-hapus yang lagi saya pencet lalu ambil attributnya

	const href = $(this).attr('href');

	Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })
});
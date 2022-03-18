function actionDelete(event){

	event.preventDefault();
	let urlRequest = $(this).data('url');
	let that = $(this);

	Swal.fire({
	  title: 'Bạn chắc chắn muốn xóa?',
	  text: "Bạn không thể khôi phục thao tác này!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  if (result.isConfirmed) {
	  	$.ajax({
	  		type: 'GET',
	  		url: urlRequest,
	  		success: function(data){
	  			if(data.code == 200){
	  				that.parent().parent().remove();
	  				Swal.fire(
				      'Đã xóa!',
				      'Dữ liệu đã được xóa',
				      'success'
				    )
	  			}
	  		},
	  		error: function (){

	  		}
	  	});
	    
	  }
	})
}

$(function (){
	$(document).on('click', '.action_delete', actionDelete);
});
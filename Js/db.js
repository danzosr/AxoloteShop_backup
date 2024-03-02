$(document).ready(function(){

    console.log('Jquery esta funcionando');

	$('#RDnav').keyup(function(e) {
		let search = $('#RDnav').val();
		$.ajax({
			url: 'buscar-prod.php',
			type: 'POST',
			data: {search},
			success: function(response) {
				let productos = JSON.parse(response);
				let template = '';

				productos.forEach(producto => {
					template += `
						<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
						    <div class="products-single fix">
						        <div class="box-img-hover">
						            <a href="producto.php?id=${producto.id}"><img src="img/productos/${producto.foto}" class="img-fluid" alt="Image" style="width:200px;height:200px;"></a>
						        </div>
						        <div class="why-text">  
						            <h4>${producto.nombre}</h4>
						            <p style="text-align:center; color:#737373;">${producto.descripcion}</p>
						            <h5>${producto.precio}</h5>
						        </div>
						    </div>
						</div>
					`
				});

				$('#rows').html(template);
			}
		});
	})
});
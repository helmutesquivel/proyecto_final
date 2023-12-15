<?php
    use Controller\DetalleController;
    $detalle = new DetalleController();
?>

<table id="example" class="table table-striped" width="100%"></table>

<script type="text/javascript">
    let datadetalle = <?php echo json_encode($detalle->mostrar()); ?>;
                                    //{"id":1 , "categoria": "Cocina"}
                                    //{"id":2 , "categoria": "mecánica"}
                                    //{"id":3 , "categoria": "Soldadura"}

    let data = [];//Guardar los items
    //dataCategorias.forEach((element)=>data.push( element.categoria , element.id));

    for(let i=0; i<datadetalle.length;i++){
        data.push([datadetalle[i].id ,datadetalle[i].Nombre,]);
        // enviando los datos al array de js -> [1][Cocina], [2][Mecanica]
    }

    
    let table = new DataTable('#example', {
        columns:[
            {title: 'Id'},
            {title: 'Nombre'}           
        ],
        data: data//Colocando los valores de la BD
    });
</script>
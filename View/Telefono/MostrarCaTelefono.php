<?php
    use Controller\CaTelefonoController;
    $caTelefono = new CaTelefonoController();
?>

<table id="example" class="table table-striped" width="100%"></table>

<script type="text/javascript">
    let datacaTelefono = <?php echo json_encode($caTelefono->mostrar()); ?>;
                                    //{"id":1 , "categoria": "Cocina"}
                                    //{"id":2 , "categoria": "mecánica"}
                                    //{"id":3 , "categoria": "Soldadura"}

    let data = [];//Guardar los items
    //dataCategorias.forEach((element)=>data.push( element.categoria , element.id));

    for(let i=0; i<datacaTelefono.length;i++){
        data.push([datacaTelefono[i].idCatel ,datacaTelefono[i].tipo]);
        // enviando los datos al array de js -> [1][Cocina], [2][Mecanica]
    }

    
    let table = new DataTable('#example', {
        columns:[
            {title: 'Id'},
            {title: 'Compañia'}
        ],
        data: data//Colocando los valores de la BD
    });
</script>
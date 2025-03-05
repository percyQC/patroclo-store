<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patroclo Store | SISE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PATROCLO-Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/public?controller=Categoria">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main style="padding: 20px;">
        <div style="display: flex; gap: 20px;">
        <h1>Lista de categorias</h1>
        <p><a class="btn btn-dark" href="/?controller=Categoria&action=viewInsertar"> + Categoria</a></p>        
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Fecha Creaciòn</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($categorias)):?>
                    <?php foreach($categorias as $cat): ?>
                    <tr>
                        <th scope="row"><?php echo $cat['id_categoria'];?></th>
                        <td><?php echo$cat['nombre'] ?></td>
                        <td>
                            <img src="<?php echo$cat['imagen_url'] ?>" width="200px" height="150px" alt="<?php echo$cat['nombre'] ?>">                        
                        </td>
                        <td><?php echo$cat['fecha_creacion_auditoria'] ?></td>
                        <td>
                        <a href="/?controller=Categoria&action=viewActualizar&idCategoria=<?php echo $cat ['id_categoria'] ?>" type="button" class="btn btn-outline-light">Editar</a>
                        <a onclick="onClickDarBaja(<?php echo $cat['id_categoria']; ?>)" type="button" class="btn btn-danger">Eliminar</a>                        
                        </td>
                    </tr>
                    
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>                    
                    <td colspan="5">No existen registros</td>                    
                    </tr>
                    <?php endif; ?>              
                
            </tbody>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<script>
    const onClickDarBaja = (idCategoria) => {
        console.log('idCategoria',idCategoria);
        Swal.fire({
            title: "¿Quieres eliminar el registro?",
            text: "No podras revertir los cambios",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, ¡eliminar!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                title: "¡Eliminado!",
                text: "El registro ha sido eliminado con éxito",
                icon: "success"
                }).then(()=>{
                    console.log('elminando...');
                    window.location = `/?controller=Categoria&action=darBaja&idCategoria=${idCategoria}`
                });
                
            }
        });
    }
</script>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Autocomplete</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Formulário</h1>

        <form class="row g-3" method="POST" action="processa.php">
            <div class="col-12">
                <label for="usuario" class="form-label">Nome</label>
                <input type="text" style="text-transform:uppercase" name="usuario" class="form-control" id="usuario" placeholder="Pesquisar usuário" onkeyup="carregar_usuarios(this.value)" />
                <span id="resultado_pesquisa"></span>
                
                <label for="usuario1" class="form-label">Nome</label>
                <input type="text" style="text-transform:uppercase" name="usuario1" class="form-control" id="usuario1" placeholder="Pesquisar usuário" onkeyup="mostrar_usuarios(this.value)" />
                <span id="resultado_pesquisa1"></span>

                <label for="usuario2" class="form-label">Nome</label>
                <input type="text" style="text-transform:uppercase" name="usuario2" class="form-control" id="usuario2" placeholder="Pesquisar usuário" onkeyup="listar_usuarios(this.value)" />
                <span id="resultado_pesquisa2"></span>
            </div>

            <input type="hidden" name="id_usuario" class="form-control" id="id_usuario">
            <input type="hidden" name="id_usuario1" class="form-control" id="id_usuario1">
            <input type="hidden" name="id_usuario2" class="form-control" id="id_usuario2">


            <div class="col-12">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>

        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
</body>

</html>

async function carregar_usuarios(valor) {
    if (valor.length >= 3) {
       //// console.log("Pesquisar: " + valor);

        const dados = await fetch('listar_usuarios.php?nome=' + valor);
        const resposta = await dados.json();
        //console.log(resposta);

        var html = "<ul class='list-group position-absolute'>";

        if (resposta['erro']) {
            html += "<li class='list-group-item disabled'>" + resposta['msg'] + "</li>";
        } else {
            for (i = 0; i < resposta['dados'].length; i++) {
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario0(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa0').innerHTML = html;
    }
}

function get_id_usuario0(id_usuario0, nome) {
   // console.log("Id do usuario selecionado: " + id_usuario0);
   // console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario0").value = nome;
    document.getElementById("id_usuario0").value = id_usuario0;
}

const fechar = document.getElementById('usuario0');

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        if(document.getElementById('resultado_pesquisa0')){
        document.getElementById('resultado_pesquisa0').innerHTML = '';
        }
    }
})
//      //      //      //      //      //
async function mostrar_usuarios(valor) {
    if (valor.length >= 3) {
        //console.log("Pesquisar: " + valor);

        const dados = await fetch('listar_usuarios.php?nome=' + valor);
        const resposta = await dados.json();
        //console.log(resposta);

        var html = "<ul class='list-group position-absolute'>";

        if (resposta['erro']) {
            html += "<li class='list-group-item disabled'>" + resposta['msg'] + "</li>";
        } else {
            for (i = 0; i < resposta['dados'].length; i++) {
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario1(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa1').innerHTML = html;
    }
}

function get_id_usuario1(id_usuario1, nome) {
   // console.log("Id do usuario selecionado: " + id_usuario1);
   // console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario1").value = nome;

    document.getElementById("id_usuario1").value = id_usuario1;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        if(document.getElementById('resultado_pesquisa1')){
        document.getElementById('resultado_pesquisa1').innerHTML = '';
        }
    }
})

//      //      //      //      //      //
async function listar_usuariosTodos(valor, id) {
    if (valor.length >= 3) {
        //console.log("Pesquisar: " + valor);

        const dados = await fetch('listar_usuarios.php?nome=' + valor);
        const resposta = await dados.json();
        //console.log(resposta);

        var html = "<ul class='list-group position-absolute'>";

        if (resposta['erro']) {
            html += "<li class='list-group-item disabled'>" + resposta['msg'] + "</li>";
        } else {
            for (i = 0; i < resposta['dados'].length; i++) {
               // console.log(id)
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario("+ resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) +"," +  JSON.stringify(id) +")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";
       
        document.getElementById('resultado_pesquisa_'+id).innerHTML = html;
    }
   
}

function get_id_usuario(id_usuario, nome, id_campo) {
   // console.log("Id do campo selecionado: " + id_campo);
   // console.log("Id do usuario selecionado: " + id_usuario);
   // console.log("nome do usuario selecionado: " + nome);

    document.getElementById(id_campo).value = nome;

    document.getElementById('id_'+id_campo).value = id_usuario;

    
}
document.addEventListener('click', function (event) {
    // Seleciona todos os elementos cujo id começa com 'resultado_pesquisa'
    const elementos = document.querySelectorAll('[id^="resultado_pesquisa"]');

    // Itera sobre os elementos selecionados
    elementos.forEach(function(elemento) {
        const id = elemento.id.replace('resultado_pesquisa', '');
        const fechar = document.getElementById('fechar' + id);
        const validar_clique = fechar && fechar.contains(event.target);

        if (!validar_clique) {
            elemento.innerHTML = '';
        }
    });
});


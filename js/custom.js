
async function carregar_usuarios(valor) {
    if (valor.length >= 3) {
       // console.log("Pesquisar: " + valor);

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
    console.log("Id do usuario selecionado: " + id_usuario0);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario0").value = nome;
    document.getElementById("id_usuario0").value = id_usuario0;
}

const fechar = document.getElementById('usuario0');

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa0').innerHTML = '';
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
    console.log("Id do usuario selecionado: " + id_usuario1);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario1").value = nome;

    document.getElementById("id_usuario1").value = id_usuario1;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa1').innerHTML = '';
    }
})

//      //      //      //      //      //
async function listar_usuarios(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario2(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa2').innerHTML = html;
    }
}

function get_id_usuario2(id_usuario2, nome) {
    console.log("Id do usuario selecionado: " + id_usuario2);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario2").value = nome;

    document.getElementById("id_usuario2").value = id_usuario2;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa2').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariostres(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario3(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa3').innerHTML = html;
    }
}

function get_id_usuario3(id_usuario3, nome) {
    console.log("Id do usuario selecionado: " + id_usuario3);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario3").value = nome;

    document.getElementById("id_usuario3").value = id_usuario3;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa3').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosquatro(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario4(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa4').innerHTML = html;
    }
}

function get_id_usuario4(id_usuario4, nome) {
    console.log("Id do usuario selecionado: " + id_usuario4);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario4").value = nome;

    document.getElementById("id_usuario4").value = id_usuario4;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa4').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuarioscinco(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario5(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa5').innerHTML = html;
    }
}

function get_id_usuario5(id_usuario5, nome) {
    console.log("Id do usuario selecionado: " + id_usuario5);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario5").value = nome;

    document.getElementById("id_usuario5").value = id_usuario5;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa5').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosseis(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario6(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa6').innerHTML = html;
    }
}

function get_id_usuario6(id_usuario6, nome) {
    console.log("Id do usuario selecionado: " + id_usuario6);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario6").value = nome;

    document.getElementById("id_usuario6").value = id_usuario6;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa6').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariossete(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario7(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa7').innerHTML = html;
    }
}

function get_id_usuario7(id_usuario7, nome) {
    console.log("Id do usuario selecionado: " + id_usuario7);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario7").value = nome;

    document.getElementById("id_usuario7").value = id_usuario7;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa7').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosoito(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario8(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa8').innerHTML = html;
    }
}

function get_id_usuario8(id_usuario8, nome) {
    console.log("Id do usuario selecionado: " + id_usuario8);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario8").value = nome;

    document.getElementById("id_usuario8").value = id_usuario8;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa8').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosnove(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario9(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa9').innerHTML = html;
    }
}

function get_id_usuario9(id_usuario9, nome) {
    console.log("Id do usuario selecionado: " + id_usuario9);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario9").value = nome;

    document.getElementById("id_usuario9").value = id_usuario9;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa9').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosdez(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario10(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa10').innerHTML = html;
    }
}

function get_id_usuario10(id_usuario10, nome) {
    console.log("Id do usuario selecionado: " + id_usuario10);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario10").value = nome;

    document.getElementById("id_usuario10").value = id_usuario10;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa10').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosonze(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario11(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa11').innerHTML = html;
    }
}

function get_id_usuario11(id_usuario11, nome) {
    console.log("Id do usuario selecionado: " + id_usuario11);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario11").value = nome;

    document.getElementById("id_usuario11").value = id_usuario11;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa11').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosdoze(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario12(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa12').innerHTML = html;
    }
}

function get_id_usuario12(id_usuario12, nome) {
    console.log("Id do usuario selecionado: " + id_usuario12);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario12").value = nome;

    document.getElementById("id_usuario12").value = id_usuario12;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa12').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariostreze(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario13(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa13').innerHTML = html;
    }
}

function get_id_usuario13(id_usuario13, nome) {
    console.log("Id do usuario selecionado: " + id_usuario13);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario13").value = nome;

    document.getElementById("id_usuario13").value = id_usuario13;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa13').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosquinze(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario15(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa15').innerHTML = html;
    }
}

function get_id_usuario15(id_usuario15, nome) {
    console.log("Id do usuario selecionado: " + id_usuario15);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario15").value = nome;

    document.getElementById("id_usuario15").value = id_usuario15;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa15').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosquatorze(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario14(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa14').innerHTML = html;
    }
}

function get_id_usuario14(id_usuario14, nome) {
    console.log("Id do usuario selecionado: " + id_usuario14);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario14").value = nome;

    document.getElementById("id_usuario14").value = id_usuario14;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa14').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosdezeseis(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario16(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa16').innerHTML = html;
    }
}

function get_id_usuario16(id_usuario16, nome) {
    console.log("Id do usuario selecionado: " + id_usuario16);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario16").value = nome;

    document.getElementById("id_usuario16").value = id_usuario16;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa16').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosdezesete(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario17(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa17').innerHTML = html;
    }
}

function get_id_usuario17(id_usuario17, nome) {
    console.log("Id do usuario selecionado: " + id_usuario17);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario17").value = nome;

    document.getElementById("id_usuario17").value = id_usuario17;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa17').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosdezoito(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario18(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa18').innerHTML = html;
    }
}

function get_id_usuario18(id_usuario18, nome) {
    console.log("Id do usuario selecionado: " + id_usuario18);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario18").value = nome;

    document.getElementById("id_usuario18").value = id_usuario18;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa18').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosdezenove(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario19(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa19').innerHTML = html;
    }
}

function get_id_usuario19(id_usuario19, nome) {
    console.log("Id do usuario selecionado: " + id_usuario19);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario19").value = nome;

    document.getElementById("id_usuario19").value = id_usuario19;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa19').innerHTML = '';
    }
})
//      //      //      //      //      //
async function listar_usuariosvinte(valor) {
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
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario20(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>"+ resposta['dados'][i].grad + " " + resposta['dados'][i].nome + "</li>";
            }

        }
        html += "</ul>";

        document.getElementById('resultado_pesquisa20').innerHTML = html;
    }
}

function get_id_usuario20(id_usuario20, nome) {
    console.log("Id do usuario selecionado: " + id_usuario20);
    console.log("nome do usuario selecionado: " + nome);

    document.getElementById("usuario20").value = nome;

    document.getElementById("id_usuario20").value = id_usuario20;
}

document.addEventListener('click', function (event) {
    const validar_clique = fechar.contains(event.target);
    if (!validar_clique) {
        document.getElementById('resultado_pesquisa20').innerHTML = '';
    }
})
//      //      //      //      //      //
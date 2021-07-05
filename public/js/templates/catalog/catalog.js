$(document).ready(function () {
    $(".cat-sub").click(function () {
        // console.log($(this).attr("class").split(' ').join('.'));

        // var remote;

        $.ajax({
            type: "GET",
            async: false,
            url: "http://127.0.0.1:8000/supermercado-x",
            dataType: "text",
            data: {tcat: this.classList[3], tsub_cat: this.classList[4]},
            headers: {
                "X-Requested-With":"XMLHttpRequest"
            },
            success: function(response) { 
                // getUserPreference(response);
                console.log(response)
            }
        });
        
        // .done(function (msg) {
        //     console.log(msg)

        // }).fail(function (jqXHR, textStatus, msg) {
        //     console.log(msg)
        // })

        // console.log($.get( "http://127.0.0.1:8000/supermercado-x")); 
    })

});

// function myCallBack() { 
//     // console.log("Olá mundo!");
// }

// anotações: alguns comandos jquery:
// $(document).ready(function() {
    // $( "a" ).click(function (event) {
        // event.preventDefault(); 
    // });

    //

    // $("a").addClass("test"); // adiciona as class de todos os <a>
    // $("a").removeClass("test"); // remove as class de todos os <a>

    //

    // efeito especial de esconder lentamento o elemento <a>:
    // $("a").click(function(event) {
    //     event.preventDefault();

    //     $(this).hide("slow");

    // })
    // efeito especial de esconder lentamento o elemento <a>.

    //

    // retorno das chamadas e funções, lembrando que o valor da pagina é o que sempre vai pra get():
    // $.get( "myhtmlpage.html", myCallBack ); // executa pagina primeiro depois a função
    // $.get( "myhtmlpage.html", myCallBack( param1, param2 ) ); executa função primeiro depois retorna o valor da pagina
    // var x = $.get("http://127.0.0.1:8000/supermercado-x", function ()
    // {
    //     myCallBack('nome', 'sobrenome');

    // }); // executa a pagina primeiro e depois a função só que passando argumentos na função
    // retorno das chamadas e funções, lembrando que o valor da pagina é o que sempre vai pra get().

// });
// anotações: alguns comandos jquery.
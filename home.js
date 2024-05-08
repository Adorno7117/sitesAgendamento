document.addEventListener("DOMContentLoaded", function() {
    // Seleciona o elemento
    var backToTop = document.querySelector(".top-link");

    // Adiciona um evento de clique ao elemento
    backToTop.addEventListener("click", function() {
        // Rola suavemente até o topo da página
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});



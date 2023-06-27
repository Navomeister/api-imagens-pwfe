
const corpoProdutos = document.getElementById('produtos');

// Pré-definição de elementos a serem criados
const row = document.createElement('div');
row.classList.add('row');

const col = document.createElement('div');
col.classList.add('col');
col.classList.add('s12');
col.classList.add('m6');
col.classList.add('l4');

const imagem = document.createElement('img');
imagem.classList.add('responsive-img');
imagem.classList.add('imgProd');

const link = document.createElement('a');
link.classList.add('linkImagem');

// modal pra produto individual (deu errado)
// const modal = document.createElement('div');
// modal.classList.add('modal');

// const rowModal = document.createElement('div');
// row.classList.add('row');
// row.classList.add('rowModal');

// const colModal = document.createElement('div');
// colModal.classList.add('col');
// col.classList.add('s12');
// col.classList.add('m6');
// col.classList.add('l8');
// colModal.classList.add('colModal');

// const colImgModal = document.createElement('div');
// colModal.classList.add('col');
// col.classList.add('s12');
// col.classList.add('m6');
// col.classList.add('l4');
// colModal.classList.add('colImgModal');

// const titleModal = document.createElement('h2');
// titleModal.classList.add('titleModal');

// const txtModal = document.createElement('p');
// txtModal.classList.add('txtModal');
// txtModal.classList.add('flow-text');

// corpoProdutos.appendChild();

var teste = Array();

// últimas criadas:
// var lastRow = Array.from(
//     document.querySelectorAll('.row')
//   ).pop();
// var lastCol = Array.from(
//     document.querySelectorAll('.col')
//   ).pop();
// var lastImg = Array.from(
//     document.querySelectorAll('.imgProd')
//   ).pop();

// const usuario = document.getElementById('usuarioAdcImg').value;
// const senha = document.getElementById('senhaAdcImg').value;
const usuario = 'olhos';
const senha = 'oculosgarrafa';

// transformar em string
const credentials = `${usuario}:${senha}`;

// codificar as credenciais
const encodedCredentials = btoa(credentials);

// fazer uma solicitação HTTP para a API
fetch('http://localhost/api-imagens-pwfe/api/api.php/?endpoint=produtos', {
    method: "POST",
    headers: {
        'Authorization': `Basic ${encodedCredentials}` // incluir as credenciais no cabeçalho
    }
})
    .then(Response => Response.json()) // converte a resposta em json
    .then(data => {
        // responseDiv.textContent = JSON.stringify(data, null, 2);
        // corpoProdutos.appendChild(row);
        teste = data.produtos;
        for (let i = 0; i < data.produtos.length; i++) {
            // redefinição dos elementos (não funcionou como função)
            const row = document.createElement('div');
            row.classList.add('row');

            const col = document.createElement('div');
            col.classList.add('col');
            col.classList.add('s12');
            col.classList.add('m6');
            col.classList.add('l4');

            const imagem = document.createElement('img');
            imagem.classList.add('responsive-img');
            imagem.classList.add('imgProd');
            const link = document.createElement('a');
            link.classList.add('linkImagem');

            const modal = document.createElement('div');
            modal.classList.add('modal');

            const colModal = document.createElement('div');
            colModal.classList.add('col');


            // criação do card da imagem
            if (i % 3 == 0) {
                // elementos(i);
                corpoProdutos.appendChild(row);
            }
            lastRow = Array.from(
                corpoProdutos.querySelectorAll('.row')
            ).pop();

            lastRow.appendChild(col);
            lastCol = Array.from(
                corpoProdutos.querySelectorAll('.col')
            ).pop();

            lastCol.appendChild(link);
            lastLink = Array.from(
                corpoProdutos.querySelectorAll('.linkImagem')
            ).pop();
            lastLink.href = data.produtos[i].fonte_img;
            lastLink.setAttribute('target', '_blank');

            lastLink.appendChild(imagem);
            lastImg = Array.from(
                corpoProdutos.querySelectorAll('.imgProd')
            ).pop();

            lastImg.src = 'api/' + data.produtos[i].path_img;
            lastImg.alt = data.produtos[i].desc_img;


            // criação do modal da imagem (deu errado :/)
            // lastCol.appendChild(modal);
            // lastModal = Array.from(
            //     corpoProdutos.querySelectorAll('.modal')
            // ).pop();
            // lastModal.id = `modal${i}`;

            // lastModal.appendChild(rowModal);
            // lastRowModal = Array.from(
            //     corpoProdutos.querySelectorAll('.rowModal')
            // ).pop();

            // lastRowModal.appendChild(colImgModal);
            // lastColImgModal = Array.from(
            //     corpoProdutos.querySelectorAll('.colImgModal')
            // ).pop();

            // lastColImgModal.appendChild(imagem)
            // lastImg = Array.from(
            //     corpoProdutos.querySelectorAll('.imgProd')
            // ).pop();
            // lastImg.src = data.produtos[i].fonte_img;

            // lastModal.appendChild(colModal);
            // lastColModal = Array.from(
            //     corpoProdutos.querySelectorAll('.colModal')
            // ).pop();

            // lastColModal.appendChild(titleModal);
            // lastTitleModal = Array.from(
            //     corpoProdutos.querySelectorAll('.titleModal')
            // ).pop();
            // lastTitleModal.innerText = data.produtos[i].nome;
        }

    })
    .catch(error => {
        // responseDiv.textContent = 'DEU RUIM CHEFIA A CASA CAIU!! ' + error.message;
        alert(error.message);
        console.log(error);
    });
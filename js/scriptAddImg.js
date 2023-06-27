const form = document.getElementById('formEnviarImg');
const responseDiv = document.querySelector('#resposta .response');

form.addEventListener('submit', function (event) {
    event.preventDefault();

    const usuarioLogin = document.getElementById('usuarioAdcImg').value;
    const senhaLogin = document.getElementById('senhaAdcImg').value;
    const linkImg = document.getElementById('imgUserInput').value;
    const descImg = document.getElementById('descImgUser').value;
    const usuario = 'olhos';
    const senha = 'oculosgarrafa';

    // transformar em string
    const credentials = `${usuario}:${senha}`;

    // codificar as credenciais
    const encodedCredentials = btoa(credentials);

    // &usuarioAdcImg=${usuarioLogin}&senhaAdcImg=${senhaLogin}&imgUserInput=${imagem[0]}

    // fazer uma solicitação HTTP para a API
    fetch(`http://localhost/api-imagens-pwfe/api/api.php/?endpoint=addImagem`, {
        method: "POST",
        body: JSON.stringify({
            usuarioAdcImg: usuarioLogin,
            senhaAdcImg: senhaLogin,
            imgUserInput: linkImg,
            descImgUser: descImg
          }),
        headers: {
            'Authorization': `Basic ${encodedCredentials}`, // incluir as credenciais no cabeçalho
            "Content-type": "application/json; charset=UTF-8" 
        }
    })
        .then(Response => Response.json()) // converte a resposta em json
        .then(data => {
            console.log(data)
            responseDiv.textContent = JSON.stringify(data, null, 2);
        })
        .catch(error => {
            responseDiv.textContent = 'DEU RUIM CHEFIA A CASA CAIU!! ' + error.message;
        });
});

async function listar(id_cat){
    const dadosProd = await fetch('modal-resposta.php?id_cat=' + id_cat);
    const respostaProd = await dadosProd.json();
  
    const listModal = new bootstrap.Modal(document.getElementById("listModal"));
    listModal.show();
    document.querySelector(".listar").innerHTML = respostaProd['dados'];
    
 
}












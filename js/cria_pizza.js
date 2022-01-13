window.onload =()=>{
    var select=document.querySelector("#tamanho")
    var itens = document.querySelectorAll(".complementos")
    var campo_valor_da_compra= document.querySelector("#preco")
var visibilidade_ingredientes= document.querySelector("#sessaoComplemento")
var reset=document.querySelector("#reset")
var numero_itens=0;
    campo_valor_da_compra.value="0.00";
    //alert("selecione um tamnho desejado para que desta maneira voce possa selecionar os igredientes muito obrigado")
    function add_campo_valor_da_compra(valor){
        campo_valor_da_compra.value=valor;
    }
    function define_campo_tamanho_pizza(){
        if(select.value==="padrao"){
            add_campo_valor_da_compra(0)
          
          
            return select.value

        }
            if(select.value==="pequena"){
                add_campo_valor_da_compra(20)
                visibilidade_ingredientes.style.display="block"

                return select.value
            }
            if(select.value==="media"){
            add_campo_valor_da_compra(25)
            visibilidade_ingredientes.style.display="block"

            return select.value
        }
        if(select.value==="grande"){
            add_campo_valor_da_compra(30)
            visibilidade_ingredientes.style.display="block"

            return select.value
        }

        }
        function altera_select(){
            
            select.addEventListener("change",()=>{
                define_campo_tamanho_pizza()
                if(select.value!=="padrao"){
                    select.setAttribute("disabled",true)
                }
                
                
            })
        }
        function altera_checkbox(){
                itens.forEach((e)=>{
                   e.addEventListener("change",()=>{
                    if(define_campo_tamanho_pizza!=="padrao"){
                if(e.checked){
                    let valor=parseFloat(campo_valor_da_compra.value)+1
                        campo_valor_da_compra.value=valor
                } else if(!e.checked){
                    let valor=parseFloat(campo_valor_da_compra.value)-1
                    campo_valor_da_compra.value=valor

                }
            }

                })
                })
        }
        reset.addEventListener("click",()=>{
            select.removeAttribute("disabled")
            ingrediente.style.display="none"
        })


       
        
        
        function limita_itens(){
            itens.forEach((e)=>{
               e.addEventListener("change",()=>{
                if(define_campo_tamanho_pizza!=="padrao"){
            if(e.checked){
             if(select.value==="pequena"){
                 numero_itens++;
                 if(numero_itens===6){
                   alert("voce atigiu o numero maximo de item para pizza deste tamanho")
                 
                   itens.forEach((e)=>{
                    if(!e.checked){
                       e.setAttribute("disabled",true);
                    }
                   })

                 }
                 
             }   

             if(select.value==="media"){
                numero_itens++;
                if(numero_itens===8){
                    alert("voce atigiu o numero maximo de item para pizza deste tamanho")
                    itens.forEach((e)=>{
                        if(!e.checked){
                           e.setAttribute("disabled",true);
                        }
                       })
    
                }
             }

             if(select.value==="grande"){
                numero_itens++;
                if(numero_itens===12){
                    alert("voce atigiu o numero maximo de item para pizza deste tamanho")
                    itens.forEach((e)=>{
                        if(!e.checked){
                           e.setAttribute("disabled",true);
                        }
                       
                       })
    
                }
             }
            } else if(!e.checked){
                numero_itens--

             
            }
            
        }

            })
            })
    }
        
        
        altera_select()
        altera_checkbox()
        limita_itens()


    }
  

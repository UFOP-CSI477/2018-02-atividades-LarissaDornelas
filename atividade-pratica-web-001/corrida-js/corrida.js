function addparticipantes()
   {
     document.getElementById("tableinputs").style.visibility="visible";
     document.getElementById('apurar').style.display="block";
     var select = document.querySelector('select');
     var option = select.children[select.selectedIndex];
     var qtd = option.textContent;

     for(var i=1;i<=qtd;i++){
      var seletor = "#" + "tableinputs" + " tr";
      var linha = document.querySelectorAll(seletor)[i];

      if (linha) linha.style.visibility = "visible";

        }
   }

function processaResult(){
  document.getElementById("tableapurados").style.visibility="visible";

  var select = document.querySelector('select');
  var option = select.children[select.selectedIndex];
  var qtd = option.textContent; 
  var k=1, j; 
  var key;

  arraytempos = new Array(qtd);  
  arraynomes = new Array (qtd);
  arrayposicao = new Array(qtd); 

 for(var i=1;i<=qtd;i++){
  arraynomes[i-1]=$("#p"+i).val();
  arraytempos[i-1]=$("#t"+i).val();
  }
    
 for(var i=0;i<qtd;i++){
 
    arrayposicao[i] = arraytempos[i];
  }

  arrayposicao.sort(sortfunction);

  for(var i=0;i<qtd;i++){
   for(var j=0;j<qtd;j++){
    if(arrayposicao[i]==arraytempos[j]){
         document.getElementById('pos'+(i+1)).innerHTML = k ;
         document.getElementById('Larg'+(i+1)).innerHTML = (j+1);
         document.getElementById('nom'+(i+1)).innerHTML = arraynomes[j] ;
         document.getElementById('tem'+(i+1)).innerHTML = arraytempos[j] ;
  
        if(arrayposicao[i]!=arrayposicao[i+1]){
                          k++;
        }
    }
  }
  }

  for(var i=1;i<=qtd;i++){
      var seletor = "#" + "tableapurados" + " tr";
      var linha = document.querySelectorAll(seletor)[i];

      if (linha) linha.style.visibility = "visible";

        }
        
} 

function sortfunction(a, b){
  return (a - b) //faz com que o array seja ordenado numericamente e de ordem crescente.
}


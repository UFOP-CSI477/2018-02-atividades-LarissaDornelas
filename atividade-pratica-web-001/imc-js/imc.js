function calcularIMC(){
  $("#resultado").removeClass("alert-danger");
  $("#resultado").removeClass("alert-success");
  $("#resultado").removeClass("alert-warning");
  var peso=$('#peso').val();
  var altura =$('#altura').val();

  var imc= (peso/(altura*altura));


  if(imc<18.5){
      $("#resultado").addClass("alert-danger");
      document.getElementById("resultado").innerText="Você está subnutrido! Precisa se alimentar melhor.";
    }else if(imc>18.5 && imc<25.0){
      $("#resultado").addClass("alert-success");
      document.getElementById("resultado").innerText="Você está com um peso saudável! Parabéns, continue assim.";
  }else if(imc>24.9 && imc<30.0){
      $("#resultado").addClass("alert-warning");
      document.getElementById("resultado").innerText="Você está com sobrepeso! Tome cuidado.";
  }else if (imc>29.9 && imc<35.0) {
      $("#resultado").addClass("alert-danger");
      document.getElementById("resultado").innerText="Você está com obsesidade de grau 1! Precisa se alimentar melhor.";
  }else if(imc>34.9 && imc<40.0){
      $("#resultado").addClass("alert-danger");
      document.getElementById("resultado").innerText="Você está com obsesidade de grau 2! Precisa se alimentar melhor.";
  }else if(imc>39.0){
      $("#resultado").addClass("alert-danger");
      document.getElementById("resultado").innerText="Você está com obsesidade de grau 3! Precisa se alimentar melhor.";
  }


     document.getElementById('resultado').style.visibility="visible";

}

//AINDA SEM USO NA APLICAÇÃO

$(function(){
  $("#userForm").on("submit",function(){
    user_input = $("input[name='user']");


    if(user_input.val() == "" || user_input.val() == null)
    {
      $("#erro-nome").html("O nome eh obrigatorio");
      return(false);
    }

    if(user_input.val() == "" || user_input.val() == null)
    {
      $("#erro-nome").html("O nome eh obrigatorio");
      return(false);
    }

    return(true);
  });
});

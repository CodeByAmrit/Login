
function userOption(id) {
    console.log(id);
    
    if (document.getElementById(id).style.display === "none"){
        document.getElementById(id).style.display= "block";
    }else{
        document.getElementById(id).style.display = "none";
    }
}

function userOptionClose(id){
    document.getElementById(id).style.display = "none";
}
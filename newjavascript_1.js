function fonctionConf(numm){
Swal.fire({
  title: 'Etes-vous sur ?',
  text: "La suppression peut entrainer la suppression d'autre éléments",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    window.location.href = "creationMatiere.php?idm="+ numm +";&type=S";
  }
  else 
  window.location.href = 'gestionUE.php';
})}

function insertion(){
    
                    Swal.fire({type: 'success', title:'Succès', text:'Insertion réussie', timer:1500, showConfirmButton: false
                    }).then(function(){
                    window.location.href = 'gestionUE.php'
                    });
                    
}

function modif(){
    
                    Swal.fire({type: 'success', title:'Succès', text:'Modification effectuée', showConfirmButton: false, timer: 1500
                    }).then(function(){
                    window.location.href = 'gestionUE.php';
                    });
                    
}

function modif(){
    
                    Swal.fire({type: 'success', title:'Succès', text:'Modification effectuée', timer:1500, showConfirmButton: false
                    }).then(function(){
                    window.location.href = 'gestionUE.php';
                    });
                    
}

function supp(){
    Swal.fire({type: 'success', title:'Succès', text:'Suppression réussie', timer:1500, showConfirmButton: false
                    }).then(function(){
                    window.location.href = 'gestionUE.php';
                    });
}
